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


        @if(session('e-efectiva'))
            @include('includes.nav');
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
        <script src="{{ asset('js/functionsWeb.js') }}"></script>

        @yield('scripts')

    </body>
</html>
