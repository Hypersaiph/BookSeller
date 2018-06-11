<!DOCTYPE html>
<html lang="en">
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
    <title>Media | Materialize - Material Design Admin Template</title>
    <!-- Favicons-->
    <link rel="icon" href="../../images/favicon/favicon-32x32.png" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="../../images/favicon/apple-touch-icon-152x152.png">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
    <!-- For Windows Phone -->
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
</head>
<body>
    <div id="media-slider">
        <div class="slider">
            <ul class="slides">
                @foreach($book->images as $image)
                    <li>
                        <img src="{{URL::asset('images/banners/'.$image->name)}}">
                        <!-- random image -->
                        <div class="caption {{$image->image_type->html_class}}">
                            <h3>{{$image->big_text}}</h3>
                            <h5 class="light grey-text text-lighten-3">{{$image->small_text}}</h5>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="row">
        <div class="col s6">
            <img class="materialboxed" src="{{URL::asset('images/books/'.$book->cover_image)}}">
        </div>
        <div class="col s6">
            {!!$book->description!!}
        </div>
        </div>
    </div>
    <div class="container">
        <div class="section">
            <div class="divider"></div>
            <div class="row">
                <div class="col s12">
                    <h4 class="header">Disponible en</h4>
                </div>
                <section class="plans-container" id="plans">
                    @foreach($book->book_types as $type)
                        <article class="col s12 m6 l4">
                            <div class="card hoverable">
                                <div class="card-image gradient-45deg-light-blue-cyan waves-effect">
                                    <div class="card-title">{{$type->type->type}}</div>
                                    <div class="price">
                                        <sup>Bs</sup>{{$type->price}}
                                        <sub>/unidad</sub>
                                    </div>
                                    <div class="price-desc">Entrega rápida</div>
                                </div>
                                <div class="card-content">
                                    <ul class="collection">
                                        @if($type->pages)
                                        <li class="collection-item">{{$type->pages}} páginas</li>
                                        @endif
                                        @if($type->duration)
                                        <li class="collection-item">duración: {{$type->duration}}</li>
                                            @endif
                                            @if($type->width)
                                            <li class="collection-item">{{$type->width}} cm ancho</li>
                                            @endif
                                            @if($type->height)
                                            <li class="collection-item">{{$type->height}} cm alto</li>
                                                @endif
                                            @if($type->weight)
                                            <li class="collection-item">{{$type->weight}} Kg peso</li>
                                            @endif
                                    </ul>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </section>
            </div>
        </div>
    </div>
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
</body>
</html>