@extends('layouts.app')
@section('content')
<div class="conteiner">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Medio de contacto') }}</div>
                <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                <td>Celular</td>
                
                <td>{{$infocontacto->celular}}</td>
                
                </thead>
                <thead>
                <td>Numero Fijo</td>
                
                <td>{{$infocontacto->fono_fijo}}</td>
               
                </thead>
                <thead>
                <td>Email</td>
               
                <td>{{$infocontacto->email}}</td>
                
                </thead>
                <thead>
                <td>Facebook</td>
                
                <td>{{$infocontacto->facebook}}</td>
               
                </thead>
                <thead>
                <td>Direccion</td>
              
                <td>{{$infocontacto->direccion}}</td>
                
                </thead>
                </table>
            </div>
        </div>
    <div>
</div>   


@endsection