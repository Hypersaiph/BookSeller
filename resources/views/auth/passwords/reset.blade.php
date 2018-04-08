@extends('layouts.master-auth')

@section('title')
    Restablecer Contraseña | BookSeller
@endsection
@section('content')
    <div id="login-page" class="row">
        <div class="col s12 z-depth-4 card-panel">
            <form class="login-form" method="POST" action="{{ route('password.request') }}">
                @csrf
                <div class="row">
                    <div class="input-field col s12 center">
                        <h4>Restablecer Contraseña</h4>
                    </div>
                </div>
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="material-icons prefix pt-5">person_outline</i>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' invalid' : '' }}" name="email" value="{{ $email or old('email') }}" required autofocus>
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
                        <label for="password" data-error="wrong" data-success="right">Nueva Contraseña</label>
                        @if ($errors->has('password'))
                            <span class="red-text text-darken-2">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="material-icons prefix pt-5">lock_outline</i>
                        <input id="password-confirm" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' invalid' : '' }}" name="password_confirmation" required>
                        <label for="password-confirm" data-error="wrong" data-success="right">Repetir Contraseña</label>
                        @if ($errors->has('password_confirmation'))
                            <span class="red-text text-darken-2">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <button type="submit" class="btn waves-effect waves-light col s12">
                            Restablecer Contraseña
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js_content')
@endsection