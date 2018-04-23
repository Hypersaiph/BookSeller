<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<!--================================================================================
  Item Name: Materialize - Material Design Admin Template
  Version: 4.0
  Author: PIXINVENT
  Author URL: https://themeforest.net/user/pixinvent/portfolio
  ================================================================================ -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>
        @section('title')
        @show
    </title>
    <!-- Favicons-->
    <link rel="icon" href="{{URL::asset('images/favicon/favicon-32x32.png')}}" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="{{URL::asset('images/favicon/apple-touch-icon-152x152.png')}}">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
    <!-- For Windows Phone -->
    <!-- CORE CSS-->
    <link href="{!! asset('css/materialize.css') !!}" type="text/css" rel="stylesheet"/>
    <link href="{!! asset('css/themes/collapsible-menu/style.css') !!}" type="text/css" rel="stylesheet"/>
    <!-- Custome CSS-->
    <link href="{!! asset('css/custom/custom.css') !!}" type="text/css" rel="stylesheet"/>
    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="{!! asset('vendors/prism/prism.css') !!}" type="text/css" rel="stylesheet"/>
    <link href="{!! asset('vendors/perfect-scrollbar/perfect-scrollbar.css') !!}" type="text/css" rel="stylesheet"/>
    <link href="{!! asset('vendors/flag-icon/css/flag-icon.min.css') !!}" type="text/css" rel="stylesheet"/>
    @section('css_assets')
    @show
</head>

