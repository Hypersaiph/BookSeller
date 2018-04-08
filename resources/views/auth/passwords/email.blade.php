@extends('layouts.master-auth')

@section('title')
    Restablecer Contraseña | BookSeller
@endsection
@section('content')
    <div id="login-page" class="row">
        @if (session('status'))
            <div class="col s12 z-depth-4 card-panel">
                <div class="row">
                    <div class="input-field col s12 center">
                        <h4>Restablecer Contraseña</h4>
                        <p class="center">Puedes restablecer tu contraseña</p>
                    </div>
                </div>
                <div class="row margin">
                    <div id="card-alert" class="card green lighten-5">
                        <div class="card-content green-text">
                            {{ session('status') }}
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="col s12 z-depth-4 card-panel">
                <form class="login-form" method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="row">
                        <div class="input-field col s12 center">
                            <h4>Restablecer Contraseña</h4>
                            <p class="center">Puedes restablecer tu contraseña</p>
                        </div>
                    </div>
                    <div class="row margin">
                        <div class="input-field col s12">
                            <i class="material-icons prefix pt-5">person_outline</i>
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                            <label for="email" class="center-align">Email</label>
                            @if ($errors->has('email'))
                                <span class="red-text text-darken-2">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <button type="submit" class="btn waves-effect waves-light col s12">
                                restablecer la contraseña
                            </button>
                        </div>
                        <div class="input-field col s12" align="right">
                            <a href="{{ url('login') }}">Volver al login</a>
                        </div>
                    </div>
                </form>
            </div>
        @endif
    </div>
@endsection
@section('js_content')
@endsection