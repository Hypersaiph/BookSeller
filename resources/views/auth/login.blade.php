@extends('layouts.master-auth')

@section('title')
    Login | BookSeller
@endsection
@section('content')
    <div id="login-page" class="row">
        <div class="col s12 z-depth-4 card-panel">
            <form class="login-form" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row">
                    <div class="input-field col s12 center">
                        <img src="{{URL::asset('/images/logo/login-logo.png')}}" alt="" class="circle responsive-img valign profile-image-login">
                        <p class="center login-form-text">Bienvenido a BookSeller (Administradores)</p>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="material-icons prefix pt-5">person_outline</i>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                        <label for="email" class="center-align">Email</label>
                        @if ($errors->has('email'))
                            <span class="red-text text-darken-2">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="material-icons prefix pt-5">lock_outline</i>
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' invalid' : '' }}" name="password" required>
                        <label for="password" data-error="wrong" data-success="right">Contraseña</label>
                        @if ($errors->has('password'))
                            <span class="red-text text-darken-2">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12 ml-2 mt-3">
                        <input id="remember-me" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember-me">Recordarme</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <button type="submit" class="btn waves-effect waves-light col s12">
                            Ingresar
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l12">
                        <p class="margin right-align medium-small"><a href="{{ route('password.request') }}">Olvidaste tu contraseña?</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js_content')
    <script>
        $(document).ready(function() {
            Materialize.updateTextFields();
        });
    </script>
@endsection
