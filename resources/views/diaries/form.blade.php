<div class="row">
    <div class="col-12 form-group">
        <label for="date">Data</label>
        <input type="date" id="date" name="date" class="form-control" required value="{{ old('date', $diary->date) }}">
    </div>
    <div class="col-12 form-group">
        <label for="walk">Passos</label>
        <input type="text" name="walk" id="walk" class="form-control"required value="{{ old('walk', $diary->walk) }}">
    </div>
    <div class="col-12 form-group">
        <label for="sleep">Sono</label>
        <input type="time" name="sleep" id="sleep" class="form-control" required value="{{ old('sleep', $diary->sleep) }}">
    </div>
    <div class="col-12 form-group">
        <label for="patient">Paciente</label>
        <select class="form-control select2" required name="patient_id" value="{{ old('patient_id', $diary->patient_id) }}">
            @foreach($patients as $patient)
                <option value="{{ $patient->id }}">{{ $patient->name }}</option>
            @endforeach
        </select>
    </div>
</div>

@push('scripts')
    <script>
          $(function() {
                $('.select2').select2();
            });
        $('select[value]').each(function () {
            $(this).val($(this).attr('value'));
        });
    </script>
@endpush