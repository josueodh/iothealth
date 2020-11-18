<table class="table">
    <thead>
        <tr>
            <th>Temperatura</th>
            <th>Frequência Cardiaca</th>
            <th>Frequência Arterial</th>
            <th>Horário e Dia da Coleta</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($measurements as $measurement)
            <tr>
                <td>{{ $measurement->temperature }}</td>
                <td>{{ $measurement->heart_rate }}</td>
                <td>{{ $measurement->arterial_frequency }}</td>
                <td>{{ date('Y-m-d\TH:i:s', strtotime($measurement->time))}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
