@extends('layouts.app')
@section('content')

<div class="maincontent">
    <div class="contentinner">
        <h4 class="widgettitle"> {{ __('Crear usuario') }}</h4>
        <div class="widgetcontent">

                <form class="stdform"  method="POST" action="/usuarios" enctype="multipart/form-data">
                 @csrf

                <p>
                    <label for="username">{{ __('RUT (sin puntos ni digito verificador)') }}</label>
                    <input type="text" name="username"  class="input-large" placeholder="Ej: 18384726" value="">
                </p>

                <p>
                    <label for="username">{{ __('Contraseña') }}</label>
                    <input type="text" name="password" class="input-large" placeholder="min 6 de longitud" value="">
                </p>

                <p>
                    <label for="username">{{ __('Tipo de usuario') }}</label>
                    <select name="tipo" class="uniformselect">
                       <option value="admin">Admin</option>
                       <option value="user">User</option>
                    </select>        
                
                </p>
            
            
                <p class="stdformbutton">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                    <a href="/usuarios" class="btn">Cancelar</a>
                </p>
                </form>   
        </div><!--widgetcontent-->
    </div><!--contentinner-->
</div><!--mainco-->

@endsection