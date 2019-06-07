<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Elearning Efectiva') }}</title>

        <!-- Styles -->
        <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0-rc2/css/bootstrap-glyphicons.css">


    </head>
    <body>

        <div id="app">

    @if (Auth::user())

            <nav class="navbar navbar-default navbar-static-top">
                <div class="container">
                    <div class="navbar-header">

                        <!-- Collapsed Hamburger -->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <!-- Branding Image -->
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <a href="{{ url('/') }}" class="navbar-left">
                                <img src="{{ asset('/img/logoEmpresa.png') }}" width="170px">
                            </a>
                        </a>
                    </div>

                    <div class="collapse navbar-collapse top-right" id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->
                        <div class="menuNav col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                            <img class="imagenNavegacion" id="" src="{{ asset('/img/menuNav.png') }}" width="30px;">
                            <!--
                            @can('cursos.index')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('cursos.index') }}">
                                    Productos
                                </a>
                            </li>
                            @endcan

                            @can('users.index')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('users.index') }}">
                                    Usuarios
                                </a>
                            </li>
                            @endcan

                            @can('roles.index')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('roles.index') }}">
                                    Roles
                                </a>
                            </li>
                            @endcan
                            -->
                        </div>
                        <div class="busqueda col-12 col-sm-5 col-md-5 col-lg-5 col-xl-5">
                         
                        </div>
                       
                    </div>
                </div>
</nav>

@endif


            <div class="container">
                <div class="menuCursos">
                    <div class="opciones">
                        <p>
                            {{ str_limit('Curso uno Curso unoCurso unoCurso uno', $limit = 40, $end = '...') }}
                        </p>
                    </div>
                    <div class="opciones">
                        <p>
                            {{ str_limit('Curso uno Curso unoCurso unoCurso uno', $limit = 40, $end = '...') }}
                        </p>
                    </div>
                    <div class="opciones">
                        <p>
                            {{ str_limit('Curso uno Curso unoCurso unoCurso uno', $limit = 40, $end = '...') }}
                        </p>
                    </div>
                    <div class="opciones">
                        <p>
                            {{ str_limit('Curso uno Curso unoCurso unoCurso uno', $limit = 40, $end = '...') }}
                        </p>
                    </div>
                    <div class="opciones">
                        <p>
                            {{ str_limit('Curso uno Curso unoCurso unoCurso uno', $limit = 40, $end = '...') }}
                        </p>
                    </div>
                </div>
            </div>
            @if(session('info'))
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="alert alert-success">
                            {{ session('info') }}
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @yield('content')
        </div>
        <!-- Footer -->
        <footer class="page-footer font-small blue">
            <!-- Copyright -->
            <div class="footer-copyright text-center py-3">
                <br>
                <p>
                    © 2018 Copyright:
                    <a href="https://comunicacionefectiva.com"> Comunicacion Efectiva </a>
                </p>
            </div>
            <!-- Copyright -->

        </footer>
        <!-- Footer -->
        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.3.0.min.js"></script>


        <script src="{{ asset('js/bootstrap.js') }}"></script>
        <script src="{{ asset('js/functions.js') }}"></script>

    </body>
</html>
