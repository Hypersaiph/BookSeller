@extends('layouts.master')

@section('title')
    Usuarios
@endsection
@section('css_assets')
    <link href="{!! asset('js/plugins/sweetalert/dist/sweetalert.css') !!}" type="text/css" rel="stylesheet" media="screen,projection">
@endsection
@section('search_big')
    <form action="" method="GET">
        <i class="material-icons">search</i>
        <input type="text" name="search" class="header-search-input z-depth-2" placeholder="Búsqueda por nombre" />
    </form>
@endsection
@section('search_small')
    <form action="" method="GET">
        <input type="text" name="search" class="header-search-input z-depth-2" placeholder="Búsqueda por nombre">
    </form>
@endsection
@section('navigation')
    <div class="row">
        <div class="col s10 m6 l6">
            <h5 class="breadcrumbs-title">Usuarios</h5>
            <ol class="breadcrumbs">
                <li><a href="index.html">Usuarios</a></li>
                <li class="active"><a href="#">Lista</a></li>
            </ol>
        </div>
        <div class="col s2 m6 l6">
            <a class="btn dropdown-settings waves-effect waves-light breadcrumbs-btn right gradient-45deg-light-blue-cyan gradient-shadow" href="#!" data-activates="dropdown1">
                <i class="material-icons hide-on-med-and-up">settings</i>
                <span class="hide-on-small-onl">Settings</span>
                <i class="material-icons right">arrow_drop_down</i>
            </a>
            <ul id="dropdown1" class="dropdown-content">
                <li><a href="#!" class="grey-text text-darken-2">Access<span class="badge">1</span></a>
                </li>
                <li><a href="#!" class="grey-text text-darken-2">Profile<span class="new badge">2</span></a>
                </li>
                <li><a href="#!" class="grey-text text-darken-2">Notifications</a>
                </li>
            </ul>
        </div>
    </div>
@endsection
@section('container')
    <!-- Floating Action Button -->
    <div class="fixed-action-btn " style="bottom: 50px; right: 19px;">
        <a class="btn-floating btn-large gradient-45deg-light-blue-cyan gradient-shadow" href="{{ route('users.create') }}">
            <i class="material-icons">add</i>
        </a>
        <ul>
            <li>
                <a href="css-helpers.html" class="btn-floating blue">
                    <i class="material-icons">help_outline</i>
                </a>
            </li>
            <li>
                <a href="cards-extended.html" class="btn-floating green">
                    <i class="material-icons">widgets</i>
                </a>
            </li>
            <li>
                <a href="app-calendar.html" class="btn-floating amber">
                    <i class="material-icons">today</i>
                </a>
            </li>
            <li>
                <a href="app-email.html" class="btn-floating red">
                    <i class="material-icons">mail_outline</i>
                </a>
            </li>
        </ul>
    </div><!-- Floating Action Button -->
@endsection
@section('modals')
@endsection
@section('forms')
@endsection
@section('js_content')
    <script>
    </script>
@endsection
