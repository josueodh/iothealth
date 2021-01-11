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
        @endslot
    @endcomponent
@endsection
@push('scripts')
    <script src="{{ asset('js/components/dataTable.js') }}"></script>
    <script src="{{ asset('js/components/delete.js') }}"></script>
    <script>
        var columns =  [
            { data: "date", name: "time" },
            { data:"patient.name" , name:"patient.name"},
            { data: "action", orderable: false, searchable: false }
        ];
        serverSide(2, columns, "{!! route('measurements.service') !!}");
    </script>
@endpush
