@extends('layouts.app')

@section('content')

<div class="container">
	<br>
        <div class="alert alert-danger col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        	<center>
            	<h4><b>ATENCI&Oacute;N:</b> EL USUARIO QUE USTED SELECCION&Oacute; SE ENCUENTRA DESHABILITADO EN EL SISTEMA</h4>
        	</center>
        </div>
        <center>
        	<img src="https://www.iconattitude.com/icons/open_icon_library/actions/png/256/dialog-disable.png"><br><br>
        	 <a href="{{url('personas')}}" style="text-decoration: none;">	<button class="btn btn-danger">Regresar</button>
        	 </a>
        </center>
  </div>

    @stop @section('scripts')

    @stop