@extends('layouts.master')

@section('content')
    @component('components.edit')
        @slot('title','Editar medição')
        @slot('back', url()->previous())
        @slot('update', route('measurements.update', $measurement->id))
        @slot('form')
            @include('measurements.form')
        @endslot
        
    @endcomponent
@endsection