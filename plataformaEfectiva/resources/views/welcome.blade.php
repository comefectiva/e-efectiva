@extends('layouts.app')

@section('content')
<div class="headerImg col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        
    <div class="contenedorBienvenida col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        @include('Includes.carousel');
    </div>
</div>
<div class="bodyPagina col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

    @if (Auth::user())

    @can('cursos.index')
    <div class="panelUsuario col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
        <div class="panelAdmin col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="imgUsuario col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <img class="img-circle" src="https://estaticos.muyinteresante.es/media/cache/760x570_thumb/uploads/images/article/55365cde3787b2187a1f0fbc/impresion-cara.jpg" width="200px">
            </div>
            <div class="descripcionUsuario col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <p>{{ Auth::user()->name }}</p>
            </div>
            <p class="descripcionPerfil col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">Colaborador</p>
            <div class="descripcionUsuariosCursos col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <p class="descripcionContenidoDescripcionUsuario col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">Cursos terminados:</p>
                <p class="valoresContenidoDescripcionUsuario col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">20</p>

                <p class="descripcionContenidoDescripcionUsuario col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">Programaci&oacute;n:</p>
                <p class="valoresContenidoDescripcionUsuario col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">20</p>
                <hr>

                <p class="descripcionContenidoDescripcionUsuario col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">Certificados:</p>
                <p class="valoresContenidoDescripcionUsuario col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">20</p>
                <hr>

                <p class="descripcionContenidoDescripcionUsuario col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">Foro:</p>
                <p class="valoresContenidoDescripcionUsuario col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">20</p>
                <hr>
            </div>
        </div>
        <div class="estandarMantenimiento col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <p class="tituloEstandarMantenimiento col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">Est&aacute;ndares de mantenimiento</p>

            <div class="barra col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="respuesta col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                    <p>SI</p>
                </div>
                <div class="progress col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10 progress-striped active" style="margin-top:2px;">
                    <div class="progress-bar progress-bar-success" role="progressbar"
                         aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"
                         style="width: 85%; height: 40px;">
                        85%
                    </div>
                </div>
            </div>

            <div class="barra col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="respuesta col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                    <p>NO</p>
                </div>
                <div class="progress col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10 progress-striped active" style=" margin-top:2px;">
                    <div class="progress-bar progress-bar-danger" role="progressbar"
                         aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"
                         style="width: 45%;">
                        45%
                    </div>
                </div>
            </div>
        </div>
        <div class="divTercero col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            DIV VACIO
        </div>
    </div>

    <div class="cursosUsuario col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9">
        <div class="alerta col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <?php foreach($validacion as $validado) {
                if($validado->validado == 'no') { ?>
                   <div class="alert alert-danger col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                       Por favor, actualiza tus datos personales en el siguiente link -> <a href="{{ url('/perfil') }}">
                          Actualizar 
                       </a>
                   </div>
                  <?php }
                }
            ?>
        </div>
        
        <h3>
            Nuestros cursos virtuales
        </h3>
        <hr>
        

    </div>
    @endcan

    @else


    @endif

</div>
@extends('Includes.Modales.modalesTemplates');

@endsection