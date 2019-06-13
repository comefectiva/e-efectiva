<nav class="navbar navbar-default navbar-static-top" style="margin-bottom: 30px;">
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
                                {!! Form::open(array('url' => 'cursos/busquedaGlobal', 'method' => 'get')) !!}
                                <div class="form-group">
                                    {{ Form::text('nombre', null, ['class' => 'form-control']) }}
                                </div> 
                                {!! Form::close() !!}
                        </div>
                                                <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    Hola, 
                                    @foreach(Session::get('e-efectiva') as $value)
                                        {{ $value->nombre_persona." ".$value->apellido_persona }}
                                    @endforeach
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ url('perfil') }}">Mi perfil</a>
                                        <a href="{{ url('lagout') }}"
                                           onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                            Cerrar Sesi&oacute;n
                                        </a>

                                        <form id="logout-form" action="{{ url('lagout') }}" method="GET" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                           
                        </ul>
                       
                    </div>
                </div>
</nav>
