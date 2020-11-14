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
use PDF;
class PdfController extends Controller
{
    public function generarpdf(Request $request)
    {
        
        
        $inicial =$request->get('rango_in');
        $fin =$request->get('rango_fn');
        
        $cant_us =DB::table('users')
        ->join ('info_personal', 'users.id', '=' , 'info_personal.id')
        ->join('info_egreso','users.id','=','info_egreso.id')
        ->whereDate('info_egreso.fecha_examen','>=',$inicial)
        ->whereDate('info_egreso.fecha_examen','<=',$fin)
        ->count();

        $fecha_actual=new \DateTime();
        //$fecha_actual->format('d-m-Y H:i:s');

        $usuarios =DB::table('users')
        ->join ('info_personal', 'users.id', '=' , 'info_personal.id')
        ->join('info_egreso','users.id','=','info_egreso.id')
        ->whereDate('info_egreso.fecha_examen','>=',$inicial)
        ->whereDate('info_egreso.fecha_examen','<=',$fin)
        ->select('users.id as id',
        'info_personal.rut as rut',
        'info_personal.nombres as nombres',
        'info_personal.apellidos as apellidos',
        'info_egreso.titulo as titulo',
        'info_egreso.año_egreso as año_egreso',
        'info_egreso.fecha_examen as fecha_examen')
        ->get();
        if($cant_us>0){
            $pdf =PDF::loadView('vistapdf',['usuarios'=>$usuarios,'cant_us'=>$cant_us,'fecha_actual'=>$fecha_actual]);
            //return $fecha_actual->format('Y-m-d');
            return $pdf->download('archivo.pdf');
            // return $pdf->stream();
        }else{
            return Redirect::to('usuarios')->with('success','No se encontraron alumnos en este rango de tiempo');
        }
        
    }
}
