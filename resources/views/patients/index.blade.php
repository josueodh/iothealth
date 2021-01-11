@extends('layouts.master')

@section('content')
    @component('components.index')
        @slot('title','Pacientes')
        @slot('create', route('patients.create'))
        @slot('header')
            <th>Nome</th>
            <th>Telefone</th>
            <th></th>
        @endslot
    @endcomponent
@endsection
@push('scripts')
    <script src="{{ asset('js/components/dataTable.js') }}"></script>
    <script src="{{ asset('js/components/delete.js') }}"></script>
    <script>
        var columns =  [
            { data: "name"},
            { data: "phone"},
            { data: "action", orderable: false, searchable: false }
        ];
        serverSide(2, columns, "{!! route('patients.service') !!}");
    </script>
@endpush
