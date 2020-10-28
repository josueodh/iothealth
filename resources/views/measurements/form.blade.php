<div class="row">
    <div class="col-12 form-group">
        <label for="temperature">Temperatura</label>
        <div class="input-group mb-3">
            <input type="number" id="temperature" name="temperature" required 
                class="form-control" step="0.1" min="30" max="44" value="{{ old('temperature', $measurement->temperature) }}">
            <div class="input-group-append">
              <span class="input-group-text">°C</span>
            </div>
        </div>
    </div>
    <div class="col-12 form-group">
        <label for="heart_rate">Frequência Cardiaca</label>
        <div class="input-group mb-3">
            <input type="number" id="heart_rate" name="heart_rate" required 
                class="form-control" step="1"  value="{{ old('heart_rate', $measurement->heart_rate) }}">
            <div class="input-group-append">
              <span class="input-group-text">bpm</span>
            </div>
        </div>
    </div>
    <div class="col-12 form-group">
        <label for="sleep">Horas de Sono</label>
        <input type="time" id="sleep" name="sleep" required class="form-control"  value="{{ old('sleep', $measurement->sleep) }}">
    </div>
    <div class="col-12 form-group">
        <label for="arterial_frequency">Frequência Arterial</label>
        <div class="input-group mb-3">
            <input type="text" id="arterial_frequency" name="arterial_frequency" required 
                class="form-control" value="{{ old('arterial_frequency', $measurement->arterial_frequency) }}">
            <div class="input-group-append">
              <span class="input-group-text">mmhg</span>
            </div>
        </div>
    </div>
    <div class="col-12 form-group">
        <label for="time">Horario e dia da coleta</label>
        @if(!Route::is('measurements.create'))
            <input type="datetime-local" id="time" name="time" required class="form-control"  value="{{ old('time', date('Y-m-d\TH:i:s', strtotime($measurement->time))) }}">
        @else
            <input type="datetime-local" id="time" name="time" required class="form-control"  value="{{ old('time') }}">
        @endif
    </div>
    <div class="col-12 form-group">
        <label for="patient_id">Paciente</label>
        <select name="patient_id" id="patient_id" class="form-control select2 @error('patient_id') is-invalid has-error @enderror"  value="{{ old('patient_id', $measurement->patient_id) }}">
            @foreach($patients as $patient)
                <option value="{{ $patient->id }}">{{ $patient->name }}</option>
            @endforeach
        </select>
        @error('patient_id')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
</div>
@push('scripts')
    <script>
        $('.select2').select2({
            placeholder:'Selecione um Paciente',
            allowClear: true,
        });
        $('select[value]').each(function () {
            $(this).val($(this).attr('value'));
        });
    </script>
@endpush