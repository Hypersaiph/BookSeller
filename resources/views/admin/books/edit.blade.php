@extends('layouts.master')

@section('title')
    Editar Libro
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
            <h5 class="breadcrumbs-title">Editar Libro</h5>
            <ol class="breadcrumbs">
                <li><a href="{{ route('books.index') }}">Libros</a></li>
                <li><a href="{{ route('books.index') }}">Lista</a></li>
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
                    <h4 class="header2">Edición de Libros</h4>
                    <div class="row">
                        <form id="book_form" action="{{route('books.update', ['id'=>$book->id])}}" enctype="multipart/form-data" method="post" class="col s12">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH">
                            <div class="row">
                                <div class="input-field col s12 m6 l6">
                                    <i class="material-icons prefix">title</i>
                                    <input name="title" id="title" type="text" class="validate" data-length="255" value="@if(old('title')){{old('title')}}@else{{$book->title}}@endif" required/>
                                    <label for="title">Título</label>
                                    @if ($errors->has('title'))
                                        <span class="red-text text-darken-2">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="input-field col s12 m6 l6">
                                    <i class="material-icons prefix">format_list_numbered</i>
                                    <input name="edition" id="edition" type="number" class="validate" value="@if(old('edition')){{old('edition')}}@else{{$book->edition}}@endif" required/>
                                    <label for="edition">Edición</label>
                                    @if ($errors->has('edition'))
                                        <span class="red-text text-darken-2">
                                            <strong>{{ $errors->first('edition') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m6 l6">
                                    <i class="material-icons prefix">language</i>
                                    <select id="language" name="language" required>
                                        <option value="" disabled selected>Elegir</option>
                                        @foreach($languages as $language)
                                                <option value="{{$language->id}}" @if($language->id==old('language')) selected @elseif($language->id==$book->language->id) selected @endif>{{$language->language}}</option>
                                        @endforeach
                                    </select>
                                    <label for="language">Idioma</label>
                                    @if ($errors->has('language'))
                                        <span class="red-text text-darken-2">
                                            <strong>{{ $errors->first('language') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div id="date-picker" class="section col s12 m6 l6">
                                    <label for="publication_date">Fecha de Puclicación</label>
                                    <input id="publication_date" name="publication_date" type="text" class="datepicker" required value="@if(old('publication_date')){{old('publication_date')}}@else{{date('d-m-Y', strtotime($book->publication_date))}}@endif">
                                    @if ($errors->has('publication_date'))
                                        <span class="red-text text-darken-2">
                                            <strong>{{ $errors->first('publication_date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m6 l6">
                                    <i class="material-icons prefix">group_work</i>
                                    <select id="genres" name="genres[]" multiple required>
                                        <option value="" disabled selected>Elegir</option>
                                        @foreach($genres as $genre)
                                            <option value="{{$genre->id}}" @if(old('genres') && in_array($genre->id, old('genres'))) selected @elseif(in_array($genre->id, $book_genres)) selected @endif>{{$genre->genre}}</option>
                                        @endforeach
                                    </select>
                                    <label for="genres">Género(s)</label>
                                    @if ($errors->has('genres'))
                                        <span class="red-text text-darken-2">
                                            <strong>{{ $errors->first('genres') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="file-field input-field col s12 m6 l6">
                                    <div class="btn">
                                        <span>Portada del Libro (opcional)</span>
                                        <input name="cover_image" type="file" accept="image/*">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text">
                                    </div>
                                    @if ($errors->has('cover_image'))
                                        <span class="red-text text-darken-2">
                                            <strong>{{ $errors->first('cover_image') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <p class="caption">Autores:</p>
                                    <h6>*No utilizar comas (,) en el nombre del autor.</h6>
                                    <div class="authors chips-autocomplete"></div>
                                    <input id="authors" name="authors[]" type="hidden" hidden>
                                    @if ($errors->has('authors'))
                                        <span class="red-text text-darken-2">
                                            <strong>{{ $errors->first('authors') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label>Descripción:</label>
                                <input id="description" name="description" required="required" class="form-control" type="hidden">
                                <div id="editor">
                                    @if(old('description')){!!old('edition')!!}@else{!!$book->description!!}@endif
                                </div>
                                @if ($errors->has('description'))
                                    <span class="red-text text-darken-2">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
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
    <script type="text/javascript" src="{!! asset('js/ckeditor/ckeditor.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/ckeditor/config.js') !!}"></script>
    <script>
        $(document).ready(function() {
            CKEDITOR.replace('editor');
            CKEDITOR.instances.editor.on('change', function() {
                var txt = CKEDITOR.instances.editor.getData();
                document.getElementById("description").value = txt;
            });
            var txt = CKEDITOR.instances.editor.getData();
            document.getElementById("description").value = txt;
            $('.authors').material_chip({
                @php
                    $splt = array();
                    $splt = explode(',', $book_authors);
                    if(old('authors')){
                        $splt = explode(',', old('authors')[0]);
                    }
                @endphp
                data: [
                        @foreach($splt as $tag)
                    {
                        tag: '{{$tag}}',
                    }  ,
                    @endforeach
                ],
                autocompleteOptions: {
                    data: {
                        @foreach($authors as $author)
                        '{{$author->name}}': null,
                        @endforeach
                    },
                    limit: Infinity,
                    minLength: 1
                }
            });
            $('.authors').on('chip.add', function(e, chip){
                updateAuthors();
            });
            $('.authors').on('chip.delete', function(e, chip){
                updateAuthors();
            });
            updateAuthors();
        });
        function updateAuthors() {
            var a = $('.authors').material_chip('data');
            var new_array = [];
            for (var i = 0; i < a.length; i++) {
                new_array.push(a[i].tag);
            }
            $('[name="authors[]"]').val(new_array);
        }
        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 150, // Creates a dropdown of 15 years to control year,
            today: 'Hoy',
            clear: 'Ninguno',
            close: 'Ok',
            closeOnSelect: false,// Close upon selecting a date,
            container: undefined, // ex. 'body' will append picker to body
            format: 'dd-mm-yyyy'
        });
    </script>
@endsection
