<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\InfoContacto;
use App\InfoEgreso;
use App\InfoPersonal;
use Input;



use Illuminate\Contracts\Auth\Guard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Support\Facades\Redirect;
use DB;
use Image; 


use Closure;
use Session;

class UserController extends Controller
{
    protected $auth;
    
    public function __construct(Guard $auth)
    {
        //le diremos que gestione el acceso por usuario 
        $this->middleware('auth');
        $this->auth =$auth;


    }

    public function create()
    {
        /*
        $this->middleware('auth');
        $this->auth =$auth;*/

        return view('usuarios.create');
    }


    
    public function index(Guard $auth,Request $request)
    {


        $this->middleware('auth');
        $this->auth =$auth;

        if ($request)
        {
        
        $query=trim($request->get('searchText'));

        $usuarios =DB::table('users')
        ->join ('info_personal', 'users.id', '=' , 'info_personal.id')
        ->join('info_egreso','users.id','=','info_egreso.id')
        ->where('info_personal.apellidos','LIKE','%'.$query.'%')
        ->select('users.id as id',
        'info_personal.rut as rut',
        'info_personal.nombres as nombres',
        'info_personal.apellidos as apellidos',
        'info_egreso.titulo as titulo',
        'info_egreso.año_egreso as año_egreso',
        'info_egreso.fecha_examen as fecha_examen')
        ->orderBy('info_egreso.fecha_examen', 'asc')
        ->paginate(3);
        return view('usuarios.index',['usuarios'=>$usuarios,"searchText"=>$query]);
        }

    }
    
    
    
    public function store(Request $request)
    {
       
        $usuario = new User;
        $usuario->username=$request->get('username');
        $usuario->password=bcrypt($request->get('password'));
        $usuario->tipo=$request->get('tipo');
        $usuario->save(); 

        return Redirect::to('usuarios');
    }

    public function show($id)
    {
     
    $infocontacto = InfoContacto::findOrFail($id);
    $infoegreso =  InfoEgreso::findOrFail($id);
    $infopersonal = InfoPersonal::findOrFail($id);
    return view("usuarios.show", ["infocontacto"=>$infocontacto,"infoegreso"=>$infoegreso,"infopersonal"=>$infopersonal]);  
    
    } 

    public function edit($id)
    {
    
    $infocontacto = InfoContacto::findOrFail($id);
    $infoegreso =  InfoEgreso::findOrFail($id);
    $infopersonal = InfoPersonal::findOrFail($id);
    return view("usuarios.edit", ["infocontacto"=>$infocontacto,"infoegreso"=>$infoegreso,"infopersonal"=>$infopersonal]);  
    }

    public function update(Request $request,$id)
    {
      
        //informacion de contacto
        $infocontacto = Infocontacto::findOrFail($id);
        $infocontacto->celular=$request->get('celular');
        $infocontacto->fono_fijo=$request->get('fono_fijo');
        $infocontacto->email=$request->get('email');
        $infocontacto->facebook=$request->get('facebook');
        $infocontacto->direccion=$request->get('direccion');
        $infocontacto->update();


        //informacion de egreso  
        $egreso= InfoEgreso::findOrFail($id);
        $egreso->titulo = $request->get('titulo');
        $egreso->año_ingreso = $request->get('año_ingreso');
        $egreso->año_egreso = $request->get('año_egreso');
        $egreso->fecha_examen = $request->get('fecha_examen');
        $egreso->titulo_tm = $request->get('titulo_tm');
        $egreso->prof_guia  = $request->get('prof_guia');
        $egreso->save();

        //informacion personal
        $personal =InfoPersonal::findOrFail($id); ;
        $personal->nombres = $request->get('nombres');
        $personal->apellidos = $request->get('apellidos');
        $personal->fecha_nacimiento = $request->get('fecha_nacimiento');

        

        if($request->hasFile('foto')){
            $file = $request->file('foto');
            $name = time().$file->getClientOriginalName();
            $personal->foto ='/fotos_egresados/'.$name;
            $file->move(public_path().'/fotos_egresados/', $name);
        }
        $personal->save();


        
        //$filename = $request->file('foto')->getClientOriginalName();
        //return $personal->foto;

        return Redirect::to('usuarios');
        
 

    }

    public function eliminar($id)
    {
        $usuario = User::find($id);
        $usuario->delete();    
        return Redirect::to('usuarios');
        
    }
}
