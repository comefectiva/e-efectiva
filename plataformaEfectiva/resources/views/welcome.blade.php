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

        
        <h3>
            Nuestros cursos virtuales
        </h3>
        <hr>
        

    </div>

</div>
@extends('Includes.Modales.modalesTemplates');

@endsection