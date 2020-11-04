@extends('layouts.master')

@section('content')
    @component('components.edit')
        @slot('title','Editar medição')
        @slot('back', url()->previous())
        @slot('update', route('diaries.update', $diary->id))
        @slot('form')
            @include('diaries.form')
        @endslot
    @endcomponent
@endsection

