<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;



use Intervention\Image\ImageManagerStatic as Image;

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
        dd($request->all());
    }


    public function valores(Request $request){
        
        $arrayName = $request->all();
        $fecha = date('Ymd H:i:s');

      

        foreach(Session::get('e-efectiva') as $value){
            $id_persona = $value->id_persona;
            $codigo_empleado = $value->codigo_empleado;
            $slug_persona = $value->slug_persona;
            $foto_persona = $value->foto_persona;
        }

        if(!empty($request->file('file'))){


            $extension = $request->file('file')->getClientOriginalExtension(); 
            $fecha = date('Ymd');
            $fileName = $slug_persona.'-'.$fecha.'.'.$extension;

            Image::make($request->file('file'))
                       ->resize(300,300)
                       ->save('img/users/'.$fileName);
            

        }else{
            $fileName = $foto_persona;
        }


        $data = $request->all();

        $array = array_add($data, 'slug_persona', $slug_persona);
        $array1 = array_add($array, 'codigo_empleado', $codigo_empleado);
        $array2 = array_add($array1, 'id_persona', $id_persona);
        $array3 = array_add($array2, 'foto_persona', $fileName);

        $rules = array(
            'nombre_persona' => 'required',
            'apellido_persona' => 'required',
            'ciudad_persona' => 'required',
            'telefono_persona' => 'required',
            'correo_persona' => 'email|required',
            'clave_persona' => 'required',
            'slug_persona' => 'required',
            'codigo_empleado' => 'required',
            'id_persona' => 'required',
            'foto_persona' => 'required',
        );

        $v = Validator::make($array3, $rules);
        
      

        if($v->fails())
        {
            Input::flash(); 
            return redirect()->back()
                    ->withErrors($v)
                    ->withInput();
        }else{
              DB::table('persona')
                        ->where('id_persona',$id_persona)
                        ->update(['codigo_empleado' => $codigo_empleado,
                                 'nombre_persona' => $request->input('nombre_persona'),
                                 'apellido_persona' => $request->input('apellido_persona'),
                                 'foto_persona' => $fileName,
                                 'ciudad_persona' => $request->input('ciudad_persona'),
                                 'telefono_persona' => $request->input('telefono_persona'),
                                 'correo_persona' => $request->input('correo_persona'),
                                 'slug_persona' => $slug_persona,
                                 'estado_persona' => '1',
                                 'clave_persona' => $request->input('clave_persona'),
                                 'modificacion' => $fecha]);
             
            return redirect('/perfil')->with('message', 'Actualizado correctamente.'); 

        }



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
                        ->leftjoin('ciudades','persona.ciudad_persona','=','ciudades.id_ciudad')
                        ->select('persona.*','ciudades.*')
                        ->where('persona.correo_persona',$data['correo_persona'])
                        ->where('persona.clave_persona',$data['password'])->count();
                 
                
                if($query>0){
                    $queryPersona = DB::table('persona')
                        ->leftjoin('ciudades','persona.ciudad_persona','=','ciudades.id_ciudad')
                        ->select('persona.*','ciudades.*')
                        ->where('persona.correo_persona',$data['correo_persona'])
                        ->where('persona.clave_persona',$data['password'])->get();

                    $request->session()->put('e-efectiva',$queryPersona);

                     $clientIP = \Request::ip();

                        foreach(Session::get('e-efectiva') as $value){
                            DB::table('sesiones_tabla')->insert(
                                      ['id_usuario' => $value->id_persona,
                                      'ip_maquina'=>$clientIP]
                            );
                        }



                      return redirect('/home');
                }else{
                    return redirect('/login')->with('message', 'Usuario o contraseña erradas, verifica e intenta nuevamente.');
                }


                  /*return back()
                    ->withErrors(['correo_persona' => 'No concuerda con nuestro registro'])
                    ->withInput();
                    */
            }
    }

    public function detallePersona($slug_persona){

         $queryPersona = DB::table('persona')
                        ->leftjoin('ciudades','persona.ciudad_persona','=','ciudades.id_ciudad')
                        ->select('persona.*','ciudades.*')
                        ->where('persona.slug_persona',$slug_persona)->get();
            
        $ciudades = DB::table('ciudades')->get();

        return View::make('personas.perfilConsulta', ['personas' => $queryPersona, 'ciudades' => $ciudades]);
    }

    public function edicionPersona($slug_persona){

         $queryPersona = DB::table('persona')
                        ->leftjoin('ciudades','persona.ciudad_persona','=','ciudades.id_ciudad')
                        ->select('persona.*','ciudades.*')
                        ->where('persona.slug_persona',$slug_persona)->get();
            
        $ciudades = DB::table('ciudades')->get();

        return View::make('personas.edicion', ['personas' => $queryPersona, 'ciudades' => $ciudades]);
    }


    
    public function edicionPerfil(Request $request){

        $arrayName = $request->all();
        $fecha = date('Ymd H:i:s');

        dd($arrayName);
        
        foreach(Session::get('e-efectiva') as $value){
            $id_persona = $value->id_persona;
            $codigo_empleado = $value->codigo_empleado;
            $slug_persona = $value->slug_persona;
            $foto_persona = $value->foto_persona;
        }

        if(!empty($request->file('file'))){


            $extension = $request->file('file')->getClientOriginalExtension(); 
            $fecha = date('Ymd');
            $fileName = $slug_persona.'-'.$fecha.'.'.$extension;

            Image::make($request->file('file'))
                       ->resize(300,300)
                       ->save('img/users/'.$fileName);
            

        }else{
            $fileName = $foto_persona;
        }


        $data = $request->all();

        $array = array_add($data, 'slug_persona', $slug_persona);
        $array1 = array_add($array, 'codigo_empleado', $codigo_empleado);
        $array2 = array_add($array1, 'id_persona', $id_persona);
        $array3 = array_add($array2, 'foto_persona', $fileName);

        $rules = array(
            'nombre_persona' => 'required',
            'apellido_persona' => 'required',
            'ciudad_persona' => 'required',
            'telefono_persona' => 'required',
            'correo_persona' => 'email|required',
            'clave_persona' => 'required',
            'slug_persona' => 'required',
            'codigo_empleado' => 'required',
            'id_persona' => 'required',
            'foto_persona' => 'required',
        );

        $v = Validator::make($array3, $rules);
        
      

        if($v->fails())
        {
            Input::flash(); 
            return redirect()->back()
                    ->withErrors($v)
                    ->withInput();
        }else{
              DB::table('persona')
                        ->where('id_persona',$id_persona)
                        ->update(['codigo_empleado' => $codigo_empleado,
                                 'nombre_persona' => $request->input('nombre_persona'),
                                 'apellido_persona' => $request->input('apellido_persona'),
                                 'foto_persona' => $fileName,
                                 'ciudad_persona' => $request->input('ciudad_persona'),
                                 'telefono_persona' => $request->input('telefono_persona'),
                                 'correo_persona' => $request->input('correo_persona'),
                                 'slug_persona' => $slug_persona,
                                 'estado_persona' => '1',
                                 'clave_persona' => $request->input('clave_persona'),
                                 'modificacion' => $fecha]);
             
            return redirect('/perfil')->with('message', 'Actualizado correctamente.'); 

        }
    }
    


    function lagout(){
         session_destroy();

        return redirect('/home');
    }

    
}
