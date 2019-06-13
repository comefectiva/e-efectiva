@extends('layouts.app')

@section('content')



<div class="bodyPagina col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="panelUsuario col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
        @include('Includes.menuPerfil');
        <div class="divTercero col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            DIV VACIO
        </div>
    </div>

    <div class="cursosUsuario col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
         @if(session()->has('message'))
                        <div class="alert alert-success">
                            <b>
                                {{ session()->get('message') }} 
                            </b>
                        </div>
        @endif

        <div class="formularioPersona col-12 col-sm-8 col-md-8 col-lg-8 col-xl-8">
            <h3>
                <a href="{{url('/')}}" style="text-decoration: none;">
                    <button class="btn btn-default btn-sm">
                        <span class="glyphicon glyphicon-arrow-left"></span>
                    </button>
                </a>
                Mis datos personales
            </h3>
            <hr>
            {!! Form::open(array('url' => 'editPerson', 'method' => 'POST', 'files' => true)) !!}
                        
            {{ csrf_field() }}

            @foreach($personas as $value)

                {{ Form::hidden('foto_persona_bd', $value->foto_persona , ['id' => 'foto_persona_bd','class' => 'form-control']) }}

                <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    {!! Form::label('status', 'Foto persona:', array('class' => 'control-label')) !!}<br><br>
                    <div class="img col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                         @foreach($personas as $value)
                            <img class="img-circle" src="{{url('img/users/'.''.$value->foto_persona) }}" width="100%">
                        @endforeach
                    </div>
                    <div class="img col-12 col-sm-10 col-md-10 col-lg-10 col-xl-10">
                        {{ Form::file('file', ['id' => 'file_persona_perfil','class' => 'form-control', 'disabled']) }}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('status', 'Identificaci&oacute;n:', array('class' => 'control-label')) !!}
                    {{ Form::text('identificacion_persona_perfil', $value->id_persona , ['id' => 'identificacion_persona_perfil','class' => 'form-control', 'disabled']) }}
                </div>
                <div class="form-group">
                    {!! Form::label('status', 'C&oacute;digo empleado:', array('codigo_persona_perfil', 'class' => 'control-label')) !!}
                    {{ Form::text('codigo_persona_perfil', $value->codigo_empleado , ['id'=>'codigo_persona_perfil','class' => 'form-control', 'disabled']) }}
                </div>
                <div class="form-group">
                    {!! Form::label('status', 'Nombre:', array('class' => 'control-label')) !!}
                    {{ Form::text('nombre_persona', $value->nombre_persona , ['id' => 'nombre_persona_perfil', 'class' => 'form-control', 'disabled']) }}
                </div>
                <div class="form-group">
                    {!! Form::label('status', 'Apellido:', array('class' => 'control-label')) !!}
                    {{ Form::text('apellido_persona', $value->apellido_persona , ['id' => 'apellido_persona_perfil','class' => 'form-control', 'disabled']) }}
                </div>
                <div class="form-group">
                    {!! Form::label('status', 'Ciudad:', array('class' => 'control-label')) !!}

                    <select class="form-control" name="ciudad_persona" id="ciudad_persona_perfil" disabled="">
                        @foreach($ciudades as $ciudad)
                            @if($value->ciudad_persona == $ciudad->id_ciudad)
                                <option value="{{$ciudad->id_ciudad}}" selected="">
                                    {{$ciudad->nombre_ciudad}}
                                </option>
                            @else
                                <option value="{{$ciudad->id_ciudad}}" >
                                    {{$ciudad->nombre_ciudad}}
                                </option>
                            @endif
                        @endforeach
                    </select>

                </div>
                <div class="form-group">
                    {!! Form::label('status', 'Telefono:', array('class' => 'control-label')) !!}
                    {{ Form::text('telefono_persona', $value->telefono_persona , ['id' => 'telefono_persona_perfil','class' => 'form-control', 'disabled']) }}
                </div>
                <div class="form-group">
                    {!! Form::label('status', 'Perfil:', array('class' => 'control-label')) !!}
                    <select class="form-control" name="" id="" disabled="">
                        @foreach($perfiles as $perfil)
                            @if($value->id_perfil == $perfil->id)
                                <option value="{{$perfil->id}}" selected="">
                                    {{$perfil->nombre_perfil}}
                                </option>
                            @else
                                <option value="{{$perfil->id}}" >
                                    {{$perfil->nombre_perfil}}
                                </option>
                            @endif
                        @endforeach
                    </select>

                </div>
            @endforeach        
        </div>
        <h3>
                Datos usuario
            </h3>
            <hr>
        <div class="formularioUsuario col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">

            @foreach($personas as $value)
            <div class="form-group">
                    {!! Form::label('status', 'Nombre de usuario:', array('class' => 'control-label')) !!}
                    {{ Form::text('slug_persona_bd', $value->slug_persona , ['id' => 'slug_usuario_persona_perfil', 'class' => 'form-control', 'disabled']) }}
                </div>

                <div class="form-group">
                    {!! Form::label('status', 'Correo:', array('class' => 'control-label')) !!}
                    {{ Form::text('correo_persona', $value->correo_persona , ['id' => 'correo_persona_perfil','class' => 'form-control', 'disabled']) }}
                </div>
                <div class="form-group">
                    {{Form::text('clave_persona', $value->clave_persona, ['id' => 'clave_persona_perfil','class' => 'form-control', 'placeholder' => 'Tu clave de sesion', 'disabled'])}}
                    
                    <br>
                    <center>
                        {{ Form::button('Generar clave aleatoria', array('id' => 'generar_clave_aleatoria','class' => 'btn btn-success generar_clave_aleatoria')) }}
                        
                        <button type="button" id="verClave" class="btn btn-success " title="ver clave">
                            <span id="ver" class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> 
                        </button>
                    </center>
                </div>

            @endforeach
                <div class="form-group">
                
            </div>
        </div> 

        <div class="form-group col-12 col-sm-4 col-md-12 col-lg-12 col-xl-12">
                <center>
                    {{ Form::button('Editar', array('id' => 'edicion_persona_perfil_form','class' => 'btn btn-success')) }}
                    {{ Form::submit('Actualizar', array('id' => 'actualizar_persona_form','class' => 'btn btn-info', 'disabled')) }}
                </center>
            </div>

        {!! Form::close() !!}
    </div>

</div>
 {{ Form::hidden('', $password, array('id' => 'clave_generada')) }}


    @stop @section('scripts')

    <script type="text/javascript">

        $(document).ready(function(){
            $("#clave_persona_perfil").attr("type","password");
        });

        $(document).on("click","#verClave", function(){
            $("#clave_persona_perfil").attr("type","text");
            $("#ver").attr("class","glyphicon glyphicon-eye-close");

            $("#verClave").attr("id","ocultar");
        });


        $(document).on("click","#ocultar", function(){
            $("#clave_persona_perfil").attr("type","password");
            $("#ver").attr("class","glyphicon glyphicon-eye-open");

            $("#ocultar").attr("id","verClave");
        });

        $(document).on("click","#generar_clave_aleatoria", function(){
            
            var clave_nueva = $("#clave_generada").val();
            
            $("#clave_persona_perfil").attr("value", clave_nueva);
            $("#clave_persona_perfil_bd").attr("value", clave_nueva);
        
        });


    </script>
    @stop