<body>
<!-- Start Page Loading -->
<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
<!-- End Page Loading -->
<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- START HEADER -->
<header id="header" class="page-topbar">
    <!-- start header nav-->
    <div class="navbar-fixed">
        <nav class="navbar-color gradient-45deg-purple-deep-orange gradient-shadow">
            <div class="nav-wrapper">
                <div class="header-search-wrapper hide-on-med-and-down sideNav-lock">
                @section('search_big')
                @show
                </div>
                <ul class="right hide-on-med-and-down">
                    <li>
                        <a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen">
                            <i class="material-icons">settings_overscan</i>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="waves-effect waves-block waves-light profile-button" data-activates="profile-dropdown">
                            <span class="avatar-status avatar-online">
                                @if (Auth::user() && Auth::user()->profile_image)
                                    <img src="{{URL::asset('images/avatar/'.Auth::user()->profile_image)}}" alt="avatar"><i></i>
                                @else
                                    <img src="{{URL::asset('images/avatar/avatar.png')}}" alt="avatar"><i></i>
                                @endif
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="#" data-activates="chat-out" class="waves-effect waves-block waves-light chat-collapse">
                            <i class="material-icons">format_indent_increase</i>
                        </a>
                    </li>
                </ul>
                <!-- profile-dropdown -->
                <ul id="profile-dropdown" class="dropdown-content">
                    <li>
                        <a href="#" class="grey-text text-darken-1">
                            @if (Auth::user())
                            {{ Auth::user()->name }}
                            @endif
                        </a>
                    </li>
                    <li>
                        @if (Auth::user())
                        <a href="#" class="grey-text text-darken-1">
                            @foreach(Auth::user()->roles as $key => $role)
                                @if ($key === 1)
                                    y {{$role->name}}
                                @else
                                    {{$role->name}}
                                @endif
                            @endforeach
                        </a>
                        @endif
                    </li>
                    <li class="divider"></li>
                    <li class="divider"></li>
                    <li>
                        <a class="grey-text text-darken-1" href="{{ route('logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="material-icons">keyboard_tab</i> Salir
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<!-- END HEADER -->
<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- START MAIN -->
<div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">
        <!-- START LEFT SIDEBAR NAV-->
        <aside id="left-sidebar-nav" class="nav-expanded nav-lock nav-collapsible">
            <div class="brand-sidebar">
                <h1 class="logo-wrapper">
                    <a href="index.html" class="brand-logo darken-1">
                        <img src="{{URL::asset('images/logo/materialize-logo.png')}}" alt="materialize logo">
                        <span class="logo-text hide-on-med-and-down">Materialize</span>
                    </a>
                    <a href="#" class="navbar-toggler">
                        <i class="material-icons">radio_button_checked</i>
                    </a>
                </h1>
            </div>
            <ul id="slide-out" class="side-nav fixed leftside-navigation">
                <li class="no-padding">
                    <ul class="collapsible" data-collapsible="accordion">
                        <li class="bold">
                            <a href="{{ route('dashboard.index') }}" class="waves-effect waves-cyan">
                                <i class="material-icons">dashboard</i>
                                <span class="nav-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="bold">
                            <a href="{{ route('sales.index') }}" class="waves-effect waves-cyan">
                                <i class="material-icons">shopping_cart</i>
                                <span class="nav-text">Ventas</span>
                            </a>
                        </li>
                        <li class="bold">
                            <a href="{{ route('books.index') }}" class="waves-effect waves-cyan">
                                <i class="material-icons">book</i>
                                <span class="nav-text">Libros</span>
                            </a>
                        </li>
                        <li class="bold">
                            <a href="{{ route('inflows.index') }}" class="waves-effect waves-cyan">
                                <i class="material-icons">store</i>
                                <span class="nav-text">Inventario</span>
                            </a>
                        </li>
                        <li class="bold">
                            <a href="{{ route('customers.index') }}" class="waves-effect waves-cyan">
                                <i class="material-icons">nature_people</i>
                                <span class="nav-text">Clientes</span>
                            </a>
                        </li>
                        <li class="bold">
                            <a href="{{ route('users.index') }}" class="waves-effect waves-cyan">
                                <i class="material-icons">people</i>
                                <span class="nav-text">Usuarios</span>
                            </a>
                        </li>
                        <li class="bold">
                            <a href="{{ route('news.index') }}" class="waves-effect waves-cyan">
                                <i class="material-icons">speaker_notes</i>
                                <span class="nav-text">Noticias</span>
                            </a>
                        </li>
                        <li>
                            <a class="grey-text text-darken-1" href="{{ route('logout') }}"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="material-icons">keyboard_tab</i>
                                <span class="nav-text">Salir</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only gradient-45deg-light-blue-cyan gradient-shadow">
                <i class="material-icons">menu</i>
            </a>
        </aside>
        <!-- END LEFT SIDEBAR NAV-->
        <!-- //////////////////////////////////////////////////////////////////////////// -->
        <!-- START CONTENT -->
        <section id="content">
            <!--breadcrumbs start-->
            <div id="breadcrumbs-wrapper">
                <!-- Search for small screen -->
                <div class="header-search-wrapper grey lighten-3 hide-on-large-only">
                @section('search_small')
                @show
                </div>
                <div class="container">
                    @section('navigation')
                    @show
                </div>
            </div>
            <!--breadcrumbs end-->
            <!--start container-->
            <div class="container">
                @section('container')
                @show
            </div>
            <!--end container-->
        </section>
        <!-- END CONTENT -->
        <!-- //////////////////////////////////////////////////////////////////////////// -->
        <!-- START RIGHT SIDEBAR NAV-->
        <aside id="right-sidebar-nav">
            <ul id="chat-out" class="side-nav rightside-navigation">
                <li class="li-hover">
                    <div class="row">
                        <div class="col s12 border-bottom-1 mt-5">
                            <ul class="tabs">
                                <li class="tab col s6">
                                    <a href="#activity" class="active">
                                        <span class="material-icons">graphic_eq</span>
                                    </a>
                                </li>
                                <li class="tab col s6">
                                    <a href="#settings">
                                        <span class="material-icons">settings</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div id="activity" class="col s12">
                            <h6 class="mt-5 mb-3 ml-3">ACTIVIDAD RECIENTE</h6>
                            <div class="activity">
                                @foreach($activities as $key=>$activity)
                                <div class="recent-activity-list chat-out-list row mb-0">
                                    <div class="col s3 mt-2 center-align recent-activity-list-icon">
                                        <i class="material-icons white-text icon-bg-color
                                        @switch($activity->table)
                                            @case("sales")
                                                    red
                                                @break
                                            @case("customers")
                                                    blue
                                                    @break
                                            @case("accounts")
                                                    orange
                                                    @break
                                            @case("inflows")
                                                    green
                                                    @break
                                            @case("books")
                                                    brown
                                                    @break
                                            @case("book_types")
                                                    blue
                                                    @break
                                            @default
                                        @endswitch
                                             lighten-1">
                                            @switch($activity->table)
                                                @case("sales")
                                                shopping_cart
                                                @break
                                                @case("customers")
                                                nature_people
                                                @break
                                                @case("accounts")
                                                account_balance_wallet
                                                @break
                                                @case("inflows")
                                                store
                                                @break
                                                @case("books")
                                                book
                                                @break
                                                @case("book_types")
                                                extension
                                                @break
                                                @default
                                            @endswitch
                                        </i>
                                    </div>
                                    <div class="col s9 recent-activity-list-text">
                                        <a href="
                                            @switch($activity->table)
                                            @case("sales")
                                        {{ route('sales.index', ['search'=>$activity->record_id]) }}
                                                    @break
                                            @case("customers")
                                        {{ route('customers.index', ['search'=>$activity->record_id]) }}
                                                    @break
                                            @case("accounts")
                                        {{ route('sales.index') }}
                                                    @break
                                            @case("inflows")
                                        {{ route('inflows.index') }}
                                                    @break
                                            @case("books")
                                        {{ route('books.index', ['search'=>$activity->record_id]) }}
                                                    @break
                                            @case("book_types")
                                        {{ route('books.index') }}
                                                    @break
                                            @default
                                        @endswitch" class="cyan-text medium-small">{{$activity_times_array[$key]}}</a>
                                        <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">
                                            <b>{{$activity_user_array[$key]}}</b> ha
                                            @switch($activity->table)
                                                @case("sales")
                                                realizado una nueva venta.
                                                @break
                                                @case("customers")
                                                registrado un nuevo cliente.
                                                @break
                                                @case("accounts")
                                                abierto una nueva cuenta.
                                                @break
                                                @case("inflows")
                                                agregado nuevo stock.
                                                @break
                                                @case("books")
                                                registrado un nuevo libro.
                                                @break
                                                @case("book_types")
                                                registrado una presentacion de libro nueva.
                                                @break
                                                @default
                                            @endswitch
                                        </p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div id="settings" class="col s12">
                            <h6 class="mt-5 mb-3 ml-3"><b>AJUSTES DEL SISTEMA</b></h6>
                            <h6 class="mt-5 mb-3 ml-3">Ventas</h6>
                            <div class="divider"></div>
                            <ul class="collection border-none">
                                <li class="collection-item border-none">
                                    <div class="m-0">
                                        <span class="font-weight-600">Número de días en el año</span>
                                        <div class="input-field col s12 m12 l12">
                                            <input placeholder="modificar..." type="number" min="0" step="1" onchange="setSalesSettingsInt('days_in_year', this.value)" value="{{$days_in_year}}">
                                        </div>
                                    </div>
                                    <p>Modificar para asignar el número de días anuales. Este campo es utilizado para el calculo de intereses.</p>
                                </li>
                                <li class="collection-item border-none">
                                    <div class="m-0">
                                        <span class="font-weight-600">Número de días para aplicar interés por mora</span>
                                        <div class="input-field col s12 m12 l12">
                                            <input placeholder="modificar..." type="number" min="0" step="1" onchange="setSalesSettingsInt('days_before_penalty', this.value)" value="{{$days_before_penalty}}">
                                        </div>
                                    </div>
                                    <p>Modificar para asignar el número de días naturales, antes de aplicar intereses por mora (ventas a crédito).</p>
                                </li>
                                <li class="collection-item border-none">
                                    <div class="m-0">
                                        <span class="font-weight-600">Porcentaje de interés por mora (%)</span>
                                        <div class="input-field col s12 m12 l12">
                                            <input placeholder="modificar..." type="number" min="0" step="1" onchange="setSalesSettingsDouble('penalty_percentage', this.value)" value="{{$penalty_percentage}}">
                                        </div>
                                    </div>
                                    <p>Modificar para asignar el porcentaje de interé, se aplica cuando se vence la fecha límite de pago de cuotas. Utilizar (.) para separar los decimales.</p>
                                </li>
                            </ul>
                            <h6 class="mt-5 mb-3 ml-3">Envío de Notificaciones</h6>
                            <div class="divider"></div>
                            <ul class="collection border-none">
                                <li class="collection-item border-none">
                                    <div class="m-0">
                                        <span class="font-weight-600">Libros</span>
                                        <div class="switch right">
                                            <label>
                                                <input onclick="setSetting('book_notification',this.checked)" type="checkbox"
                                                       @if($book_notification==true)
                                                       checked
                                                        @endif>
                                                <span class="lever"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <p>Activar para enviar Notificaciones Push cuando se registran nuevos libros.</p>
                                </li>
                                <li class="collection-item border-none">
                                    <div class="m-0">
                                        <span class="font-weight-600">Presentaciones de Libro</span>
                                        <div class="switch right">
                                            <label>
                                                <input onclick="setSetting('book_type_notification',this.checked)" type="checkbox"
                                                       @if($book_type_notification==true)
                                                       checked
                                                        @endif>
                                                <span class="lever"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <p>Activar para enviar Notificaciones Push cuando se registran nuevas Presentaciones de libros (Tapa Dura, Tapa Suave, Audiolibro).</p>
                                </li>
                                <li class="collection-item border-none">
                                    <div class="m-0">
                                        <span class="font-weight-600">Inventario</span>
                                        <div class="switch right">
                                            <label>
                                                <input onclick="setSetting('inflows_notification',this.checked)" type="checkbox"
                                                       @if($inflows_notification==true)
                                                       checked
                                                        @endif>
                                                <span class="lever"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <p>Activar para enviar Notificaciones Push cuando se registra nuevo stock en el inventario.</p>
                                </li>
                            </ul>
                            <h6 class="mt-5 mb-3 ml-3">Actividad Reciente</h6>
                            <div class="divider"></div>
                            <ul class="collection border-none">
                                <li class="collection-item border-none">
                                    <div class="m-0">
                                        <span class="font-weight-600">Ventas</span>
                                        <div class="switch right">
                                            <label>
                                                <input onclick="setSetting('sales_activity',this.checked)" type="checkbox"
                                                        @if($sales_activity==true)
                                                            checked
                                                        @endif>
                                                <span class="lever"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <p>Activar para mostrar los nuevos registros de ventas.</p>
                                </li>
                                <li class="collection-item border-none">
                                    <div class="m-0">
                                        <span class="font-weight-600">Clientes</span>
                                        <div class="switch right">
                                            <label>
                                                <input onclick="setSetting('customers_activity',this.checked)" type="checkbox"
                                                       @if($customers_activity==true)
                                                       checked
                                                        @endif>
                                                <span class="lever"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <p>Activar para mostrar los nuevos registros de clientes.</p>
                                </li>
                                <li class="collection-item border-none">
                                    <div class="m-0">
                                        <span class="font-weight-600">Cuentas</span>
                                        <div class="switch right">
                                            <label>
                                                <input onclick="setSetting('accounts_activity',this.checked)" type="checkbox"
                                                       @if($accounts_activity==true)
                                                       checked
                                                        @endif>
                                                <span class="lever"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <p>Activar para mostrar los nuevos registros de cuentas de ventas a crédito.</p>
                                </li>
                                <li class="collection-item border-none">
                                    <div class="m-0">
                                        <span class="font-weight-600">Inventario</span>
                                        <div class="switch right">
                                            <label>
                                                <input onclick="setSetting('inflows_activity',this.checked)" type="checkbox"
                                                       @if($inflows_activity==true)
                                                       checked
                                                        @endif>
                                                <span class="lever"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <p>Activar para mostrar los nuevos registros del inventario.</p>
                                </li>
                                <li class="collection-item border-none">
                                    <div class="m-0">
                                        <span class="font-weight-600">Libros</span>
                                        <div class="switch right">
                                            <label>
                                                <input onclick="setSetting('books_activity',this.checked)" type="checkbox"
                                                       @if($books_activity==true)
                                                       checked
                                                        @endif>
                                                <span class="lever"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <p>Activar para mostrar los nuevos registros de libros.</p>
                                </li>
                                <li class="collection-item border-none">
                                    <div class="m-0">
                                        <span class="font-weight-600">Presentaciones de Libro</span>
                                        <div class="switch right">
                                            <label>
                                                <input onclick="setSetting('book_types_activity',this.checked)" type="checkbox"
                                                       @if($book_types_activity==true)
                                                       checked
                                                        @endif>
                                                <span class="lever"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <p>Activar para mostrar los nuevos registros Presentaciones de libros (Tapa Dura, Tapa Suave, Audiolibro).</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </aside>
        <!-- END RIGHT SIDEBAR NAV-->
    </div>
    <!-- END WRAPPER -->
    @section('modals')
    @show
