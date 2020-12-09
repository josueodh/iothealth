
<table class="table">
    <thead>
        <tr>
            <th>Paciente</th>
            <th>Passos dia 1</th>
            <th>Sono dia 1</th>
            <th>Temperatura dia 1</th>
            <th>FC dia 1</th>
            <th>FA dia 1</th>
            <th>Saturação dia 1</th>
            <th>Passos dia 2</th>
            <th>Sono dia 2</th>
            <th>Temperatura dia 2</th>
            <th>FC dia 2</th>
            <th>FA dia 2</th>
            <th>Saturação dia 2</th>
            <th>Passos dia 3</th>
            <th>Sono dia 3</th>
            <th>Temperatura dia 3</th>
            <th>FC dia 3</th>
            <th>FA dia 3</th>
            <th>Saturação dia 3</th>
            <th>Passos dia 4</th>
            <th>Sono dia 4</th>
            <th>Temperatura dia 4</th>
            <th>FC dia 4</th>
            <th>FA dia 4</th>
            <th>Saturação dia 4</th>
            <th>Passos dia 5</th>
            <th>Sono dia 5</th>
            <th>Temperatura dia 5</th>
            <th>FC dia 5</th>
            <th>FA dia 5</th>
            <th>Saturação dia 5</th>
            <th>Passos dia 6</th>
            <th>Sono dia 6</th>
            <th>Temperatura dia 6</th>
            <th>FC dia 6</th>
            <th>FA dia 6</th>
            <th>Saturação dia 6</th>
            <th>Passos dia 7</th>
            <th>Sono dia 7</th>
            <th>Temperatura dia 7</th>
            <th>FC dia 7</th>
            <th>FA dia 7</th>
            <th>Saturação dia 7</th>
            <th>Passos semana</th>
            <th>Sono semana</th>
            <th>Temperatura semana</th>
            <th>FC semana</th>
            <th>FA semana</th>
            <th>Saturação semana</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($patients as $patient)
            <tr>
                <td>{{ $patient->name }}</td>
                <td>{{ $patient->walk_day_first }}</td>
                <td>{{ $patient->sleep_day_first }}</td>
                <td>{{ $patient->temperature_day_first }}</td>
                <td>{{ $patient->heart_rate_day_first }}</td>
                <td>{{ $patient->arterial_frequency_max_day_first }}/{{ $patient->arterial_frequency_min_day_first}}</td>
                <td>{{ $patient->blood_saturation_day_first }}</td>
                <td>{{ $patient->walk_day_second }}</td>
                <td>{{ $patient->sleep_day_second }}</td>
                <td>{{ $patient->temperature_day_second }}</td>
                <td>{{ $patient->heart_rate_day_second }}</td>
                <td>{{ $patient->arterial_frequency_max_day_second }}/{{ $patient->arterial_frequency_min_day_second}}</td>
                <td>{{ $patient->blood_saturation_day_second }}</td>
                <td>{{ $patient->walk_day_third }}</td>
                <td>{{ $patient->sleep_day_third }}</td>
                <td>{{ $patient->temperature_day_third }}</td>
                <td>{{ $patient->heart_rate_day_third }}</td>
                <td>{{ $patient->arterial_frequency_max_day_third }}/{{ $patient->arterial_frequency_min_day_third}}</td>
                <td>{{ $patient->blood_saturation_day_third }}</td>
                <td>{{ $patient->walk_day_fourth }}</td>
                <td>{{ $patient->sleep_day_fourth }}</td>
                <td>{{ $patient->temperature_day_fourth }}</td>
                <td>{{ $patient->heart_rate_day_fourth }}</td>
                <td>{{ $patient->arterial_frequency_max_day_fourth }}/{{ $patient->arterial_frequency_min_day_fourth}}</td>
                <td>{{ $patient->blood_saturation_day_fourth }}</td>
                <td>{{ $patient->walk_day_fifth }}</td>
                <td>{{ $patient->sleep_day_fifth }}</td>
                <td>{{ $patient->temperature_day_fifth }}</td>
                <td>{{ $patient->heart_rate_day_fifth }}</td>
                <td>{{ $patient->arterial_frequency_max_day_fifth }}/{{ $patient->arterial_frequency_min_day_fifth}}</td>
                <td>{{ $patient->blood_saturation_day_fifth }}</td>
                <td>{{ $patient->walk_day_sixth }}</td>
                <td>{{ $patient->sleep_day_sixth }}</td>
                <td>{{ $patient->temperature_day_sixth }}</td>
                <td>{{ $patient->heart_rate_day_sixth }}</td>
                <td>{{ $patient->arterial_frequency_max_day_sixth }}/{{ $patient->arterial_frequency_min_day_sixth}}</td>
                <td>{{ $patient->blood_saturation_day_sixth }}</td>
                <td>{{ $patient->walk_day_seventh }}</td>
                <td>{{ $patient->sleep_day_seventh }}</td>
                <td>{{ $patient->temperature_day_seventh }}</td>
                <td>{{ $patient->heart_rate_day_seventh }}</td>
                <td>{{ $patient->arterial_frequency_max_day_seventh }}/{{ $patient->arterial_frequency_min_day_seventh}}</td>
                <td>{{ $patient->blood_saturation_day_seventh }}</td>
                <td>{{ $patient->walk_week }}</td>
                <td>{{ $patient->sleep_week }}</td>
                <td>{{ $patient->temperature_week }}</td>
                <td>{{ $patient->heart_rate_week }}</td>
                <td>{{ $patient->arterial_frequency_max_week }}/{{ $patient->arterial_frequency_min_week}}</td>
                <td>{{ $patient->blood_saturation_week }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
