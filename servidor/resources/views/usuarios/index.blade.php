@extends('layouts.app')
@section('content')


<div class="breadcrumbwidget">
    
</div><!--breadcrumbs-->


<div class="maincontent">
    <div class="contentinner">
    
        
    
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                 {{session('success')}}
            </div>
        @endif
    </div>
    <h4 class="widgettitle">{{ __('Lista de usuarios') }}</h4>
    <div class="card">
        <table class="table table-bordered">
            <thead>
			    <th>ID</th>
			    <th>RUT</th>
			    <th>Nombres</th>
                <th>Apellidos</th>
                <th>Titulo</th>
                <th>Año de egreso</th>
                <th>Fecha de examen</th>
                <th>Acciones</th>
		    </thead>
            <tbody>
            @foreach ($usuarios as $usu)
            <tr>
                <td>{{$usu -> id}}</td>
			    <td>{{$usu -> rut}}</td>
			    <td>{{$usu -> nombres}}</td>
                <td>{{$usu -> apellidos}}</td>
                <td>{{$usu -> titulo}}</td>
                <td>{{$usu -> año_egreso}}</td>
                <td>{{$usu -> fecha_examen}}</td>
                <td><a href="{{URL::action('UserController@show', $usu -> id)}}" class="btn btn-primary"> <i class="fa fa-eye"></i> </a>
                    <a href="{{URL::action('UserController@edit', $usu -> id)}}" class="btn btn-warning"> <i class="fa fa-edit"></i> </a>
                    <a href="/elimi/{{ $usu -> id}}" class="btn btn-danger"> <i class="fa fa-trash"></i> </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {{ $usuarios->links() }}
    </div>

    @include('usuarios.search')
    <br>
    
    
    @include('usuarios.searchpdf')
  
    </div>
</div> 

@endsection