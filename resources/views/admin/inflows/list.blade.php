@extends('layouts.master')

@section('title')
    Inventario
@endsection
@section('css_assets')
    <link href="{!! asset('vendors/sweetalert/dist/sweetalert.css') !!}" type="text/css" rel="stylesheet" media="screen,projection">
@endsection
@section('search_big')
    <form action="" method="GET">
        <i class="material-icons">search</i>
        <input type="text" name="search" class="header-search-input z-depth-2" placeholder="Búsqueda por ISBN-10, ISBN-13 o Serial(CD)" @if($search)value="{{$search}}"@endif/>
    </form>
@endsection
@section('search_small')
    <form action="" method="GET">
        <input type="text" name="search" class="header-search-input z-depth-2" placeholder="Búsqueda por código" @if($search)value="{{$search}}"@endif>
    </form>
@endsection
@section('navigation')
    <div class="row">
        <div class="col s10 m6 l6">
            <h5 class="breadcrumbs-title">Inventario</h5>
            <ol class="breadcrumbs">
                <li><a href="{{ route('inflows.index') }}">Inventario</a></li>
                <li class="active">
                    @if ($search)
                        Búsqueda de: {{$search}}
                    @else
                        Lista
                    @endif
                </li>
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
                    <th style="width: 30%">Título</th>
                    <th>Tipo de Libro</th>
                    <th>ISBN-10</th>
                    <th>ISBN-13</th>
                    <th>Serial(CD)</th>
                    <th>Cantidad Disponible</th>
                    <th>Operaciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($book_types as $index => $data)
                    <tr>
                        <td>{{$items_per_page*($current_page - 1) + $index + 1}}</td>
                        <td>{{$data->book->title}}</td>
                        <td>{{$data->type->type}}</td>
                        <td>{{$data['isbn10']}}</td>
                        <td>{{$data['isbn13']}}</td>
                        <td>{{$data['serial_cd']}}</td>
                        <td>{{$data->stock}}</td>
                        <td>
                            <a class="btn-floating btn-warning-cancel waves-effect waves-light gradient-45deg-light-blue-cyan gradient-shadow tooltipped"
                               data-position="bottom" data-delay="10" data-tooltip="Agregar"
                               onclick="addModal('{{ route('inflows.update', ['id'=>$data['id']]) }}')">
                                <i class="material-icons">add</i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
                {{ $book_types->links('vendor.pagination.default') }}
            </div>
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
    <form id="add_quantity_form" action="" method="post" style="display: none;">
        @csrf
        <input type="hidden" name="_method" value="PATCH">
        <input id="form_quantity" type="hidden" name="quantity" value="">
    </form>
@endsection
@section('js_content')
    <script type="text/javascript" src="{!! asset('vendors/sweetalert/dist/sweetalert.min.js') !!}"></script>
    <script>
        $(document).ready(function(){
            @if ($errors->has('quantity'))
                Materialize.toast('{{ $errors->first('quantity') }}', 3000, 'rounded');
            @endif
            Materialize.updateTextFields();
            $('.btn-warning-cancel').click(function(){
                swal({  title: "Agregar Stock",
                        text: "Monto de la transacción:",
                        type: "input",
                        showCancelButton: true,
                        closeOnConfirm: false,
                        animation: "slide-from-center",
                        inputPlaceholder: "Ingresa " },
                    function(inputValue){
                        if (inputValue === false) return false;
                        if (inputValue === "") {
                            swal.showInputError("Ingresa un valor.");
                            return false
                        }
                        if (isNaN(inputValue)) {
                            swal.showInputError("Debe ser un valor numérico.");
                            return false
                        }
                        if(Number.isInteger(Number(inputValue))){
                            document.getElementById("form_quantity").value = inputValue;
                            swal("Buenísimo!", "Su transacción: " + inputValue, "success");
                            add_quantity_form();
                        }else{
                            swal.showInputError("Debe ser un valor entero.");
                            return false
                        }
                    });
            });
        });
        function addModal(url){
            document.getElementById('add_quantity_form').action = url;
        }
        function add_quantity_form(){
            event.preventDefault();
            document.getElementById('add_quantity_form').submit();
        }
    </script>
@endsection