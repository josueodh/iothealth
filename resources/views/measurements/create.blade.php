@extends('layouts.master')

@section('content')
    @component('components.create')
        @slot('title','Criar Medição')
        @slot('back', url()->previous())
        @slot('store', route('measurements.store'))
        @slot('form')
            @include('measurements.form')
        @endslot
        
    @endcomponent
@endsection