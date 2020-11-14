@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar medios de contacto del usuario') }}</div>

                <form class="form-group" method="POST" action="/InfoContacto/{{$infocontacto->id}}" enctype="multipart/form-data">
                 @csrf
                 @method('PUT');

                
                <div class="form-group">
                    <label for="direccion" class="col-md-4 col-form-label text-md-right">{{ __('Direccion') }}</label>
                    <input type="text" name="direccion" placeholder="" value="{{$infocontacto->direccion}}">
                </div>
            <div class="form-group">
                    <label for="celular" class="col-md-4 col-form-label text-md-right">{{ __('Celular') }}</label>
                    <input type="text" name="celular" placeholder="" value="{{$infocontacto->celular}}">
                </div>

                <div class="form-group">
                    <label for="fono_fijo" class="col-md-4 col-form-label text-md-right">{{ __('Telefono fijo') }}</label>
                    <input type="text" name="fono_fijo" placeholder="" value="{{$infocontacto->fono_fijo}}">
                </div>

                <div class="form-group">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email ') }}</label>
                    <input type="text" name="email" placeholder="" value="{{$infocontacto->email}}">
                </div>

                <div class="form-group">
                    <label for="facebook" class="col-md-4 col-form-label text-md-right">{{ __('Facebook') }}</label>
                    <input type="text" name="facebook" placeholder="" value="{{$infocontacto->facebook}}">
                </div>

            
                <div class="form-group">
                    <center><button class="btn btn-primary" type="submit">Actualizar</button>
                    <a href="/usuarios" class="btn btn-danger">Cancelar</a></center>
                </div>
                </form>

                <div class="card-body">
                
                </div>
            </div>
        </div>
    </div>
</div>

@endsection