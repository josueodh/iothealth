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
                    <a class="btn btn-success btn-block" href="{{ route('diaries.excel', $patient->id) }}"><i class="far fa-file-excel"></i> Dados Paciente</a>
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
                  <li class="nav-item"><a class="nav-link" href="#blood_saturation_tab" data-toggle="tab">Saturação do Sangue</a></li>
                  <li class="nav-item"><a class="nav-link" href="#sleep_tab" data-toggle="tab">Sono</a></li>
                  <li class="nav-item"><a class="nav-link " href="#step_tab" data-toggle="tab">Passos</a></li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="temperature_tab">
                      <form>
                        <select class="form-control select2" name="date" id="date1" onchange="form.submit()" value="{{ old('date', request('date')) }}">
                            @foreach($patient->days_patient_measurement as $date)
                                <option value="{{ $date }}">{{ date('d/m/Y', strtotime($date)) }}</option>
                             @endforeach
                        </select>
                    </form>
                    <canvas id="temperature">
                    </canvas>
                  </div>
                  <div class="tab-pane" id="heart_rate_tab">
                    <form>
                        <select class="form-control select2" name="date" id="date2" onchange="form.submit()" value="{{ old('date', request('date')) }}">
                            @foreach($patient->days_patient_measurement as $date)
                                <option value="{{ $date }}">{{ date('d/m/Y', strtotime($date)) }}</option>
                             @endforeach
                        </select>
                  </form>
                    <canvas id="heart_rate">
                    </canvas>
                  </div>
                  <div class="tab-pane" id="blood_saturation_tab">
                    <form>
                        <select class="form-control select2" name="date" id="date2" onchange="form.submit()" value="{{ old('date', request('date')) }}">
                            @foreach($patient->days_patient_measurement as $date)
                                <option value="{{ $date }}">{{ date('d/m/Y', strtotime($date)) }}</option>
                             @endforeach
                        </select>
                  </form>
                    <canvas id="blood_saturation">
                    </canvas>
                  </div>
                  <div class="tab-pane" id="arterial_frequency_tab">
                      <form>
                        <select class="form-control select2" name="date" id="date3" onchange="form.submit()" value="{{ old('date', request('date')) }}">
                            @foreach($patient->days_patient_measurement as $date)
                                <option value="{{ $date }}">{{ date('d/m/Y', strtotime($date)) }}</option>
                             @endforeach
                        </select>
                    </form>
                    <canvas id="arterial_frequency">
                    </canvas>
                  </div>
                  <div class="tab-pane" id="sleep_tab">
                    <canvas id="sleep">
                    </canvas>
                  </div>
                  <div class="tab-pane" id="step_tab">
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
          var temperatureData = {!! json_encode($temperature_chart) !!};
          var heartRateData = {!! json_encode($heart_rate_chart) !!};
          var sleepData = {!! json_encode(($sleep)) !!};
          var walkData = {!! json_encode(($walk)) !!};
          var arterialFrequencyMinData = {!! json_encode(($arterial_frequency_min)) !!};
          var arterialFrequencyMaxData = {!! json_encode(($arterial_frequency_max)) !!};
          var bloodSaturationData = {!! json_encode($blood_saturation) !!};
          console.log(walkData, bloodSaturationData);
          $(document).ready(function() {
            $(function() {
                $('.select2').select2();
            });
            $('select[value]').each(function () {
                $(this).val($(this).attr('value'));
            });
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
                data: temperatureData,
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
                data: heartRateData,
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
                    ticks: {
                         beginAtZero: true
                    }
                }]
              }
            }
          };
          var configBloodSaturation = {
            type: 'line',
            data: {
              labels: measurementLabel,
              datasets: [{
                label: 'Saturação do sangue',
                fill: false,
                backgroundColor:'rgba(255,0,0,0.7)',
                borderColor:'rgba(255,0,0,0.7)',
                borderWidth: 1,
                data: bloodSaturationData,
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
                    ticks: {
                         beginAtZero: true
                    }
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
                data: sleepData,
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
                    ticks: {
                         beginAtZero: true
                    }
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
                data: walkData,
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
                  beginAtZero:true,
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
                data: arterialFrequencyMaxData,
              },
              {
                label: 'Baixa',
                fill: false,
                backgroundColor:'rgba(144,202,249,0.7)',
                borderColor:'rgba(144,202,249,0.7)',
                borderWidth: 1,
                data: arterialFrequencyMinData,
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
            var blood_saturation = document.getElementById('blood_saturation').getContext('2d');
            window.myLine = new Chart(temperature, configTemperature);
            window.myLine = new Chart(arterial, configArterial);
            window.myLine = new Chart(heart, configHeart);
            window.myLine = new Chart(step, configStep);
            window.myLine = new Chart(sleep, configSleep);
            window.myLine = new Chart(blood_saturation, configBloodSaturation);
          };

        </script>
@endpush
