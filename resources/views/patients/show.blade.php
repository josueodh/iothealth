@extends('layouts.master')

@section('content')

        <div class="row">
          <div class="col-md-3">
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                </div>
                <h3 class="profile-username text-center">{{ $patient->name }}</h3>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Telefone</b> <a class="float-right">{{ $patient->phone }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Data de Nascimento</b> <a class="float-right">{{ date('d/m/Y', strtotime($patient->age)) }}</a>
                  </li>
                  <li class="list-group-item">
                    <a class="btn btn-success btn-block" href="{{ route('diaries.excel', $patient->id) }}"><i class="far fa-file-excel"></i> Dados</a>
                  </li>
                  <li class="list-group-item">
                    <a class="btn btn-outline-success btn-block" href="{{ route('measurements.excel', $patient->id) }}"><i class="far fa-file-excel"></i> Sono/Passos</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Informações</h3>
              </div>
              <div class="card-body">
                <strong><i class="fas fa-book-medical mr-1"></i> Patologia</strong>
                <p class="text-muted">
                  {{ $patient->pathology }}
                </p>
                <hr>
                <strong><i class="fas fa-file-medical mr-1"></i> CID</strong>
                  @foreach($patient->cids as $cid)
                    <p class="text-muted">{{ $cid->name }} - {{ $cid->code }}</p>
                  @endforeach
                <hr>
                <strong><i class="fas fa-map-marker-alt mr-1"></i> Endereço</strong>
                <p class="text-muted">{{ $patient->adress }}</p>
                <hr>
              </div>
            </div>
          </div>
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#temperature_tab" data-toggle="tab">Temperatura</a></li>
                  <li class="nav-item"><a class="nav-link" href="#arterial_frequency_tab" data-toggle="tab">Freq. Arterial</a></li>
                  <li class="nav-item"><a class="nav-link" href="#heart_rate_tab" data-toggle="tab">Freq. Cardiáca</a></li>
                  <li class="nav-item"><a class="nav-link" href="#sleep_tab" data-toggle="tab">Sono</a></li>
                  <li class="nav-item"><a class="nav-link " href="#step_tab" data-toggle="tab">Passos</a></li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="temperature_tab">
                      <form>
                        <select class="form-control select2" name="date" id="date" value="">
                          <option >21/10/2020</option>
                          <option >22/10/2020</option>
                          <option >23/10/2020</option>
                          <option >24/10/2020</option>
                          <option >25/10/2020</option>
                          <option >26/10/2020</option>
                          <option >27/10/2020</option>
                          <option >28/10/2020</option>
                        </select>
                    </form>
                    <canvas id="temperature">
                    </canvas>
                  </div>
                  <div class="tab-pane" id="heart_rate_tab">
                    <form>
                      <select class="form-control select2" name="date" id="date" value="">
                        <option >21/10/2020</option>
                        <option >22/10/2020</option>
                        <option >23/10/2020</option>
                        <option >24/10/2020</option>
                        <option >25/10/2020</option>
                        <option >26/10/2020</option>
                        <option >27/10/2020</option>
                        <option >28/10/2020</option>
                      </select>
                  </form>
                    <canvas id="heart_rate">
                    </canvas>
                  </div>
                  <div class="tab-pane" id="arterial_frequency_tab">
                      <form>
                        <select class="form-control select2" name="date" id="date" value="">
                          <option >21/10/2020</option>
                          <option >22/10/2020</option>
                          <option >23/10/2020</option>
                          <option >24/10/2020</option>
                          <option >25/10/2020</option>
                          <option >26/10/2020</option>
                          <option >27/10/2020</option>
                          <option >28/10/2020</option>
                        </select>
                    </form>
                    <canvas id="arterial_frequency">
                    </canvas>
                  </div>
                  <div class="tab-pane" id="sleep_tab">
                    <form>
                      <select class="form-control select2" name="month" id="month" value="">
                        <option >Janeiro</option>
                        <option >Fevereiro</option>
                        <option >Março</option>
                        <option >Abril</option>
                        <option >Maio</option>
                        <option >Junho</option>
                        <option >Julho</option>
                        <option >Agosto</option>
                        <option >Setembro</option>
                        <option >Outubro</option>
                      </select>
                  </form>
                    <canvas id="sleep">
                    </canvas>
                  </div>
                  <div class="tab-pane" id="step_tab">
                    <form>
                      <select class="form-control select2" name="month" id="month" value="">
                        <option >Janeiro</option>
                        <option >Fevereiro</option>
                        <option >Março</option>
                        <option >Abril</option>
                        <option >Maio</option>
                        <option >Junho</option>
                        <option >Julho</option>
                        <option >Agosto</option>
                        <option >Setembro</option>
                        <option >Outubro</option>
                      </select>
                  </form>
                    <canvas id="step">
                    </canvas>
                  </div>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
@endsection

@push('scripts')
        <script>
          var measurementLabel = {!! json_encode($patient->measurement_label) !!};
          var diaryLabel = {!! json_encode($patient->diary_label) !!};
          $('.select2').select2();
          $('select[value]').each(function () {
              $(this).val($(this).attr('value'));
          });
          var randomScalingFactor = function() {
              return Math.random() *10;
            };
          var configTemperature = {
            type: 'line',
            data: {
              labels: measurementLabel,
              datasets: [{
                label: 'Temperatura',
                fill: false,
                backgroundColor:'rgba(80,220,100,0.7)',
                borderColor:'rgba(80,220,100,0.7)',
                borderWidth: 1,
                data: [
                  randomScalingFactor() + 30,
                  randomScalingFactor() + 30,
                  randomScalingFactor() + 30,
                  randomScalingFactor() + 30,
                  randomScalingFactor() + 30,
                  randomScalingFactor() + 30,
                  randomScalingFactor() + 30
                ],
              },]
            },
            options: {
              responsive: true,
              title: {
                display: true,
              },
              scales: {
                xAxes: [{
                  display: true,
                }],
                yAxes: [{
                  display: true,
                }]
              }
            }
          };
          var configHeart = {
            type: 'line',
            data: {
              labels: measurementLabel,
              datasets: [{
                label: 'Frequência Cardiaca',
                fill: false,
                backgroundColor:'rgba(255,0,0,0.7)',
                borderColor:'rgba(255,0,0,0.7)',
                borderWidth: 1,
                data: [
                  randomScalingFactor() + 60,
                  randomScalingFactor() + 60,
                  randomScalingFactor() + 60,
                  randomScalingFactor() + 60,
                  randomScalingFactor() + 60,
                  randomScalingFactor() + 60,
                  randomScalingFactor() + 60
                ],
              },]
            },
            options: {
              responsive: true,
              title: {
                display: true,
              },
              scales: {
                xAxes: [{
                  display: true,
                }],
                yAxes: [{
                  display: true,
                }]
              }
            }
          };
          var configSleep = {
            type: 'bar',
            data: {
              labels: diaryLabel,
              datasets: [{
                label: 'Sono',
                fill: false,
                backgroundColor:'rgba(80,220,100,0.7)',
                borderColor:'rgba(80,220,100,0.7)',
                borderWidth: 1,
                data: [
                  randomScalingFactor(),
                  randomScalingFactor(),
                  randomScalingFactor(),
                  randomScalingFactor(),
                  randomScalingFactor(),
                  randomScalingFactor(),
                  randomScalingFactor(),
                  randomScalingFactor(),
                  randomScalingFactor(),
                  randomScalingFactor(),
                  randomScalingFactor(),
                  randomScalingFactor(),
                  randomScalingFactor(),
                  randomScalingFactor(),
                  randomScalingFactor(),
                  randomScalingFactor()
                ],
              },]
            },
            options: {
              responsive: true,
              title: {
                display: true,
              },
              scales: {
                xAxes: [{
                  display: true,
                }],
                yAxes: [{
                  display: true,
                }]
              }
            }
          };
          var configStep = {
            type: 'bar',
            data: {
              labels: diaryLabel,
              datasets: [{
                label: 'Passos',
                fill: false,
                backgroundColor:'rgba(80,220,100,0.7)',
                borderColor:'rgba(80,220,100,0.7)',
                borderWidth: 1,
                data: [
                  randomScalingFactor()*250,
                  randomScalingFactor()*250,
                  randomScalingFactor()*250,
                  randomScalingFactor()*250,
                  randomScalingFactor()*250,
                  randomScalingFactor()*250,
                  randomScalingFactor()*250,
                  randomScalingFactor()*250,
                  randomScalingFactor()*250,
                  randomScalingFactor()*250,
                  randomScalingFactor()*250,
                  randomScalingFactor()*250,
                  randomScalingFactor()*250,
                  randomScalingFactor()*250,
                  randomScalingFactor()*250,
                  randomScalingFactor()*250
                ],
              },]
            },
            options: {
              responsive: true,
              title: {
                display: true,
              },
              scales: {
                xAxes: [{
                  display: true,
                }],
                yAxes: [{
                  display: true,
                }]
              }
            }
          };
          var configArterial= {
            type: 'line',
            data: {
              labels: measurementLabel,
              datasets: [{
                label: 'Alta',
                fill: false,
                backgroundColor:'rgba(80,220,100,0.7)',
                borderColor:'rgba(80,220,100,0.7)',
                borderWidth: 1,
                data: [
                  randomScalingFactor() + 109,
                  randomScalingFactor() + 109,
                  randomScalingFactor() + 109,
                  randomScalingFactor() + 109,
                  randomScalingFactor() + 109,
                  randomScalingFactor() + 109,
                  randomScalingFactor() + 109
                ],
              },
              {
                label: 'Baixa',
                fill: false,
                backgroundColor:'rgba(144,202,249,0.7)',
                borderColor:'rgba(144,202,249,0.7)',
                borderWidth: 1,
                data: [
                  randomScalingFactor() + 70,
                  randomScalingFactor() + 70,
                  randomScalingFactor() + 70,
                  randomScalingFactor() + 70,
                  randomScalingFactor() + 70,
                  randomScalingFactor() + 70,
                  randomScalingFactor() + 70
                ],
              },
            ]
            },
            options: {
              responsive: true,
              title: {
                display: true,
              },
              scales: {
                xAxes: [{
                  display: true,
                }],
                yAxes: [{
                  display: true,
                }]
              }
            }
          };

          window.onload = function() {
            var temperature = document.getElementById('temperature').getContext('2d');
            var arterial = document.getElementById('arterial_frequency').getContext('2d');
            var heart = document.getElementById('heart_rate').getContext('2d');
            var sleep = document.getElementById('sleep').getContext('2d');
            var step = document.getElementById('step').getContext('2d');
            window.myLine = new Chart(temperature, configTemperature);
            window.myLine = new Chart(arterial, configArterial);
            window.myLine = new Chart(heart, configHeart);
            window.myLine = new Chart(step, configStep);
            window.myLine = new Chart(sleep, configSleep);
          };

        </script>
@endpush
