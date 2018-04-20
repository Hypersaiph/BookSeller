@extends('layouts.master')

@section('title')
    Cuentas de la Venta
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
        <div class="col s10 m6 l6">
            <h5 class="breadcrumbs-title">Lista de Cuentas</h5>
            <ol class="breadcrumbs">
                <li><a href="{{ route('sales.index') }}">Ventas</a></li>
                <li><a href="{{route('sales.index', ['search'=>$sale->code])}}">{{ $sale->code }}</a></li>
                <li class="active">Lista de Cuentas</li>
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
                    <th>Código de Cuenta</th>
                    <th>Monto</th>
                    <th>Interés por Mora</th>
                    <th>Fecha de Pago</th>
                    <th>Fecha Límite de Pago</th>
                    <th>Estado de la Cuenta</th>
                </tr>
                </thead>
                <tbody>
                @foreach($accounts as $index => $data)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$data['code']}}</td>
                        <td>{{$data['amount']}}</td>
                        <td>{{$data['penalty']}}</td>
                        <td>{{$data['payment_date']}}</td>
                        <td>{{$data['limit_payment_date']}}</td>
                        <td>
                            @if($data['is_active'] == true && $data['penalty'] != 0)
                                <div id="card-alert" class="card gradient-45deg-red-pink">
                                    <div class="card-content white-text">
                                        <p><i class="material-icons">error</i> EN MORA</p>
                                    </div>
                                </div>
                            @else
                                @if($data['is_active'] == false)
                                    <input type="checkbox" class="filled-in" id="filled-in-box" checked="checked" disabled="disabled"/>
                                    <label for="filled-in-box">Cancelado</label>
                                @else
                                    <input type="checkbox" class="filled-in" id="filled-in-box" disabled="disabled"/>
                                    <label for="filled-in-box">Sin Cancelar</label>
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
@section('modals')
@endsection
@section('forms')
@endsection
@section('js_content')
@endsection