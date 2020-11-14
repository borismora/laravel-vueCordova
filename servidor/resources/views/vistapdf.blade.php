<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  
</head>
<body>
    

<div class="conteiner">
    <div class="row">
        <div class="col-md-8">
            <img src="ucm.jpg" width="100" height="100">
        </div>

             
            <p class="cursiva" >Numero de alumnos: {{$cant_us}}<br>
            fecha: {{$fecha_actual->format('Y-m-d')}}</p> 
    </div>
</div>


<center><p class="titulo">Lista de alumnos</p></center>

<div class ="conteiner">
<div style="text-align:center;" class="col-md-12" >
<table border="1" style="margin: 0 auto;">
    <tr>
		<td><p class="negrita">RUT</p></td>
		<td><p class="negrita">Nombres</p></td>
        <td><p class="negrita">Apellidos</p></td>
        <td><p class="negrita">Fecha de examen</p></td>
    </tr>
        @foreach ($usuarios as $usu)
        <tbody>
        <tr>
			<td>{{$usu -> rut}}</td>
			<td>{{$usu -> nombres}}</td>
            <td>{{$usu -> apellidos}}</td>
            <td>{{$usu -> fecha_examen}}</td>
        </tr>
        @endforeach
        </tbody>
</table>
</div>
</div>
</body>

<style>
    
    .titulo{
        font: 150% sans-serif;
    }

    .cuerpo{
        font-family: "arial", serif;
    }

    .negrita { 
        font-weight: 700; 
    }

    .cursiva{
        
        font-family: sans-serif;
        font-size: 100%;
        font-style: italic;
        font-weight: 700; 

    }

    
</style>