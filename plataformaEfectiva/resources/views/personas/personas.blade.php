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
            <div class="tituloPagina col-6 col-sm-8 col-md-8 col-lg-8 col-xl-8">
        		<h3>
                     <a href="{{url('/')}}" style="text-decoration: none;">
            			<button class="btn btn-default btn-sm" title="Ir atras">
            				<span class="glyphicon glyphicon-arrow-left"></span>
            			</button>
                    </a>
                    <button class="btn btn-primary btn-sm" title="Agregar nuevo usuario" data-toggle="modal" data-target="#agregarModal">
                            <span class="glyphicon glyphicon-plus"></span>
                            <span class="glyphicon glyphicon-user" ></span>
                        </button>
        			&nbsp;Personas registradas
        		</h3>
            </div>

            <div class="consultaPagina col-6 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                &nbsp;
                {!! Form::open(array('url' => 'editPerson', 'method' => 'PUT')) !!}

                    {{ Form::text('campo_busqueda_persona', '', ['id' => 'campo_busqueda_persona', 'class' => 'form-control', 'placeholder' => 'Buscar persona en el sistema...']) }}
            
                {!! Form::close() !!} 

            </div>

    	</div>
        <br>
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
	            		<th colspan="3">
	            			<center>
	            			Acciones
	            			</center>
	            		</th>
            		</tr>
            	</thead>

            	<tbody id="contenidoTabla">
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
            			</td>
                        <td>
                             @if($persona->estado_persona == 1)
                            <a href="{{ url('/edicion') }}/{{$persona->slug_persona}}">
                            <button class="btn btn-success btn-sm">
                                <span class="glyphicon glyphicon-pencil"></span>&nbsp;
                            </button>
                            </a>
                            @else
                            <button class="btn btn-success btn-sm" disabled="" title="Bot&oacute;n deshabilitado">
                                <span class="glyphicon glyphicon-pencil"></span>&nbsp;
                            </button>
                            @endif


                        </td>
                        <td>
                            @if($persona->estado_persona == 1)
                            <button  class="btn btn-danger btn-sm" data-toggle="modal" data-target="#eliminarModal" id="eliminarUser" data-valor="{{$persona->slug_persona}}">
                                <span class="glyphicon glyphicon-trash"></span>&nbsp;
                            </button>
                            @else
                            <button  class="btn btn-danger btn-sm"  data-target="#eliminarModal" disabled="" title="Bot&oacute;n deshabilitado">
                                <span class="glyphicon glyphicon-trash"></span>&nbsp;
                            </button>
                            @endif
                        </td>
                        <td>
                            @if($persona->estado_persona == 0 OR $persona->estado_persona != 1)
                                <button class="btn btn-warning">INACTIVO</button>
                            @else
                                <button class="btn btn-success">ACTIVO</button>
                            @endif
                        </td>

            		</tr>
            		@endforeach
            	</tbody>
            </table>
        </div>

    </div>

</div>


<!-- MODAL AGREGAR USUARIO -->

<!-- Modal -->
  <div class="modal fade" id="agregarModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header alert-success">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">
            <b>Agregar</b>
          </h4>
        </div>
        <div class="modal-body">
          <p>¿Como desea subir el nuevo usuario?</p>
          
          <center>
              <button class="btn btn-success">
              <span class="glyphicon glyphicon-file"></span>
              Archivo .CSV
          </button>
          &nbsp;
          <button class="btn btn-success">
              <span class="glyphicon glyphicon-list"></span>
              Formulario
          </button>

          </center>
        </div>

      </div>
    </div>
  </div>


<!-- MODAL ELIMINAR -->

<!-- Modal -->
  <div class="modal fade" id="eliminarModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header alert-danger">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">
            <b>Atenci&oacute;n</b>
          </h4>
        </div>
        <div class="modal-body">
          <p>¿Esta seguro que desea deshabilitar el usuario seleccionado?</p>
          <i>Una vez hecha esta accion no se podra revertir.</i>
        </div>
        <div class="modal-footer">
            <button type="button" id="btnUserModal" data-valor="" class="btn btn-success">SI</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">NO</button>
        </div>
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
      <center>
      <div class="" style="margin-bottom: 10px;">
        <hr>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
  </center>
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

    $(document).on("click","#eliminarUser", function(){
        var slug_persona = $(this).attr("data-valor");
        
        $("#btnUserModal").attr("data-valor",slug_persona);
    });


    $(document).on("click","#btnUserModal", function(){
        var slug_persona = $(this).attr("data-valor");
        
        $.ajax({
            type: "get",
            url: "{{ url('/personalEliminar') }}"+"/"+slug_persona,
            success: function(data){
               location.reload(true);
            }
        });
    });

    $("#campo_busqueda_persona").keyup(function(){
        var valor = $(this).val();

        $.ajax({
            url: "{{ url('/busquedaAjax') }}",
            type: "post",
            data: { 'variable': valor, _token: '{{csrf_token()}}' },
            success: function(data){
                if(data == ""){
                    $("#contenidoTabla").html("<td colspan='6'><div class='alert alert-warning col-12 col-sm-4 col-md-12 col-lg-12 col-xl-12'><center><h4>No se encontraron resultados para: <b>'"+valor+"'</b>.</h4></center></div></td>");
                }else{
                    $("#contenidoTabla").html(data);    
                }
            },
            error: function (data, textStatus, errorThrown) {
                console.log(data);

            },
        });

    });

</script>
    @stop