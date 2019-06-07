@extends('layouts.app')

@section('content')

<div id="formularioLogin">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="divFormularioLogin">
                    <div class="headerFormularioLogin">
                        <img src="{{ asset('/img/logoCE.png') }}" width="180px">
                    </div>
                    <div class="headerFormularioLoginImg">
                        <img src="{{ asset('/img/fondoFormLogin.png') }}" width="100%">
                    </div>

                     @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="tituloFormularioLogin">
                        <h3>EFECTIVA ELEARNING</h3>
                    </div>
                    <form class="form-horizontal" method="POST" action="{{ url('inicioSesion') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Correo:</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="correo_persona" value="{{ old('correo_persona') }}" required="">
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password:</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="btnLogin form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                            </div>
                        </div>
                        <br>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
