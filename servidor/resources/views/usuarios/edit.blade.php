@extends('layouts.app')
@section('content')

<div class="maincontent">
    <div class="contentinner">
        <h4 class="widgettitle"> {{ __('Editar informacion del usuario') }}</h4>
        <div class="widgetcontent">

                <form class="stdform" method="POST" action="/usuarios/{{$infocontacto->id}}" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <p>
                    <label>{{ __('Foto') }}</label>
                    <span class="field">
                        <input type="file" class="uniform-file" name="foto"/>
                    </span>
                </p>

                <p>
                    <label for="nombres">{{ __('Nombres') }}</label>
                    <input type="text" name="nombres"class="input-large" placeholder="" value="{{$infopersonal->nombres}}">
                </p>

                <p>
                    <label for="apellidos" >{{ __('Apellidos') }}</label>
                    <input type="text" name="apellidos" class="input-large" placeholder="" value="{{$infopersonal->apellidos}}">
                </p>

                <p>
                    <label for="fecha_nacimiento">{{ __('Fecha nacimiento') }}</label>
                    <input type="date" name="fecha_nacimiento" class="input-large" placeholder="" value="{{$infopersonal->fecha_nacimiento}}">
                </p>



                 <p>
                    <label for="celular">{{ __('Celular') }}</label>
                    <input type="text" name="celular" class="input-large" placeholder="" value="{{$infocontacto->celular}}">
                </p>

                <p>
                    <label for="fono_fijo" >{{ __('Telefono fijo') }}</label>
                    <input type="text" name="fono_fijo" class="input-large" placeholder="" value="{{$infocontacto->fono_fijo}}">
                </p>

                <p>
                    <label for="email" >{{ __('Email ') }}</label>
                    <input type="text" name="email" class="input-large" placeholder="" value="{{$infocontacto->email}}">
                </p>

                <p>
                    <label for="facebook">{{ __('Facebook') }}</label>
                    <input type="text" name="facebook" class="input-large" placeholder="" value="{{$infocontacto->facebook}}">
                </p>

                <p>
                    <label for="direccion" >{{ __('Direccion') }}</label>
                    <input type="text" name="direccion" class="input-large" placeholder="" value="{{$infocontacto->direccion}}">
                </p>

                <p>
                    <label for="titulo" >{{ __('Titulo') }}</label>
                    <input type="text" name="titulo" class="input-large"  placeholder="" value="{{$infoegreso->titulo}}">
                </p>

                <p>
                    <label for="año_ingreso" >{{ __('Año de ingreso') }}</label>
                    <input type="text" name="año_ingreso" class="input-large" placeholder="" value="{{$infoegreso->año_ingreso}}">
                </p>

                <p>
                    <label for="año_egreso" >{{ __('Año de egreso') }}</label>
                    <input type="text" name="año_egreso" class="input-large" placeholder="" value="{{$infoegreso->año_egreso}}">
                </p>

                <p>
                    <label for="fecha_examen">{{ __('Fecha de examen') }}</label>
                    <input type="date" name="fecha_examen" class="input-large" placeholder="" value="{{$infoegreso->fecha_examen}}">
                </p>

                <p>
                    <label for="titulo_tm">{{ __('Titulo de tesis o memoria') }}</label>
                    <input type="text" name="titulo_tm" class="input-large" placeholder="" value="{{$infoegreso->titulo_tm}}">
                </p>

                <p>
                    <label for="prof_guia" >{{ __('Profesor guia') }}</label>
                    <input type="text" name="prof_guia" class="input-large" placeholder="" value="{{$infoegreso->prof_guia}}">
                </p>


                <p class="stdformbutton">
                    <center><button class="btn btn-primary" type="submit">Actualizar</button>
                    <a href="/usuarios" class="btn">Cancelar</a></center>
                </p>
                </form>

              </div><!--widgetcontent-->
    </div><!--contentinner-->
</div><!--mainco-->
   

@endsection