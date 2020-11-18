<table class="table">
    <thead>
        <tr>
            <th>Passos</th>
            <th>Sono</th>
            <th>Data</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($diaries as $diary)
            <tr>
                <td>{{ $diary->walk }}</td>
                <td>{{ $diary->sleep }}</td>
                <td>{{ date('d/m/Y', strtotime($diary->date)) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
