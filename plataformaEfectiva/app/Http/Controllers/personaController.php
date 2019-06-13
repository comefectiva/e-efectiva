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
                        ->where('persona.clave_persona',$data['password'])
                        ->where('persona.estado_persona','1')->count();
                 
                
                if($query>0){
                    $queryPersona = DB::table('persona')
                        ->leftjoin('ciudades','persona.ciudad_persona','=','ciudades.id_ciudad')
                        ->select('persona.*','ciudades.*')
                        ->where('persona.correo_persona',$data['correo_persona'])
                        ->where('persona.clave_persona',$data['password'])
                        ->where('persona.estado_persona','1')->get();

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

        $validarRegistro = DB::table('persona')
                        ->leftjoin('ciudades','persona.ciudad_persona','=','ciudades.id_ciudad')
                        ->leftjoin('perfiles','persona.id_perfil','=','perfiles.id')
                        ->select('persona.*','ciudades.*','perfiles.*')
                        ->where('persona.slug_persona',$slug_persona)
                        ->where('persona.estado_persona',1)->count();
        if($validarRegistro>0){
            $queryPersona = DB::table('persona')
                        ->leftjoin('ciudades','persona.ciudad_persona','=','ciudades.id_ciudad')
                        ->leftjoin('perfiles','persona.id_perfil','=','perfiles.id')
                        ->select('persona.*','ciudades.*','perfiles.*')
                        ->where('persona.slug_persona',$slug_persona)
                        ->where('persona.estado_persona',1)->get();
        
        $hashed_random_password =  date('H:i:s').str_random(10);
        $ciudades = DB::table('ciudades')->get();
        $perfiles = DB::table('perfiles')->get(); 


            return View::make('personas.edicion', ['personas' => $queryPersona, 'ciudades' => $ciudades, 'password' => $hashed_random_password, 'perfiles' => $perfiles]);
        }else{

            return View::make('auth.alerts.deshabilitado')->with('message', 'Usuario o contraseña erradas, verifica e intenta nuevamente.');
        }
    }


    
    public function edicionPerfil(Request $request){

        $arrayName = $request->all();
        $fecha = date('Ymd H:i:s');
        $foto_persona = $request->input('foto_persona_bd');
    

        if(!empty($request->file('file'))){


            $extension = $request->file('file')->getClientOriginalExtension(); 
            $fecha = date('Ymd');
            $fileName = $request->input('slug_persona_bd').'-'.$fecha.'.'.$extension;

            Image::make($request->file('file'))
                       ->resize(300,300)
                       ->save('img/users/'.$fileName);
            

        }else{
            $fileName = $foto_persona;
        }



        $rules = array(
            'clave_persona' => 'required',
            'foto_persona_bd' => 'required',
            'identificacion_persona_perfil' => 'required',
            'codigo_persona_perfil' => 'required',
            'nombre_persona' => 'required',
            'apellido_persona' => 'required',
            'ciudad_persona' => 'required',
            'telefono_persona' => 'required',
            'perfil_persona' => 'required',
            'slug_persona_bd' => 'required',
            'correo_persona' => 'email|required',
        );

        $v = Validator::make($arrayName, $rules);
        


        if($v->fails())
        {
            Input::flash(); 
            return redirect()->back()
                    ->withErrors($v)
                    ->withInput();
        dd($arrayName);
        

        }else{
        
           
              DB::table('persona')
                        ->where('id_persona',$request->input('identificacion_persona_perfil'))
                        ->update(['codigo_empleado' => $request->input('codigo_persona_perfil'),
                                 'nombre_persona' => $request->input('nombre_persona'),
                                 'apellido_persona' => $request->input('apellido_persona'),
                                 'foto_persona' => $fileName,
                                 'ciudad_persona' => $request->input('ciudad_persona'),
                                 'telefono_persona' => $request->input('telefono_persona'),
                                 'correo_persona' => $request->input('correo_persona'),
                                 'slug_persona' => $request->input('slug_persona_bd'),
                                 'estado_persona' => '1',
                                 'clave_persona' => $request->input('clave_persona'),
                                 'id_perfil' => $request->input('perfil_persona'),
                                 'modificacion' => $fecha]);
             
            return redirect('/edicion/'.$request->input('slug_persona_bd'))->with('message', 'Actualizado correctamente.'); 

        }
    }
    

    public function eliminarPersona($slug_persona){
        DB::table('persona')
                        ->where('slug_persona',$slug_persona)
                        ->update(['estado_persona' => '0']);
        return 1;
    }


    public function busquedaAjax(Request $request){
        $variable = $request->input('variable');
        
        $queryPersona = DB::table('persona')
                        ->leftjoin('ciudades','persona.ciudad_persona','=','ciudades.id_ciudad')
                        ->select('persona.*','ciudades.*')
                        ->where('persona.nombre_persona', 'LIKE', '%'.$variable.'%')->get();

        $ciudades = DB::table('ciudades')->get();

        return View::make('personas.resultPeticionAjax', ['personas' => $queryPersona, 'ciudades' => $ciudades]);
    }


    function lagout(){
         session_destroy();

        return redirect('/home');
    }

    
}
