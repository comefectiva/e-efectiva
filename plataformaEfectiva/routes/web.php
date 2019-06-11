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
		 $ciudades = DB::table('ciudades')->get();
    	$hashed_random_password =  date('H:i:s').str_random(10);

   		return View::make('personas.perfil', ['password' => $hashed_random_password, 'ciudades' => $ciudades]);	
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
Route::post('/editPerson','personaController@valores');