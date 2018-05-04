@extends('layouts.master')

@section('title')
    Formatos
@endsection
@section('css_assets')
    <link href="{!! asset('vendors/sweetalert/dist/sweetalert.css') !!}" type="text/css" rel="stylesheet" media="screen,projection">
@endsection
@section('search_big')
@endsection
@section('search_small')
@endsection
@section('navigation')
    <div class="row">
        <div class="col s10 m10 l10">
            <h5 class="breadcrumbs-title">Lista de Formatos</h5>
            <ol class="breadcrumbs">
                <li><a href="{{ route('books.index') }}">Libros</a></li>
                <li><a href="{{ route('books.index') }}">Lista</a></li>
                <li><a href="{{route('books.edit', ['id'=>$book_id])}}">{{ $book_title }}</a></li>
                <li class="active">Presentaciones</li>
            </ol>
        </div>
    </div>
@endsection
@section('container')
    <div class="col s12 m12 l12" style="min-height: 660px;">
        @if ($total === 0)
            <div class="col s12 m12">
                <div class="card horizontal">
                    <div class="card-stacked">
                        <div class="card-content">
                            <p><i class="small mdi-alert-warning"></i> No se encontraron resultados.</p>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <table class="striped centered responsive-table">
                <thead>
                <tr>
                    <th >#</th>
                    <th>Presentación</th>
                    <th>Precio</th>
                    <th>Páginas</th>
                    <th>Duración</th>
                    <th>ISBN-10</th>
                    <th>ISBN-13</th>
                    <th>Serial (Audiolibro)</th>
                    <th>Peso</th>
                    <th>Dimensiones</th>
                    <th>Operaciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($book_types as $index => $data)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$data->type->type}}</td>
                        <td>{{$data['price']}}</td>
                        <td>{{$data['pages']}}</td>
                        <td>@if($data['duration']){{date('H:i', strtotime($data['duration']))}}@endif</td>
                        <td>{{$data['isbn10']}}</td>
                        <td>{{$data['isbn13']}}</td>
                        <td>{{$data['serial_cd']}}</td>
                        <td>{{$data['weight']}}</td>
                        <td>
                            @if($data->type->id != 3)
                            {{$data['width']}} x {{$data['height']}} x {{$data['depth']}} cm
                            @endif
                        </td>
                        <td>
                            <a class="btn-floating waves-effect waves-light gradient-45deg-amber-amber gradient-shadow tooltipped"
                               data-position="bottom" data-delay="10" data-tooltip="Editar"
                               href="{{ route('book-type.edit', ['id'=>$data['id'],'book_id'=>$book_id]) }}">
                                <i class="material-icons">edit</i>
                            </a>
                            <a class="btn-floating btn-warning-cancel waves-effect waves-light red tooltipped"
                               data-position="bottom" data-delay="10" data-tooltip="Eliminar"
                               onclick="deleteModal('{{ route('book-type.destroy', ['id'=>$data['id'],'book_id'=>$book_id]) }}')">
                                <i class="material-icons">delete</i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
        @if($create == true)
        <!-- Floating Action Button -->
        <div class="fixed-action-btn " style="bottom: 50px; right: 19px;">
            <a class="btn-floating btn-large waves-effect waves-light gradient-45deg-light-blue-cyan gradient-shadow tooltipped" data-position="top" data-delay="10" data-tooltip="Crear" href="{{route('book-type.create', ['book_id'=>$book_id])}}">
                <i class="material-icons">add</i>
            </a>
        </div><!-- Floating Action Button -->
        @endif
    </div>
@endsection
@section('modals')
    <!-- Modal delete -->
    <div id="delete_modal" class="modal">
        <div class="modal-content">
            <h5>Eliminar Usuario</h5>
            <p>¿Está segur@ que quiere eliminar este registro?</p>
        </div>
        <div class="modal-footer">
            <a id="delete_link" onclick="delete_form()" class="modal-action modal-close waves-effect waves-green btn red">Eliminar</a>
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
        </div>
    </div>
@endsection
@section('forms')
    <!-- delete -->
    <form id="delete_form" action="" method="post" style="display: none;">
        @csrf
        <input name="_method" type="hidden" value="DELETE">
    </form>
@endsection
@section('js_content')
    <script type="text/javascript" src="{!! asset('vendors/sweetalert/dist/sweetalert.min.js') !!}"></script>
    <script>
        $(document).ready(function(){
            Materialize.updateTextFields();
            $('.btn-warning-cancel').click(function(){
                swal({
                        title: "¿Está Segur@?",
                        text: "No podrá recuperar este registro.",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: '#DD6B55',
                        confirmButtonText: 'Eliminar',
                        cancelButtonText: "Cancelar",
                        closeOnConfirm: false,
                        closeOnCancel: true
                    },
                    function(isConfirm){
                        if (isConfirm){
                            swal("Eliminado", "Eliminando registro.", "success");
                            delete_form();
                        }
                    });
            });
        });
        function deleteModal(url){
            document.getElementById('delete_form').action = url;
        }
        function delete_form(){
            event.preventDefault();
            document.getElementById('delete_form').submit();
        }
    </script>
@endsection