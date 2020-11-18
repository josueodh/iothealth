@extends('layouts.master')

@section('content')
    @component('components.edit')
        @slot('title','Editar Usuário')
        @slot('back', url()->previous())
        @slot('update', route('users.update', $user->id))
        @slot('form')
            @include('users.form')
        @endslot
        
    @endcomponent
@endsection