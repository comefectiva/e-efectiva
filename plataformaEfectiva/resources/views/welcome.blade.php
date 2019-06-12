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

    <!-- ------------------------------------------ -->

    <div class="paneLAdministrador col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9">

        
        <h3>
           <span class="
glyphicon glyphicon-cog"></span> Panel de administraci&oacute;n
        </h3>
        <hr>
        <div class="moduloPersonas col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
            
        <div class="panel panel-default">
          <div class="panel-heading">
            <span class="glyphicon glyphicon-user"></span>
            &nbsp;Modulo personas
        </div>
          <div class="panel-body">
            <i>En este modulo usted podra agregar, editar, consultar o eliminar una persona de la plataforma</i>
            <br><br>
            <center>
                <a href="{{url('personas')}}"><button class="btn btn-info">
                    Ir al modulo&nbsp; <span class="glyphicon glyphicon-share-alt"></span>
                </button>
                </a>
            </center>
          </div>
        </div>

        </div>
        


              <div class="moduloCursos col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
            
        <div class="panel panel-default">
          <div class="panel-heading">
            <span class="glyphicon glyphicon-th"></span>
            &nbsp;Modulo Cursos
          </div>
                    <div class="panel-body">
            <i>En este modulo usted podra agregar, editar, consultar un curso de la plataforma</i>
            <br><br><br>
            <center>
                <button class="btn btn-success">
                    Ir al modulo&nbsp; <span class="glyphicon glyphicon-share-alt"></span>
                </button>
            </center>
          </div>
        </div>
        
        </div>

        <div class="moduloLocalizacion col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
            
        <div class="panel panel-default">
          <div class="panel-heading">
            <span class="glyphicon glyphicon-globe"></span>
            &nbsp;Modulo Localizacion
            </div>
          <div class="panel-body">
          <i>En este modulo usted podra agregar, editar, consultar Pais, ciudad o estado ingresados en la plataforma</i>
          <br><br>
          <center>
                <button class="btn btn-warning">
                    Ir al modulo&nbsp; <span class="glyphicon glyphicon-share-alt"></span>
                </button>
            </center>
            </div>
        </div>
        
        </div>

        <div class="moduloLocalizacion col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
            
        <div class="panel panel-default">
          <div class="panel-heading">
            <span class="glyphicon glyphicon-globe"></span>
            &nbsp;Modulo Localizacion
            </div>
          <div class="panel-body">
          <i>En este modulo usted podra agregar, editar, consultar Pais, ciudad o estado ingresados en la plataforma</i>
          <br><br>
          <center>
                <button class="btn btn-default">
                    Ir al modulo&nbsp; <span class="glyphicon glyphicon-share-alt"></span>
                </button>
            </center>
            </div>
        </div>
        
        </div>

    </div>
    
    <!-- ------------------------------------------ -->
    
    <div class="cursosUsuario col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9">

        
        <h3>
            Nuestros cursos virtuales
        </h3>
        <hr>
        

    </div>

</div>
@extends('Includes.Modales.modalesTemplates');

@endsection