@extends('layouts.master')

@section('content')
    @component('components.create')
        @slot('title','Criar Paciente')
        @slot('back', url()->previous())
        @slot('store', route('patients.store'))
        @slot('form')
            @include('patients.form')
        @endslot
        
    @endcomponent
@endsection