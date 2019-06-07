<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class personaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function login(Request $request){

            $data = $request->all();
            $data = request()->except(['_token']);

            $rules = array(
                'correo_persona' => 'required|email',
                'password' => 'required'
            );


            $v = Validator::make($data, $rules);
            
            if($v->fails())
            {
                Input::flash();
                return redirect()->back()
                    ->withErrors($v)
                    ->withInput();

            }else{

                $query = DB::table('persona')
                        ->join('ciudades','persona.ciudad_persona','=','ciudades.id_ciudad')
                        ->select('persona.*','ciudades.*')
                        ->where('persona.correo_persona',$request->input('correo_persona'))
                        ->where('persona.clave_persona',$request->input('password'))->count();
                
                if($query>0){
                    $queryPersona = DB::table('persona')
                        ->join('ciudades','persona.ciudad_persona','=','ciudades.id_ciudad')
                        ->select('persona.*','ciudades.*')
                        ->where('persona.correo_persona',$request->input('correo_persona'))
                        ->where('persona.clave_persona',$request->input('password'))->get();

                    $request->session()->put('e-efectiva',$queryPersona);

                      return redirect('/home');

                }


                  /*return back()
                    ->withErrors(['correo_persona' => 'No concuerda con nuestro registro'])
                    ->withInput();
                    */
            }
    }

    function lagout(){
         session_destroy();

        return redirect('/home');
    }

    
}