</div>
<!-- END MAIN -->
<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- START FOOTER -->
<footer class="page-footer gradient-45deg-purple-deep-orange">
    <div class="footer-copyright">
        <div class="container">
          <span>Copyright ©
            <script type="text/javascript">
              document.write(new Date().getFullYear());
            </script> <a class="grey-text text-lighten-4" href="http://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank">PIXINVENT</a> All rights reserved.</span>
            <span class="right hide-on-small-only"> Design and Developed by <a class="grey-text text-lighten-4" href="https://pixinvent.com/">PIXINVENT</a></span>
        </div>
    </div>
</footer>
@section('forms')
@show
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
<!-- ================================================
      Scripts
================================================ -->
<script>
    function setSetting(key, val){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var data = {
            "_token": '{{ csrf_token() }}',
            "key" : key,
            "val" : val
        };
        $.ajax({
            url: '{{ route('system_settings') }}',
            dataType: 'text',
            type: 'post',
            data: data,
            success: function( data, textStatus, jQxhr ){
                var d = JSON.parse(data);
                Materialize.toast(d.comments, 2000, 'rounded');
            },
            error: function( jqXhr, textStatus, errorThrown ){
                console.log( errorThrown );
            }
        });
    }
</script>
<!-- jQuery Library -->
<script type="text/javascript" src="{!! asset('vendors/jquery-3.2.1.min.js') !!}"></script>
<!--materialize js-->
<script type="text/javascript" src="{!! asset('js/materialize.min.js') !!}"></script>
<!--prism-->
<script type="text/javascript" src="{!! asset('vendors/prism/prism.js') !!}"></script>
<!--scrollbar-->
<script type="text/javascript" src="{!! asset('vendors/perfect-scrollbar/perfect-scrollbar.min.js') !!}"></script>
<!--plugins.js - Some Specific JS codes for Plugin Settings-->
<script type="text/javascript" src="{!! asset('js/plugins.js') !!}"></script>
<!--custom-script.js - Add your own theme custom JS-->
<script type="text/javascript" src="{!! asset('js/custom-script.js') !!}"></script>
@section('js_content')
@show
</body>
</html>