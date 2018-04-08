@extends('layouts.master')

@section('title')
    Usuarios
@endsection
@section('css_assets')
    <link href="{!! asset('vendors/sweetalert/dist/sweetalert.css') !!}" type="text/css" rel="stylesheet" media="screen,projection">
@endsection
@section('search_big')
    <form action="" method="GET">
        <i class="material-icons">search</i>
        <input type="text" name="search" class="header-search-input z-depth-2" placeholder="Búsqueda por nombre" @if($search)value="{{$search}}"@endif/>
    </form>
@endsection
@section('search_small')
    <form action="" method="GET">
        <input type="text" name="search" class="header-search-input z-depth-2" placeholder="Búsqueda por nombre" @if($search)value="{{$search}}"@endif>
    </form>
@endsection
@section('navigation')
    <div class="row">
        <div class="col s10 m6 l6">
            <h5 class="breadcrumbs-title">Lista de Usuarios</h5>
            <ol class="breadcrumbs">
                <li><a href="{{ route('users.index') }}">Usuarios</a></li>
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
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Roles</th>
                    <th>Bloquear</th>
                    <th>Operaciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $index => $data)
                    <tr>
                        <td>{{$items_per_page*($current_page - 1) + $index + 1}}</td>
                        <td>{{$data['name']}}</td>
                        <td>{{$data['email']}}</td>
                        <td>{{$data['phone']}}</td>
                        <td>{{$data['address']}}</td>
                        <td>
                            @foreach($data->roles as $role)
                                @if ($role->id === 1)
                                    <div class="chip gradient-45deg-purple-deep-orange white-text">
                                        {{$role->name}}
                                    </div>
                                @else
                                    <div class="chip cyan white-text">
                                        {{$role->name}}
                                    </div>
                                @endif
                            @endforeach
                        </td>
                        <td>
                            <!-- Switch -->
                            <div class="switch">
                                <label>
                                    No
                                    <input type="checkbox" {{$data['blocked']? 'checked="checked"':''}} onchange="setBlockUser('{{$data['id']}}',this.checked)">
                                    <span class="lever"></span>
                                    Si
                                </label>
                            </div>
                        </td>
                        <td>
                            <a class="btn-floating waves-effect waves-light gradient-45deg-amber-amber gradient-shadow tooltipped"
                               data-position="bottom" data-delay="10" data-tooltip="Editar"
                               href="{{ route('users.edit', ['id'=>$data['id']]) }}">
                                <i class="material-icons">edit</i>
                            </a>
                            <a class="btn-floating btn-warning-cancel waves-effect waves-light red tooltipped"
                               data-position="bottom" data-delay="10" data-tooltip="Eliminar"
                               onclick="deleteModal('{{ route('users.destroy', ['id'=>$data['id']]) }}')">
                                <i class="material-icons">delete</i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
                {{ $users->links('vendor.pagination.default') }}
            </div>
        @endif

        <!-- Floating Action Button -->
        <div class="fixed-action-btn " style="bottom: 50px; right: 19px;">
            <a class="btn-floating btn-large waves-effect waves-light gradient-45deg-light-blue-cyan gradient-shadow tooltipped" data-position="top" data-delay="10" data-tooltip="Crear" href="{{ route('users.create') }}">
                <i class="material-icons">add</i>
            </a>
        </div><!-- Floating Action Button -->
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
        function setBlockUser(id, bool){
            $.ajax({
                url: "{{ route('blockUserFacade')}}/"+id,
                dataType: 'text',
                type: 'get',
                contentType: 'application/x-www-form-urlencoded',
                data: {blocked:bool},
                success: function( data, textStatus, jQxhr ){
                    Materialize.toast('Datos Actualizados!', 3000, 'rounded');
                },
                error: function( jqXhr, textStatus, errorThrown ){
                }
            });
        }
    </script>
@endsection