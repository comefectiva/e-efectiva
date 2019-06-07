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