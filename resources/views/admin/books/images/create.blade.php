@extends('layouts.master')

@section('title')
    Crear Banner
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
            <h5 class="breadcrumbs-title">Crear Banner</h5>
            <ol class="breadcrumbs">
                <li><a href="{{ route('books.index') }}">Libros</a></li>
                <li><a href="{{ route('books.index') }}">Lista</a></li>
                <li><a href="{{route('books.edit', ['id'=>$book_id])}}">{{ $book_title }}</a></li>
                <li><a href="{{ route('book-image.index', ['book_id'=>$book_id]) }}">Banners</a></li>
                <li class="active">Crear Banner</li>
            </ol>
        </div>
    </div>
@endsection
@section('container')
    <div class="section" style="min-height: 660px;">
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="card-panel">
                    <h4 class="header2">Registro de Banners</h4>
                    <div class="row">
                        <form action="{{ route('book-image.store') }}" enctype="multipart/form-data" method="post" class="col s12">
                            @csrf
                            <input name="book_id" type="hidden" value="{{$book_id}}"/>
                            <div class="row">
                                <div class="input-field col s12 m6 l6">
                                    <i class="material-icons prefix">title</i>
                                    <input name="big_text" id="big_text" type="text" class="validate" data-length="50" value="{{old('big_text')}}" required/>
                                    <label for="big_text">Texto grande</label>
                                    @if ($errors->has('big_text'))
                                        <span class="red-text text-darken-2">
                                            <strong>{{ $errors->first('big_text') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="input-field col s12 m6 l6">
                                    <i class="material-icons prefix">text_fields</i>
                                    <input name="small_text" id="small_text" type="text" class="validate" data-length="155" value="{{old('small_text')}}" required/>
                                    <label for="small_text">Texto pequeño</label>
                                    @if ($errors->has('small_text'))
                                        <span class="red-text text-darken-2">
                                            <strong>{{ $errors->first('small_text') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m6 l6">
                                    <i class="material-icons prefix">place</i>
                                    <select id="image_type" name="image_type" required>
                                        <option value="" disabled selected>Elegir</option>
                                        @foreach($image_types as $image_type)
                                            <option value="{{$image_type->id}}" @if($image_type->id==old('image_type')) selected @endif>{{$image_type->position}}</option>
                                        @endforeach
                                    </select>
                                    <label for="image_type">Posición del texto</label>
                                    @if ($errors->has('image_type'))
                                        <span class="red-text text-darken-2">
                                            <strong>{{ $errors->first('image_type') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="file-field input-field col s12 m6 l6">
                                    <div class="btn">
                                        <span>Banner</span>
                                        <input name="banner_image" type="file" accept="image/*" required>
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text">
                                    </div>
                                    @if ($errors->has('banner_image'))
                                        <span class="red-text text-darken-2">
                                            <strong>{{ $errors->first('banner_image') }}</strong>
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
                    <h4 class="header2">Ejemplo</h4>
                    <div class="slider">
                        <ul class="slides">
                            <li>
                                <img src="{{URL::asset('images/banners/31.png')}}">
                                <div class="caption right-align">
                                    <h3>Texto grande!</h3>
                                    <h5 class="light grey-text text-lighten-3">Texto pequeño (derecha).</h5>
                                </div>
                            </li>
                        </ul>
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
