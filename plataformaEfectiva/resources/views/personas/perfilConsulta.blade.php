@section('content')
@foreach($personas as $persona)
	{!! Form::open(array('url' => 'editPerson', 'method' => 'POST', 'files' => true)) !!}
		<div class="encabezado col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
			<div class="foto_persona col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
				<label>Fotografia:</label>
				 <img class="img-circle" src="{{url('img/users/'.''.$persona->foto_persona) }}" width="100%">
			</div>
			<div class="informacionPersona col-12 col-sm-8 col-md-8 col-lg-8 col-xl-8">
				<div class="form-group">
         			{!! Form::label('status', 'Identificacion:', array('class' => 'control-label')) !!}
         			{{ Form::text('nombre_persona', $persona->id_persona , ['id' => 'nombre_persona', 'class' => 'form-control', 'disabled']) }}
         		</div>

				<div class="form-group">
         			{!! Form::label('status', 'Nombre:', array('class' => 'control-label')) !!}
         			{{ Form::text('nombre_persona', $persona->nombre_persona , ['id' => 'nombre_persona', 'class' => 'form-control', 'disabled']) }}
         		</div>
         		<div class="form-group">
         			{!! Form::label('status', 'Apellido:', array('class' => 'control-label')) !!}
         			{{ Form::text('nombre_persona', $persona->apellido_persona , ['id' => 'nombre_persona', 'class' => 'form-control', 'disabled']) }}
         		</div>
         	</div>	
		</div>
		<div class="contenido col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
			<div class="form-group">
         			{!! Form::label('status', 'Ciudad:', array('class' => 'control-label')) !!}

                    <select class="form-control" name="ciudad_persona" id="ciudad_persona" disabled="">
                        @foreach($ciudades as $ciudad)
                            @if($persona->ciudad_persona == $ciudad->id_ciudad)
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
         			{{ Form::text('telefono_persona', $persona->telefono_persona , ['id' => 'nombre_persona', 'class' => 'form-control', 'disabled']) }}
         	</div>
         	<div class="form-group">
         			{!! Form::label('status', 'Correo electronico:', array('class' => 'control-label')) !!}
         			{{ Form::text('telefono_persona', $persona->correo_persona , ['id' => 'nombre_persona', 'class' => 'form-control', 'disabled']) }}
         	</div>
         	<div class="form-group">
         			{!! Form::label('status', 'Nombre usuario:', array('class' => 'control-label')) !!}
         			{{ Form::text('telefono_persona', $persona->slug_persona , ['id' => 'nombre_persona', 'class' => 'form-control', 'disabled']) }}
         	</div>
         	<div class="form-group">
         			{!! Form::label('status', 'Perfil:', array('class' => 'control-label')) !!}
         			{{ Form::text('telefono_persona', $persona->id_perfil , ['id' => 'nombre_persona', 'class' => 'form-control', 'disabled']) }}
         	</div>
         	<div class="form-group">
         			{!! Form::label('status', 'Estado actual:', array('class' => 'control-label')) !!}
         			@if($persona->estado_persona == '1')

         				{{ Form::text('estado_persona', 'Activo en el sistema' , ['id' => 'nombre_persona', 'class' => 'form-control', 'disabled']) }}
         			@else
         				{{ Form::text('estado_persona', 'Inactivo en el sistema' , ['id' => 'nombre_persona', 'class' => 'form-control', 'disabled']) }}
         			@endif
         			
         	</div>
		</div>
	{!! Form::close() !!} 
@endforeach
