@extends('layouts.app')

@section('content')

<div class="headerImg col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        
    <div class="contenedorBienvenida col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        @include('Includes.carousel');
    </div>
</div>

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
    	<div class="formularioPersona col-12 col-sm-8 col-md-8 col-lg-8 col-xl-8">
    		<h3>
    			Datos personales
    		</h3>
    		<hr>
    		{!! Form::open(array('url' => 'editPerson', 'method' => 'POST', 'files' => true)) !!}
                        
            {{ csrf_field() }}

    		@foreach(Session::get('e-efectiva') as $value)
    			
    			{{ Form::hidden('', $value->clave_persona , ['id' => 'clave_persona_bd', 'class' => 'form-control']) }}

    			<div class="form-group col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    				{!! Form::label('status', 'Foto persona:', array('class' => 'control-label')) !!}<br><br>
    				<div class="img col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2">
	    				 @foreach(Session::get('e-efectiva') as $value)
	    				 	<img class="img-circle" src="{{url('img/users/'.''.$value->foto_persona) }}" width="100%">
	                    @endforeach
                	</div>
                	<div class="img col-12 col-sm-10 col-md-10 col-lg-10 col-xl-10">
	         			{{ Form::file('file', ['id' => 'file','class' => 'form-control', 'disabled']) }}
         			</div>
         		</div>

    			<div class="form-group">
         			{!! Form::label('status', 'Identificaci&oacute;n:', array('class' => 'control-label')) !!}
         			{{ Form::text('identificacionDi', $value->id_persona , ['class' => 'form-control', 'disabled']) }}
         		</div>
				<div class="form-group">
         			{!! Form::label('status', 'C&oacute;digo empleado:', array('class' => 'control-label')) !!}
         			{{ Form::text('codigoEmpleado', $value->codigo_empleado , ['class' => 'form-control', 'disabled']) }}
         		</div>
				<div class="form-group">
         			{!! Form::label('status', 'Nombre:', array('class' => 'control-label')) !!}
         			{{ Form::text('nombre_persona', $value->nombre_persona , ['id' => 'nombre_persona', 'class' => 'form-control', 'disabled']) }}
         		</div>
         		<div class="form-group">
         			{!! Form::label('status', 'Apellido:', array('class' => 'control-label')) !!}
         			{{ Form::text('apellido_persona', $value->apellido_persona , ['id' => 'apellido_persona','class' => 'form-control', 'disabled']) }}
         		</div>
         		<div class="form-group">
         			{!! Form::label('status', 'Ciudad:', array('class' => 'control-label')) !!}

                    <select class="form-control" name="ciudad_persona" id="ciudad_persona" disabled="">
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
         			{{ Form::text('telefono_persona', $value->telefono_persona , ['id' => 'telefono_persona','class' => 'form-control', 'disabled']) }}
         		</div>
            @endforeach        
    	</div>
    	<h3>
    			Datos usuario
    		</h3>
    		<hr>
    	<div class="formularioUsuario col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">

    		@foreach(Session::get('e-efectiva') as $value)
    		<div class="form-group">
         			{!! Form::label('status', 'Nombre de usuario:', array('class' => 'control-label')) !!}
         			{{ Form::text('slug_persona_bd', $value->slug_persona , ['id' => 'slug_usuario_persona', 'class' => 'form-control', 'disabled']) }}
         		</div>

				<div class="form-group">
         			{!! Form::label('status', 'Correo:', array('class' => 'control-label')) !!}
         			{{ Form::text('correo_persona', $value->correo_persona , ['id' => 'correo_persona','class' => 'form-control', 'disabled']) }}
         		</div>
         		<div class="form-group">
         			{{Form::password('clave_persona', ['id' => 'clave_persona','class' => 'form-control', 'placeholder' => 'Tu clave de sesion', 'disabled'])}}
         			
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
            		{{ Form::button('Editar', array('id' => 'edicion_persona_form','class' => 'btn btn-success')) }}
            		{{ Form::submit('Actualizar', array('id' => 'actualizar_persona_form','class' => 'btn btn-info', 'disabled')) }}
            	</center>
            </div>

    	{!! Form::close() !!}
    </div>

</div>
	 <?php $clave = $password; ?> 
    @stop @section('scripts')

    <script type="text/javascript">

    $(document).on("click","#verClave",function(){
    	$("#ver").attr("class","glyphicon glyphicon-eye-close");
    	$("#ver").attr("title","Ocultar nuevamente");

    	$("#verClave").attr("id","ocultarClave");

    	$("#clave_persona").attr("type","text");
    });


    $(document).on("click","#ocultarClave",function(){
    	$("#ver").attr("class","glyphicon glyphicon-eye-open");
    	$("#ver").attr("title","Ver clave");

    	$("#ocultarClave").attr("id","verClave");
    	
    	$("#clave_persona").attr("type","password");
    });

    $(document).ready(function(){
    	var clave = $("#clave_persona_bd").val();
    	$("#clave_persona").val(clave);
    });

	$(document).on("click",".generar_clave_aleatoria",function(){
		$("#clave_persona").val('<?php echo $clave; ?>');
		$("#clave_persona_hidden").val('<?php echo $clave; ?>');

		 $("#nombre_persona").prop('disabled', false);
        $("#apellido_persona").prop('disabled', false);
        $("#ciudad_persona").prop('disabled', false);
        $("#telefono_persona").prop('disabled', false);

        $("#correo_persona").prop('disabled', false);
        $("#clave_persona").prop('disabled', false);
        
        $("#actualizar_persona_form").prop('disabled', false);


		$("#edicion_persona_form").html("Cancelar");
		$("#edicion_persona_form").attr("class","btn btn-danger");
		
		$("#edicion_persona_form").attr("id","cancelar_persona_form");
	});

</script>
    @stop