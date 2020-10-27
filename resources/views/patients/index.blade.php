@extends('layouts.master')

@section('content')
    @component('components.index')
        @slot('title','Pacientes')
        @slot('create', route('patients.create'))
        @slot('header')
            <th>Nome</th>
            <th>CID</th>
            <th></th>
        @endslot
        @slot('body')
            @forelse($patients as $patient)
                <tr>
                    <td>{{ $patient->name }}</td>
                    <td>{{ $patient->icd }}</td>
                    <td class="button-index">
											<a href="{{ route('patients.show', $patient->id) }}" class="btn btn-secondary"><i class="fas fa-notes-medical"></i></a>
                        <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        <form class="form-delete" action="{{ route('patients.destroy', $patient->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
												</form>
												
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Nenhuma casa encontrado</td>
                </tr>
            @endforelse
        @endslot
    @endcomponent
@endsection
@push('scripts')
    <script src="{{ asset('js/components/dataTable.js') }}"></script>            
@endpush