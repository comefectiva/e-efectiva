<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    if(session('e-efectiva'))
	{
    	return view('welcome');
	}else{
		return view('auth.login');
	}
});

Route::get('/home', function () {
    if(session('e-efectiva'))
	{
    	return redirect('/');
	}else{
		return redirect('/login')->with('message', 'Tienes que iniciar sesion para continuar.');
	}
});

Route::get('/perfil', function(){
	if(session('e-efectiva'))
	{	

		foreach(Session::get('e-efectiva') as $value){
			$slug_persona = $value->slug_persona;
		}
		
		 $queryPersona = DB::table('persona')
                        ->leftjoin('ciudades','persona.ciudad_persona','=','ciudades.id_ciudad')
                        ->leftjoin('perfiles','persona.id_perfil','=','perfiles.id')
                        ->select('persona.*','ciudades.*','perfiles.*')
                        ->where('persona.slug_persona',$slug_persona)->get();


		$ciudades = DB::table('ciudades')->get();
		$perfiles = DB::table('perfiles')->get();

    	$hashed_random_password =  date('H:i:s').str_random(10);

   		return View::make('personas.perfil', ['personas' => $queryPersona, 'password' => $hashed_random_password, 'ciudades' => $ciudades, 'perfiles' => $perfiles]);	
	}else{
		return view('auth.login');
	}

});

Route::get('/login', function(){

	if(session('e-efectiva'))
	{
    	return redirect('/');
	}else{
		return view('auth.login');
	}
});

Route::post('/inicioSesion','personaController@login');

Route::get('/lagout', function(){
	Session::flush();
	return redirect('/'); 
});



/*CRUD PERSONAS*/

/* -- Editar perfil titular sesion persona */
Route::post('/editPerson','personaController@valores');
Route::post('/edicionPerfilPersona','personaController@edicionPerfil');




Route::get('/personas', function(){
	$queryPersona = DB::table('persona')->paginate(10);

	return View::make('personas.personas', ['personas' => $queryPersona]);
});

Route::get('personal/{slug_persona?}','personaController@detallePersona');

Route::get('personalEliminar/{slug_persona?}','personaController@eliminarPersona');

Route::post('/busquedaAjax', 'personaController@busquedaAjax');
Route::get('/edicion/{slug_persona}','personaController@edicionPersona');