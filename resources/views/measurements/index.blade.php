@extends('layouts.master')

@section('content')
    @component('components.index')
        @slot('title','Medições')
        @slot('create', route('measurements.create'))
        @slot('header')
            <th>Data</th>
            <th>Paciente</th>
            <th></th>
        @endslot
        @slot('body')
            @forelse($measurements as $measurement)
                <tr>
                    <td>{{ date('H:m - d/m/Y',strtotime($measurement->time)) }}</td>
                    <td>{{ $measurement->patient->name }}</td>
                    <td class="button-index">
                        <a href="{{ route('measurements.show', $measurement->id) }}" class="btn btn-secondary"><i class="fas fa-notes-medical"></i></a>
                        <a href="{{ route('measurements.edit', $measurement->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        <form class="form-delete" action="{{ route('measurements.destroy', $measurement->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>
												
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Nenhuma medição encontrada</td>
                </tr>
            @endforelse
        @endslot
    @endcomponent
@endsection
@push('scripts')
    <script src="{{ asset('js/components/dataTable.js') }}"></script>            
@endpush