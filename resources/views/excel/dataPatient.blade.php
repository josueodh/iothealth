<table class="table">
    <thead>
        <tr>
            <th>Nome</th>
            @foreach($patient->diaries as $diary)
                <th>{{ date('d/m/Y' , strtotime($diary->date)) }} - Passos</th>
                <th>{{ date('d/m/Y' , strtotime($diary->date)) }} - Sono</th>
            @endforeach
            @foreach($patient->measurements as $measurement)
                <th>{{ date('H:i d/m/Y' , strtotime($measurement->time)) }} - Temperatura</th>
                <th>{{ date('H:i d/m/Y' , strtotime($measurement->time)) }} - FC</th>
                <th>{{ date('H:i d/m/Y' , strtotime($measurement->time)) }} - FA</th>
                <th>{{ date('H:i d/m/Y' , strtotime($measurement->time)) }} - Saturação Sanguínea</th>
            @endforeach
            <th>Passos semana</th>
            <th>Sono semana</th>
            <th>Temperatura semana</th>
            <th>FC semana</th>
            <th>FA semana</th>
            <th>Saturação semana</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $patient->name }}</td>
            @foreach($patient->diaries as $diary)
                <th>{{ $diary->walk }}</th>
                <th>{{ $diary->sleep }}</th>
            @endforeach
            @foreach($patient->measurements as $measurement)
                <td>{{ $measurement->temperature }}</td>
                <td>{{ $measurement->heart_rate }}</td>
                <td>{{ $measurement->arterial_frequency_max }} / {{ $measurement->arterial_frequency_min }}</td>
                <td>{{ $measurement->blood_saturation }}</td>
            @endforeach
            <td>{{ $patient->walk_week }}</td>
            <td>{{ $patient->sleep_week }}</td>
            <td>{{ $patient->temperature_week }}</td>
            <td>{{ $patient->heart_rate_week }}</td>
            <td>{{ $patient->arterial_frequency_max_week }}/{{ $patient->arterial_frequency_min_week}}</td>
            <td>{{ $patient->blood_saturation_week }}</td>
        </tr>
    </tbody>
</table>
