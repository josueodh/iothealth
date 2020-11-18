@extends('layouts.master')

@section('content')
    @component('components.create')
        @slot('title','Criar Usuário')
        @slot('back', url()->previous())
        @slot('store', route('users.store'))
        @slot('form')
            @include('users.form')
        @endslot
        
    @endcomponent
@endsection