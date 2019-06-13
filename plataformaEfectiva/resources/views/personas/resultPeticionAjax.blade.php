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