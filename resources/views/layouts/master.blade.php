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
                        <a href="javascript:void(0);" class="waves-effect waves-block waves-light notification-button" data-activates="notifications-dropdown">
                            <i class="material-icons">notifications_none
                                <small class="notification-badge">5</small>
                            </i>
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

                <!-- notifications-dropdown -->
                <ul id="notifications-dropdown" class="dropdown-content">
                    <li>
                        <h6>NOTIFICACIONES
                            <span class="new badge">5</span>
                        </h6>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#!" class="grey-text text-darken-2">
                            <span class="material-icons icon-bg-circle cyan small">add_shopping_cart</span> A new order has been placed!</a>
                        <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">2 hours ago</time>
                    </li>
                    <li>
                        <a href="#!" class="grey-text text-darken-2">
                            <span class="material-icons icon-bg-circle red small">stars</span> Completed the task</a>
                        <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">3 days ago</time>
                    </li>
                    <li>
                        <a href="#!" class="grey-text text-darken-2">
                            <span class="material-icons icon-bg-circle teal small">settings</span> Settings updated</a>
                        <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">4 days ago</time>
                    </li>
                    <li>
                        <a href="#!" class="grey-text text-darken-2">
                            <span class="material-icons icon-bg-circle deep-orange small">today</span> Director meeting started</a>
                        <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">6 days ago</time>
                    </li>
                    <li>
                        <a href="#!" class="grey-text text-darken-2">
                            <span class="material-icons icon-bg-circle amber small">trending_up</span> Generate monthly report</a>
                        <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">1 week ago</time>
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
                    <li>
                        <a href="#" class="grey-text text-darken-1">
                            <i class="material-icons">settings</i> Configuraciones
                        </a>
                    </li>
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
                            <a href="{{ route('customers.index') }}" class="waves-effect waves-cyan">
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
                            <a href="{{ route('customers.index') }}" class="waves-effect waves-cyan">
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
                            <a href="{{ route('customers.index') }}" class="waves-effect waves-cyan">
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
                                <li class="tab col s4">
                                    <a href="#activity" class="active">
                                        <span class="material-icons">graphic_eq</span>
                                    </a>
                                </li>
                                <li class="tab col s4">
                                    <a href="#chatapp">
                                        <span class="material-icons">face</span>
                                    </a>
                                </li>
                                <li class="tab col s4">
                                    <a href="#settings">
                                        <span class="material-icons">settings</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div id="settings" class="col s12">
                            <h6 class="mt-5 mb-3 ml-3">GENERAL SETTINGS</h6>
                            <ul class="collection border-none">
                                <li class="collection-item border-none">
                                    <div class="m-0">
                                        <span class="font-weight-600">Notifications</span>
                                        <div class="switch right">
                                            <label>
                                                <input checked type="checkbox">
                                                <span class="lever"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <p>Use checkboxes when looking for yes or no answers.</p>
                                </li>
                                <li class="collection-item border-none">
                                    <div class="m-0">
                                        <span class="font-weight-600">Show recent activity</span>
                                        <div class="switch right">
                                            <label>
                                                <input checked type="checkbox">
                                                <span class="lever"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                                </li>
                                <li class="collection-item border-none">
                                    <div class="m-0">
                                        <span class="font-weight-600">Notifications</span>
                                        <div class="switch right">
                                            <label>
                                                <input type="checkbox">
                                                <span class="lever"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <p>Use checkboxes when looking for yes or no answers.</p>
                                </li>
                                <li class="collection-item border-none">
                                    <div class="m-0">
                                        <span class="font-weight-600">Show recent activity</span>
                                        <div class="switch right">
                                            <label>
                                                <input type="checkbox">
                                                <span class="lever"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                                </li>
                                <li class="collection-item border-none">
                                    <div class="m-0">
                                        <span class="font-weight-600">Show your emails</span>
                                        <div class="switch right">
                                            <label>
                                                <input type="checkbox">
                                                <span class="lever"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <p>Use checkboxes when looking for yes or no answers.</p>
                                </li>
                                <li class="collection-item border-none">
                                    <div class="m-0">
                                        <span class="font-weight-600">Show Task statistics</span>
                                        <div class="switch right">
                                            <label>
                                                <input type="checkbox">
                                                <span class="lever"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                                </li>
                            </ul>
                        </div>
                        <div id="chatapp" class="col s12">
                            <div class="collection border-none">
                                <a href="#!" class="collection-item avatar border-none">
                                    <img src="{{URL::asset('images/avatar/avatar-1.png')}}" alt="" class="circle cyan">
                                    <span class="line-height-0">Elizabeth Elliott </span>
                                    <span class="medium-small right blue-grey-text text-lighten-3">5.00 AM</span>
                                    <p class="medium-small blue-grey-text text-lighten-3">Thank you </p>
                                </a>
                                <a href="#!" class="collection-item avatar border-none">
                                    <img src="{{URL::asset('images/avatar/avatar-2.png')}}" alt="" class="circle deep-orange accent-2">
                                    <span class="line-height-0">Mary Adams </span>
                                    <span class="medium-small right blue-grey-text text-lighten-3">4.14 AM</span>
                                    <p class="medium-small blue-grey-text text-lighten-3">Hello Boo </p>
                                </a>
                                <a href="#!" class="collection-item avatar border-none">
                                    <img src="{{URL::asset('images/avatar/avatar-3.png')}}" alt="" class="circle teal accent-4">
                                    <span class="line-height-0">Caleb Richards </span>
                                    <span class="medium-small right blue-grey-text text-lighten-3">9.00 PM</span>
                                    <p class="medium-small blue-grey-text text-lighten-3">Keny ! </p>
                                </a>
                                <a href="#!" class="collection-item avatar border-none">
                                    <img src="{{URL::asset('images/avatar/avatar-4.png')}}" alt="" class="circle cyan">
                                    <span class="line-height-0">June Lane </span>
                                    <span class="medium-small right blue-grey-text text-lighten-3">4.14 AM</span>
                                    <p class="medium-small blue-grey-text text-lighten-3">Ohh God </p>
                                </a>
                                <a href="#!" class="collection-item avatar border-none">
                                    <img src="{{URL::asset('images/avatar/avatar-5.png')}}" alt="" class="circle red accent-2">
                                    <span class="line-height-0">Edward Fletcher </span>
                                    <span class="medium-small right blue-grey-text text-lighten-3">5.15 PM</span>
                                    <p class="medium-small blue-grey-text text-lighten-3">Love you </p>
                                </a>
                                <a href="#!" class="collection-item avatar border-none">
                                    <img src="{{URL::asset('images/avatar/avatar-6.png')}}" alt="" class="circle deep-orange accent-2">
                                    <span class="line-height-0">Crystal Bates </span>
                                    <span class="medium-small right blue-grey-text text-lighten-3">8.00 AM</span>
                                    <p class="medium-small blue-grey-text text-lighten-3">Can we </p>
                                </a>
                                <a href="#!" class="collection-item avatar border-none">
                                    <img src="{{URL::asset('images/avatar/avatar-7.png')}}" alt="" class="circle cyan">
                                    <span class="line-height-0">Nathan Watts </span>
                                    <span class="medium-small right blue-grey-text text-lighten-3">9.53 PM</span>
                                    <p class="medium-small blue-grey-text text-lighten-3">Great! </p>
                                </a>
                                <a href="#!" class="collection-item avatar border-none">
                                    <img src="{{URL::asset('images/avatar/avatar-8.png')}}" alt="" class="circle red accent-2">
                                    <span class="line-height-0">Willard Wood </span>
                                    <span class="medium-small right blue-grey-text text-lighten-3">4.20 AM</span>
                                    <p class="medium-small blue-grey-text text-lighten-3">Do it </p>
                                </a>
                                <a href="#!" class="collection-item avatar border-none">
                                    <img src="{{URL::asset('images/avatar/avatar-9.png')}}" alt="" class="circle teal accent-4">
                                    <span class="line-height-0">Ronnie Ellis </span>
                                    <span class="medium-small right blue-grey-text text-lighten-3">5.30 PM</span>
                                    <p class="medium-small blue-grey-text text-lighten-3">Got that </p>
                                </a>
                                <a href="#!" class="collection-item avatar border-none">
                                    <img src="{{URL::asset('images/avatar/avatar-1.png')}}" alt="" class="circle cyan">
                                    <span class="line-height-0">Gwendolyn Wood </span>
                                    <span class="medium-small right blue-grey-text text-lighten-3">4.34 AM</span>
                                    <p class="medium-small blue-grey-text text-lighten-3">Like you </p>
                                </a>
                                <a href="#!" class="collection-item avatar border-none">
                                    <img src="{{URL::asset('images/avatar/avatar-2.png')}}" alt="" class="circle red accent-2">
                                    <span class="line-height-0">Daniel Russell </span>
                                    <span class="medium-small right blue-grey-text text-lighten-3">12.00 AM</span>
                                    <p class="medium-small blue-grey-text text-lighten-3">Thank you </p>
                                </a>
                                <a href="#!" class="collection-item avatar border-none">
                                    <img src="{{URL::asset('images/avatar/avatar-3.png')}}" alt="" class="circle teal accent-4">
                                    <span class="line-height-0">Sarah Graves </span>
                                    <span class="medium-small right blue-grey-text text-lighten-3">11.14 PM</span>
                                    <p class="medium-small blue-grey-text text-lighten-3">Okay you </p>
                                </a>
                                <a href="#!" class="collection-item avatar border-none">
                                    <img src="{{URL::asset('images/avatar/avatar-4.png')}}" alt="" class="circle red accent-2">
                                    <span class="line-height-0">Andrew Hoffman </span>
                                    <span class="medium-small right blue-grey-text text-lighten-3">7.30 PM</span>
                                    <p class="medium-small blue-grey-text text-lighten-3">Can do </p>
                                </a>
                                <a href="#!" class="collection-item avatar border-none">
                                    <img src="{{URL::asset('images/avatar/avatar-5.png')}}" alt="" class="circle cyan">
                                    <span class="line-height-0">Camila Lynch </span>
                                    <span class="medium-small right blue-grey-text text-lighten-3">2.00 PM</span>
                                    <p class="medium-small blue-grey-text text-lighten-3">Leave it </p>
                                </a>
                            </div>
                        </div>
                        <div id="activity" class="col s12">
                            <h6 class="mt-5 mb-3 ml-3">RECENT ACTIVITY</h6>
                            <div class="activity">
                                <div class="col s3 mt-2 center-align recent-activity-list-icon">
                                    <i class="material-icons white-text icon-bg-color deep-purple lighten-2">add_shopping_cart</i>
                                </div>
                                <div class="col s9 recent-activity-list-text">
                                    <a href="#" class="deep-purple-text medium-small">just now</a>
                                    <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Jim Doe Purchased new equipments for zonal office.</p>
                                </div>
                                <div class="recent-activity-list chat-out-list row mb-0">
                                    <div class="col s3 mt-2 center-align recent-activity-list-icon">
                                        <i class="material-icons white-text icon-bg-color cyan lighten-2">airplanemode_active</i>
                                    </div>
                                    <div class="col s9 recent-activity-list-text">
                                        <a href="#" class="cyan-text medium-small">Yesterday</a>
                                        <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Your Next flight for USA will be on 15th August 2015.</p>
                                    </div>
                                </div>
                                <div class="recent-activity-list chat-out-list row mb-0">
                                    <div class="col s3 mt-2 center-align recent-activity-list-icon medium-small">
                                        <i class="material-icons white-text icon-bg-color green lighten-2">settings_voice</i>
                                    </div>
                                    <div class="col s9 recent-activity-list-text">
                                        <a href="#" class="green-text medium-small">5 Days Ago</a>
                                        <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Natalya Parker Send you a voice mail for next conference.</p>
                                    </div>
                                </div>
                                <div class="recent-activity-list chat-out-list row mb-0">
                                    <div class="col s3 mt-2 center-align recent-activity-list-icon">
                                        <i class="material-icons white-text icon-bg-color amber lighten-2">store</i>
                                    </div>
                                    <div class="col s9 recent-activity-list-text">
                                        <a href="#" class="amber-text medium-small">1 Week Ago</a>
                                        <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Jessy Jay open a new store at S.G Road.</p>
                                    </div>
                                </div>
                                <div class="recent-activity-list row">
                                    <div class="col s3 mt-2 center-align recent-activity-list-icon">
                                        <i class="material-icons white-text icon-bg-color deep-orange lighten-2">settings_voice</i>
                                    </div>
                                    <div class="col s9 recent-activity-list-text">
                                        <a href="#" class="deep-orange-text medium-small">2 Week Ago</a>
                                        <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">voice mail for conference.</p>
                                    </div>
                                </div>
                                <div class="recent-activity-list chat-out-list row mb-0">
                                    <div class="col s3 mt-2 center-align recent-activity-list-icon medium-small">
                                        <i class="material-icons white-text icon-bg-color brown lighten-2">settings_voice</i>
                                    </div>
                                    <div class="col s9 recent-activity-list-text">
                                        <a href="#" class="brown-text medium-small">1 Month Ago</a>
                                        <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Natalya Parker Send you a voice mail for next conference.</p>
                                    </div>
                                </div>
                                <div class="recent-activity-list chat-out-list row mb-0">
                                    <div class="col s3 mt-2 center-align recent-activity-list-icon">
                                        <i class="material-icons white-text icon-bg-color deep-purple lighten-2">store</i>
                                    </div>
                                    <div class="col s9 recent-activity-list-text">
                                        <a href="#" class="deep-purple-text medium-small">3 Month Ago</a>
                                        <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Jessy Jay open a new store at S.G Road.</p>
                                    </div>
                                </div>
                                <div class="recent-activity-list row">
                                    <div class="col s3 mt-2 center-align recent-activity-list-icon">
                                        <i class="material-icons white-text icon-bg-color grey lighten-2">settings_voice</i>
                                    </div>
                                    <div class="col s9 recent-activity-list-text">
                                        <a href="#" class="grey-text medium-small">1 Year Ago</a>
                                        <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">voice mail for conference.</p>
                                    </div>
                                </div>
                            </div>
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