@extends('layouts.master')

@section('title')
    Crear Noticia
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
            <h5 class="breadcrumbs-title">Crear Noticia</h5>
            <ol class="breadcrumbs">
                <li><a href="{{ route('news.index') }}">Noticias</a></li>
                <li><a href="{{ route('news.index') }}">Lista</a></li>
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
                    <h4 class="header2">Registro de Noticias</h4>
                    <div class="row">
                        <form action="{{ route('news.store') }}" method="post" class="col s12">
                            @csrf
                            <div class="row">
                                <div class="input-field col s12 m12 l12">
                                    <i class="material-icons prefix">email</i>
                                    <textarea name="message" id="message" data-length="255" class="materialize-textarea">{{old('message')}}</textarea>
                                    <label for="message">Message</label>
                                    @if ($errors->has('message'))
                                        <span class="red-text text-darken-2">
                                            <strong>{{ $errors->first('message') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div id="date-picker" class="section col s12 m6 l6">
                                    <label for="delivery_date">Fecha de Entrega</label>
                                    <input id="delivery_date" name="delivery_date" type="text" class="datepicker" required value="{{old('delivery_date')}}">
                                    @if ($errors->has('delivery_date'))
                                        <span class="red-text text-darken-2">
                                            <strong>{{ $errors->first('delivery_date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div id="time-picker" class="section col s12 m6 l6">
                                    <label for="delivery_time">Hora de Entrega</label>
                                    <input id="delivery_time" name="delivery_time" type="text" class="timepicker" value="{{old('delivery_time')}}" >
                                    @if ($errors->has('delivery_time'))
                                        <span class="red-text text-darken-2">
                                            <strong>{{ $errors->first('delivery_time') }}</strong>
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
        $(document).ready(function() {
            $('.timepicker').pickatime({
                default: 'now', // Set default time: 'now', '1:30AM', '16:30'
                fromnow: 0,       // set default time to * milliseconds from now (using with default = 'now')
                twelvehour: false, // Use AM/PM or 24-hour format
                donetext: 'OK', // text for done-button
                cleartext: 'Ninguno', // text for clear-button
                canceltext: 'Cancelar', // Text for cancel-button,
                container: undefined, // ex. 'body' will append picker to body
                autoclose: false, // automatic close timepicker
                ampmclickable: true, // make AM PM clickable
                aftershow: function(){} //Function for after opening timepicker
            });
        });
        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 2, // Creates a dropdown of 15 years to control year,
            today: 'Hoy',
            clear: 'Ninguno',
            close: 'Ok',
            closeOnSelect: false,// Close upon selecting a date,
            container: undefined, // ex. 'body' will append picker to body
            format: 'dd-mm-yyyy'
        });
    </script>
@endsection
