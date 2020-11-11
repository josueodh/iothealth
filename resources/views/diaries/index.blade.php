@extends('layouts.master')

@section('content')
    @component('components.index')
        @slot('title','Sono / Passos')
        @slot('create', route('diaries.create'))
        @slot('header')
            <th>Paciente</th>
            <th>Data</th>
            <th>Sono</th>
            <th>Passos</th>
            <th></th>
        @endslot
        @slot('body')
            @forelse($diaries as $diary)
                <tr>
                    <td>{{ $diary->patient->name }}</td>
                    <td>{{ date('d/m/Y',strtotime($diary->date)) }}</td>
                    <td>{{ date('H:m',strtotime($diary->sleep)) }}</td>
                    <td>{{ $diary->walk }}</td>
                    <td class="button-index">
                        <a href="{{ route('diaries.edit', $diary->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        <form class="form-delete" action="{{ route('diaries.destroy', $diary->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Nenhuma medição encontrada</td>
                </tr>
            @endforelse
        @endslot
    @endcomponent
@endsection
@push('scripts')
    <script src="{{ asset('js/components/dataTable.js') }}"></script>            
@endpush