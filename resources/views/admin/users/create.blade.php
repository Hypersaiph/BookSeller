@extends('layouts.master')

@section('title')
    Crear Usuario
@endsection
@section('css_assets')
@endsection
@section('search_big')
@endsection
@section('search_small')
@endsection
@section('navigation')
    <div class="row">
        <div class="col s10 m6 l6">
            <h5 class="breadcrumbs-title">Crear Usuario</h5>
            <ol class="breadcrumbs">
                <li><a href="{{ route('users.index') }}">Usuarios</a></li>
                <li><a href="{{ route('users.index') }}">Lista</a></li>
                <li class="active">Crear</li>
            </ol>
        </div>
    </div>
@endsection
@section('container')
    <div class="section" style="min-height: 660px;">
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="card-panel">
                    <h4 class="header2">Registro de Usuarios</h4>
                    <div class="row">
                        <form action="{{ route('users.store') }}" method="post" class="col s12">
                            @csrf
                            <div class="row">
                                <div class="input-field col s12 m6 l6">
                                    <i class="material-icons prefix">person</i>
                                    <input name="name" id="name" type="text" class="validate" data-length="255" value="{{old('name')}}" required/>
                                    <label for="name">Nombre Completo</label>
                                    @if ($errors->has('name'))
                                        <span class="red-text text-darken-2">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="input-field col s12 m6 l6">
                                    <i class="material-icons prefix">email</i>
                                    <input name="email" id="email" type="text" class="validate" data-length="155" value="{{old('email')}}" required/>
                                    <label for="email">Email</label>
                                    @if ($errors->has('email'))
                                        <span class="red-text text-darken-2">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m6 l6">
                                    <i class="material-icons prefix">phone</i>
                                    <input name="phone" id="phone" type="text" class="validate" data-length="45" value="{{old('phone')}}" required/>
                                    <label for="phone">Teléfono</label>
                                    @if ($errors->has('phone'))
                                        <span class="red-text text-darken-2">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="input-field col s12 m6 l6">
                                    <i class="material-icons prefix">home</i>
                                    <input name="address" id="address" type="text" class="validate" data-length="255" value="{{old('address')}}" required/>
                                    <label for="address">Dirección</label>
                                    @if ($errors->has('address'))
                                        <span class="red-text text-darken-2">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m6 l6">
                                    <i class="material-icons prefix">build</i>
                                    <select id="roles" name="roles[]" multiple required>
                                        <option value="" disabled selected>Elegir</option>
                                        @foreach($roles as $role)
                                            <option value="{{$role->id}}" @if(old('roles') && in_array($role->id, old('roles'))) selected @endif>{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                    <label for="roles">Roles de Usuario</label>
                                    @if ($errors->has('roles'))
                                        <span class="red-text text-darken-2">
                                            <strong>{{ $errors->first('roles') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <button class="btn waves-effect waves-light gradient-45deg-light-blue-cyan gradient-shadow right" type="submit">Registrar
                                        <i class="mdi-content-send right"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('modals')
@endsection
@section('forms')
@endsection
@section('js_content')
    <script>
    </script>
@endsection
