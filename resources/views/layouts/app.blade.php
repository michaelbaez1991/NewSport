<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@section('title')NewSportKing</title>

    <link rel="shortcut icon" href="img/favicon_sitio.png">

    <!-- Custom fonts for this template -->
    <link href="{{ asset('css/fa-svg-with-js.css') }}" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/clean-blog.min.css') }}" rel="stylesheet">

    <script defer src="{{ asset('js/fontawesome-all.js') }}"></script>
</head>
<body>
    {{-- Barra de navegacion - NAV --}}
    @section('sidebar')
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">Lo mejor del deporte rey</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                  Menu
                  <i class="fa fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        {{-- Noticias --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ route('posts') }}">Noticias</a>
                            {{-- <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Mis noticias</a>
                                <a class="dropdown-item" href="#">Últimas</a>
                                <a class="dropdown-item" href="#">Más vistas</a>
                                <a class="dropdown-item" href="#">Todas</a>
                            </div> --}}
                        </li>
                        {{-- Categorias --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#">Categorías</a>
                            {{-- <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Categorias</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Mis Cate </a>
                                <a class="dropdown-item" href="#">Últimas</a>
                                <a class="dropdown-item" href="#">Más vistas</a>
                                <a class="dropdown-item" href="#">Todas</a>
                            </div> --}}
                        </li>
                        {{-- Etiquetas --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ route('tags') }}">Etiquetas</a>
                            {{-- <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Etiquetas</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('posts') }}">Últimas</a>
                                <a class="dropdown-item" href="{{ route('posts') }}">Más vistas</a>
                                <a class="dropdown-item" href="#">Todas</a>
                            </div> --}}
                        </li>

                        {{-- Resultados --}}
                        <li class="nav-item">
                            <a class="nav-link" href="#">Resultados</a>
                        </li>
                        {{-- Usuario --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-users fa-2x"></i>
                            </a>
                            @if(Auth::check())
                                @if(Auth::user()->hasRole('admin'))
                                    <div class="dropdown-menu">
                                        <div class="col-md-12 text-center">
                                            <a class="dropdown-item" href="#">Gestión</a>
                                            <a class="dropdown-item" href="#">Mis Posts</a>
                                            <a class="dropdown-item" href="#">Perfil</a>
                                            <a class="dropdown-item" href="{{ route('logout') }}">Salir <i class="fas fa-power-off"></i></a>
                                        </div>
                                    </div>
                                @elseif(Auth::user()->hasRole('user'))
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Mis Posts</a>
                                        <a class="dropdown-item" href="#">Perfil</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}">Salir <i class="fas fa-power-off"></i></a>
                                    </div>
                                @endif
                            @else
                                <div class="dropdown-menu">
                                    <div class="col-md-12 text-center">
                                        <a class="dropdown-item" href="{{ route('login') }}">Ingreso <i class="fas fa-unlock-alt"></i></a>  
                                        <a class="dropdown-item" href="{{ route('register') }}">Registro <i class="fas fa-user-plus"></i></a>
                                    </div>
                                </div>
                            @endif
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="index.html">Fichajes</a>
                        </li> --}}
                        {{-- <li class="nav-item">
                            <a href="{{ route('logout') }}"><i class="fas fa-power-off fa-3x"></i></a>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page Header -->
        <header class="masthead" style="background-image:url('{{ asset('img/champions.jpg') }}')">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <div class="site-heading">
                            @if(Auth::check())
                                @if(Auth::user()->hasRole('admin'))
                                    <h2>BIENVENIDO {{ Auth::user()->name }}</h2>
                                @elseif(Auth::user()->hasRole('user'))
                                    <h2>BIENVENIDO {{ Auth::user()->name }}</h2>
                                @endif
                            @else
                                <h2>BIENVENIDO A</h2>
                            @endif
                            <h1>NEWSPORTKING</h1>
                            <i>
                                <img src="{{ asset('img/paris.png') }}" style="width:80px; height:80px;"> 
                                <b>VS</b>
                                <img src="{{ asset('img/1.png') }}" style="width:100px; height:100px;">
                            </i>
                            <span class="subheading"></span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    @show

    @section('body')
    @show

    <!-- Footer -->
    @section('footer')
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <ul class="list-inline text-center">
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="fab fa-facebook-square fa-3x"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="fab fa-twitter fa-3x"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="fab fa-instagram fa-3x"></i>
                                </a>
                            </li>
                        </ul>
                        <p class="copyright text-muted">Copyright &copy; Your Website 2017</p>
                    </div>
                </div>
            </div>
        </footer>
    @show

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <!-- Custom scripts for this template -->
    <script src="{{ asset('js/clean-blog.min.js') }}"></script>
</body>
</html>