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

    	<div class="formularioPersona col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    		<h3>
    			<button class="btn btn-default btn-sm">
    				<span class="glyphicon glyphicon-arrow-left"></span>
    			</button>
    			&nbsp;Personas registradas
    		</h3>
    	</div>
    	<hr>
    	<br>
    	<div class="listadoPersonas col-12 col-sm-4 col-md-12 col-lg-12 col-xl-12">
            <table class="table table-striped">
            	<thead>
            		<tr>
	            		<th>Identificacion</th>
	            		<th>Nombre</th>
	            		<th>Apellido</th>
	            		<th>Correo</th>
	            		<th>Telefono</th>
	            		<th colspan="2">
	            			<center>
	            			Acciones
	            			</center>
	            		</th>
            		</tr>
            	</thead>
            	<tbody>
            		@foreach($personas as $persona)
            		<tr>
            			<td>{{$persona->id_persona}}</td>
            			<td>{{$persona->nombre_persona}}</td>
            			<td>{{$persona->apellido_persona}}</td>
            			<td>{{$persona->correo_persona}}</td>
            			<td>{{$persona->telefono_persona}}</td>
            			<td>
            				<button class="btn btn-info btn-sm verDetalle" data-id="{{$persona->slug_persona}}" data-toggle="modal" data-target="#edicionModal">
            					<span class="glyphicon glyphicon-eye-open"></span>&nbsp;
            				</button>
                            <a href="{{ url('/edicion') }}/{{$persona->slug_persona}}">
            				<button class="btn btn-success btn-sm">
            					<span class="glyphicon glyphicon-pencil"></span>&nbsp;
            				</button>
                            </a>
            				<button class="btn btn-danger btn-sm">
            					<span class="glyphicon glyphicon-trash"></span>&nbsp;
            				</button>
            			</td>

            		</tr>
            		@endforeach
            	</tbody>
            </table>
        </div>

    </div>

</div>


<!-- Modal Detalle -->
<div id="edicionModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Informaci&oacute;n personal</h4>
      </div>
      <div class="modal-body" id="contenidoModal">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>

   @stop @section('scripts')

    <script type="text/javascript">

    $(document).on("click",".verDetalle",function(){
    	var slug_persona = $(this).attr("data-id");
    	
		$.ajax({
            type: "get",
            url: "{{ url('/personal') }}"+"/"+slug_persona,
            success: function(data){
                $(".modal-body").html(data);
            }
        });

    });


</script>
    @stop