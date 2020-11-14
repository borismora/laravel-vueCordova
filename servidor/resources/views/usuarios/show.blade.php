@extends('layouts.app')
@section('content')

<div class="maincontent">
        	<div class="contentinner">
    

                <h4 class="widgettitle">{{ __('Informacion detallada') }}</h4>
                <table class="table table-bordered">
                        <colgroup>
                            <col class="con0" />
                            <col class="con1" />
                        </colgroup>
                        <thead>
                          <tr>
                            <td>Foto del usuario</td>
                            <td><img  src="{{$infopersonal->foto}}"width="200" height="200" ></td>
                          </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Rut</td>
                            <td>{{$infopersonal->rut}}</td>
                        </tr>

                        <tr>
                            <td>Nombres</td>
                            <td>{{$infopersonal->nombres}}</td>
                        </tr>

                        <tr>
                            <td>Apellidos</td>
                            <td>{{$infopersonal->apellidos}}</td>
                        </tr>

                        <tr>
                            <td>Fecha de nacimiento</td>
                            <td>{{$infopersonal->fecha_nacimiento}}</td>
                        </tr>

                        <tr>
                            <td>Celular</td>
                            <td>{{$infocontacto->celular}}</td>
                        </tr>

                        <tr>
                            <td>Telefono fijo</td>
                            <td>{{$infocontacto->fono_fijo}}</td>
                        </tr>

                        <tr>
                            <td>Email</td>
                            <td>{{$infocontacto->email}}</td>
                        </tr>

                        <tr>
                            <td>Facebook</td>
                            <td>{{$infocontacto->facebook}}</td>
                        </tr>

                        <tr>
                            <td>Direccion</td>
                            <td>{{$infocontacto->direccion}}</td>
                        </tr>

                        <tr>
                            <td>Titulo</td>
                            <td>{{$infoegreso->titulo}}</td>
                        </tr>

                        <tr>
                            <td>Año ingreso</td>
                            <td>{{$infoegreso->año_ingreso}}</td>
                        </tr>

                        <tr>
                            <td>Año egreso</td>
                            <td>{{$infoegreso->año_egreso}}</td>
                        </tr>

                        <tr>
                            <td>Fecha examen</td>
                            <td>{{$infoegreso->fecha_examen}}</td>
                        </tr>

                        <tr>
                            <td>Titulo de tesis o memoria</td>
                            <td>{{$infoegreso->titulo_tm}}</td>
                        </tr>

                        <tr>
                            <td>Profesor Guia</td>
                            <td>{{$infoegreso->prof_guia}}</td>
                        </tr>


                     </tbody>
                    </table>
    </div>
</div>
@endsection