<?php

namespace App\Http\Controllers;

use App\InfoContacto;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use DB;

class InfoContactoController extends Controller
{
    public function show($id)
    {
        return view("InfoContacto.show", ["infocontacto"=>InfoContacto::findOrFail($id)]);  

    }

    public function edit($id)
    {
    
        
       return view("InfoContacto.edit", ["infocontacto"=>InfoContacto::findOrFail($id)]);  
       

    }

    public function update(Request $request,$id)
    {
      

        $infocontacto = Infocontacto::findOrFail($id);
        $infocontacto->celular=$request->get('celular');
        $infocontacto->fono_fijo=$request->get('fono_fijo');
        $infocontacto->email=$request->get('email');
        $infocontacto->facebook=$request->get('facebook');
        $infocontacto->direccion=$request->get('direccion');
        $infocontacto->update();

        return Redirect::to('usuarios');
 

    }
}
