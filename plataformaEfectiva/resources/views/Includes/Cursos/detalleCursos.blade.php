<script type="text/javascript" src="http://content.jwplatform.com/libraries/m0RyeaXw.js"></script>
@foreach($consultaCurso as $curso)
<div class="row">
    <div class="descripcionDetalleCursoInclude col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div id="video-mp4" class="imagenDetalleCursoInclude col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <video src="https://www.comunicacionefectiva.com/site/video/reelCom.mp4" controls="" width="100%"></video>
        </div>

        <div class="descripcionDetalleCursoInclude col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="tituloDetalleCursoInclude">
                <p>
                    <i class="glyphicon glyphicon-file"></i> Titulo: <a>{{ $curso->nombre }}</a>
                </p>
            </div>
            <div class="descripcionDetalleCursoInclude">
                <p>
                    <i class="glyphicon glyphicon-list"></i> Descripcion: <a>{{ $curso->descripcion }}</a>
                </p>
            </div>
            <div class="fechaDetalleCursoInclude col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

                <div class="fechaInicio col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <p>
                        <i class="glyphicon glyphicon-calendar"></i> Fecha inicio: <a>10/10/2017</a>
                    </p>
                </div>
                <div class="fechaInicio col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <p>
                        <i class="glyphicon glyphicon-calendar"></i> Fecha fin: <a>10/10/2018</a>
                    </p>
                </div>
            </div>
            <div class="inscritosDetalleCursoInclude">
                <p>
                    <i class="glyphicon glyphicon-list"></i> Inscritos: <a>200</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endforeach
