@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12 text-center">
        <img src="{{ asset('/img/logo.png') }}" class="img-fluid img-dashboard">
        <h2 class="mt-5">Bem vindo, {{ Auth::user()->name }}</b></h2>
    </div>
</div>
@endsection
