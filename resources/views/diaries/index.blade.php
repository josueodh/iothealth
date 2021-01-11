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
    @endcomponent
@endsection
@push('scripts')
    <script src="{{ asset('js/components/dataTable.js') }}"></script>
    <script src="{{ asset('js/components/delete.js') }}"></script>
    <script>
        var columns =  [
            { data:"patient.name" , name:"patient.name"},
            { data: "date" },
            { data: "sleep" },
            { data: "walk" },
            { data: "action", orderable: false, searchable: false }
        ];
        serverSide(4, columns, "{!! route('diaries.service') !!}");
    </script>
@endpush
