@extends('layouts.master')

@section('content')
    @component('components.index')
        @slot('title','Usuários')
        @slot('create', route('users.create'))
        @slot('header')
            <th>Nome</th>
            <th>E-mail</th>
            <th>Administrador</th>
            <th></th>
        @endslot
        @slot('body')
        @endslot
    @endcomponent
@endsection
@push('scripts')
    <script src="{{ asset('js/components/dataTable.js') }}"></script>
    <script src="{{ asset('js/components/delete.js') }}"></script>
    <script>
        var columns =  [
            { data: "name"},
            { data: "email"},
            { data: "is_admin"},
            { data: "action", orderable: false, searchable: false }
        ];
        serverSide(3, columns, "{!! route('users.service') !!}");
    </script>
@endpush
