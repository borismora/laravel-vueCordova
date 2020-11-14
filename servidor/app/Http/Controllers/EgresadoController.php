<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\InfoContacto;
use App\InfoEgreso;
use App\InfoPersonal;

use DB;
use Image; 

class EgresadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return "bla";
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


        try {
            DB::beginTransaction();

            //Datos de contacto
            $contacto = new InfoContacto;
            $contacto->id = $request->get('id_usuario');
            $contacto->celular = $request->get('fono_movil');
            $contacto->fono_fijo = $request->get('fono_fijo');
            $contacto->email = $request->get('email');
            $contacto->facebook  = $request->get('facebook');
            $contacto->direccion = $request->get('direccion');
            $contacto->save();

            //Datos de egreso
            $egreso = new InfoEgreso;
            $egreso->id = $request->get('id_usuario');
            $egreso->titulo = $request->get('titulo');
            $egreso->año_ingreso = $request->get('anyo_ingreso');
            $egreso->año_egreso = $request->get('anyo_egreso');
            $egreso->fecha_examen = $request->get('fecha_examen');
            $egreso->titulo_tm = $request->get('titulo_tm');
            $egreso->prof_guia  = $request->get('profesor');
            $egreso->save();

            //Datos personales
            $personal = new InfoPersonal;
            $personal->id = $request->get('id_usuario');
            $personal->rut = $request->get('rut');
            $personal->nombres = $request->get('nombres');
            $personal->apellidos = $request->get('apellidos');
            $personal->fecha_nacimiento = $request->get('nacimiento');
            

            //AQUI SE GUARDAN LAS FOTOS
            $name = $request->fotoUrl;
            $image = $request->fotoNombre;
            $cont = 0;
            //Se recorren y asignan los array
            while($cont < count($name)){
                $exploded = explode(',', $image[$cont]);
                $decoded = base64_decode($exploded[1]);
                $aleatorio = str_random(10);
                $nombre = $request->id_usuario.'-'.$aleatorio.'-'.$name[$cont];
                $url = '/fotos_egresados/'.$nombre;
                $path = public_path($url);
                $imagen = Image::make($decoded)->resize(640, 480);
                $imagen->save($path);

                $cont = $cont+1;
            }

            $personal->foto = $url;
            $personal->save();


            DB::commit();
            return "Bingo!!";
            
        } catch (Exception $e) {
            DB::rollback();
            return "Error!!";
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
        return view("InfoContacto.show", ["infocontacto"=>InfoContacto::findOrFail($id)]); 
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
}
