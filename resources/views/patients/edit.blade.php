@extends('layouts.master')

@section('content')
    @component('components.edit')
        @slot('title','Editar Paciente')
        @slot('back', url()->previous())
        @slot('update', route('patients.update', $patient->id))
        @slot('form')
            @include('patients.form')
        @endslot
        
    @endcomponent
@endsection