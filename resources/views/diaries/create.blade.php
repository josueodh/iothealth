@extends('layouts.master')

@section('content')
    @component('components.create')
        @slot('title','Cadastrar dados diários')
        @slot('back', url()->previous())
        @slot('store', route('diaries.store'))
        @slot('form')
            @include('diaries.form')
        @endslot
        
    @endcomponent
@endsection