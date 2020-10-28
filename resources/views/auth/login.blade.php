@extends('layouts.app')

@section('content')
<div id="app" class="login-box">
    <div class="login-logo">
        <img src="{{ asset('img/logo.png') }}" alt="Logo Iot Health" class="img-fluid">
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Faça o login para iniciar sua sessão</p>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input placeholder="E-mail" type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" autocomplete="username"
                        value="{{ old('email') }}" required autofocus>
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fas fa-envelope"></i>
                        </span>
                    </div>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="input-group mb-3">
                    <input placeholder="Senha" type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                        name="password" autocomplete="current-password" required>
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </span>
                    </div>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                Lembre-me
                            </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-dark btn-block">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
