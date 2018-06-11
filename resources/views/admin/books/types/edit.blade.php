@extends('layouts.master')

@section('title')
    Editar Formato
@endsection
@section('css_assets')
@endsection
@section('search_big')
@endsection
@section('search_small')
@endsection
@section('navigation')
    <div class="row">
        <div class="col s12 m12 l12">
            <h5 class="breadcrumbs-title">Editar Formato</h5>
            <ol class="breadcrumbs">
                <li><a href="{{ route('books.index') }}">Libros</a></li>
                <li><a href="{{ route('books.index') }}">Lista</a></li>
                <li><a href="{{route('books.edit', ['id'=>$book_id])}}">{{ $book_title }}</a></li>
                <li><a href="{{ route('book-type.index', ['book_id'=>$book_id]) }}">Formatos</a></li>
                <li class="active">Editar Formato</li>
            </ol>
        </div>
    </div>
@endsection
@section('container')
    <div class="section" style="min-height: 660px;">
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="card-panel">
                    <h4 class="header2">Edición de Formato</h4>
                    <div class="row">
                        <form action="{{route('book-type.update', ['id'=>$book_type->id])}}" enctype="multipart/form-data" method="post" class="col s12">
                            @csrf
                            <input name="book_id" type="hidden" value="{{$book_id}}"/>
                            <input type="hidden" name="_method" value="PATCH">
                            <div class="row">
                                <div class="input-field col s12 m6 l6">
                                    <i class="material-icons prefix">place</i>
                                    <select id="type_id" name="type_id" required>
                                        <option value="" disabled selected>Elegir</option>
                                        <option value="{{$book_type->type->id}}" @if($book_type->type->id==old('type_id')) selected @else selected @endif>{{$book_type->type->type}}</option>
                                    </select>
                                    <label for="type_id">Formato</label>
                                    @if ($errors->has('type_id'))
                                        <span class="red-text text-darken-2">
                                            <strong>{{ $errors->first('type_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="input-field col s12 m6 l6">
                                    <i class="material-icons prefix">monetization_on</i>
                                    <input name="price" id="price" type="number" step="any" class="validate" data-length="8" value="@if(old('price')){{old('price')}}@else{{$book_type->price}}@endif" required/>
                                    <label for="price">Precio</label>
                                    @if ($errors->has('price'))
                                        <span class="red-text text-darken-2">
                                            <strong>{{ $errors->first('price') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m6 l6">
                                    <i class="material-icons prefix">format_list_numbered</i>
                                    <input name="pages" id="pages" type="number" class="validate" value="@if(old('pages')){{old('pages')}}@else{{$book_type->pages}}@endif"/>
                                    <label for="pages">Páginas</label>
                                    @if ($errors->has('pages'))
                                        <span class="red-text text-darken-2">
                                            <strong>{{ $errors->first('pages') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div id="time-picker" class="section col s12 m6 l6">
                                    <label for="duration">Duración</label>
                                    <input id="duration" name="duration" type="text" class="timepicker" value="@if(old('duration')){{old('duration')}}@else{{date('H:i', strtotime($book_type->duration))}}@endif">
                                    @if ($errors->has('duration'))
                                        <span class="red-text text-darken-2">
                                            <strong>{{ $errors->first('duration') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m6 l6">
                                    <i class="material-icons prefix">code</i>
                                    <input name="isbn10" id="isbn10" type="text" class="validate" data-length="60" value="@if(old('isbn10')){{old('isbn10')}}@else{{$book_type->isbn10}}@endif"/>
                                    <label for="isbn10">ISBN-10</label>
                                    @if ($errors->has('isbn10'))
                                        <span class="red-text text-darken-2">
                                            <strong>{{ $errors->first('isbn10') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="input-field col s12 m6 l6">
                                    <i class="material-icons prefix">code</i>
                                    <input name="isbn13" id="isbn13" type="text" class="validate" data-length="60" value="@if(old('isbn13')){{old('isbn13')}}@else{{$book_type->isbn13}}@endif"/>
                                    <label for="isbn13">ISBN-13</label>
                                    @if ($errors->has('isbn13'))
                                        <span class="red-text text-darken-2">
                                            <strong>{{ $errors->first('isbn13') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m6 l6">
                                    <i class="material-icons prefix">code</i>
                                    <input name="serial_cd" id="serial_cd" type="text" class="validate" data-length="60" value="@if(old('serial_cd')){{old('serial_cd')}}@else{{$book_type->serial_cd}}@endif"/>
                                    <label for="serial_cd">Serial (Audiolibro)</label>
                                    @if ($errors->has('serial_cd'))
                                        <span class="red-text text-darken-2">
                                            <strong>{{ $errors->first('serial_cd') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m6 l6">
                                    <i class="material-icons prefix">attach_file</i>
                                    <input name="width" id="width" type="number" step="any" class="validate" data-length="5" value="@if(old('width')){{old('width')}}@else{{$book_type->width}}@endif"/>
                                    <label for="width">Ancho (cm)</label>
                                    @if ($errors->has('width'))
                                        <span class="red-text text-darken-2">
                                            <strong>{{ $errors->first('width') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="input-field col s12 m6 l6">
                                    <i class="material-icons prefix">attach_file</i>
                                    <input name="height" id="height" type="number" step="any" class="validate" data-length="5" value="@if(old('height')){{old('height')}}@else{{$book_type->height}}@endif"/>
                                    <label for="height">Alto (cm)</label>
                                    @if ($errors->has('height'))
                                        <span class="red-text text-darken-2">
                                            <strong>{{ $errors->first('height') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m6 l6">
                                    <i class="material-icons prefix">attach_file</i>
                                    <input name="depth" id="depth" type="number" step="any" class="validate" data-length="5" value="@if(old('depth')){{old('depth')}}@else{{$book_type->depth}}@endif"/>
                                    <label for="depth">Profundo (cm)</label>
                                    @if ($errors->has('depth'))
                                        <span class="red-text text-darken-2">
                                            <strong>{{ $errors->first('depth') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="input-field col s12 m6 l6">
                                    <i class="material-icons prefix">attach_file</i>
                                    <input name="weight" id="weight" type="number" step="any" class="validate" data-length="5" value="@if(old('weight')){{old('weight')}}@else{{$book_type->weight}}@endif"/>
                                    <label for="weight">Peso (Kg)</label>
                                    @if ($errors->has('weight'))
                                        <span class="red-text text-darken-2">
                                            <strong>{{ $errors->first('weight') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <p class="caption">Editores:</p>
                                    <h6>*No utilizar comas (,) en el nombre del editor.</h6>
                                    <div class="publishers chips-autocomplete"></div>
                                    <input id="publishers" name="publishers[]" type="hidden" hidden>
                                    @if ($errors->has('publishers'))
                                        <span class="red-text text-darken-2">
                                            <strong>{{ $errors->first('publishers') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <button class="btn waves-effect waves-light gradient-45deg-amber-amber gradient-shadow right" type="submit">Editar
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
            $('.publishers').material_chip({
                @php

                    $splt = array();
                    $splt = explode(',', $book_type_publishers);
                    if(old('publishers')){
                        $splt = explode(',', old('publishers')[0]);
                    }
                @endphp
                data: [
                    @foreach($splt as $tag)
                    @if($tag != "")
                    {
                        tag: '{{$tag}}',
                    }  ,
                    @endif
                    @endforeach
                ],
                autocompleteOptions: {
                    data: {
                        @foreach($publishers as $publisher)
                        '{{$publisher->name}}': null,
                        @endforeach
                    },
                    limit: Infinity,
                    minLength: 1
                }
            });
            $('.publishers').on('chip.add', function(e, chip){
                updatePublishers();
            });
            $('.publishers').on('chip.delete', function(e, chip){
                updatePublishers();
            });
            updatePublishers();
        });
        function updatePublishers(){
            var a = $('.publishers').material_chip('data');
            var new_array = [];
            for (var i = 0; i < a.length; i++) {
                new_array.push(a[i].tag);
            }
            $('[name="publishers[]"]').val(new_array);
        }
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
    </script>
@endsection
