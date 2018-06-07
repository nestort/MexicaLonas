@extends('admin.template.Layout')
@section('title','Agenda')
@section('contenedor')
	<div >
  	<h2>{{"Semana ".$date->weekOfYear}} 
  	<p>
  	<small>{{$date->startOfWeek()->day."/".$date->startOfWeek()->month."/".$date->startOfWeek()->year." al ".$date->endOfWeek()->day."/".$date->endOfWeek()->month."/".$date->endOfWeek()->year}}</small></h2>
	</div>
		
    		<table class="table table-hover table-condensed ">
		
    		<thead>

    		<tr>
      			<th>Cliente</th>
      			<th>Domicilio</th>
      			<th>Intaladores</th>
      			<th>Intalacion</th>
      			<th>Dia Evento</th>      			
      			<th>desmontado</th>
      			
      		</tr>

  		</thead>
  		<tbody>
    <tr>
    @foreach($FechasProceso as $fecha)
      <th >{{$fecha->Evento->nomcli}}</th>
      <td>{{$fecha->Evento->Direccion}}</td>
      <td>{{$fecha->Evento->nomins}}</td>
      <td>{{$fecha->FechaEvento}}</td>
      <td>{{$fecha->FechaInstalacion}}</td>
      <td>{{$fecha->FechaDesmontado}}</td>
      <td>
					<a href="{{route('admin.Eventos.show',$fecha->Evento->IdEvento)}}" class="btn btn-info glyphicon glyphicon-eye-open"></a></td>
    </tr>
    @endforeach
    	
   

  </tbody>
  <tbody>
    <tr>
    @foreach($FechasMonta as $fecha)
      <th >{{$fecha->Evento->nomcli}}</th>
      <td>{{$fecha->Evento->Direccion}}</td>
      <td>{{$fecha->Evento->nomins}}</td>
      <td>{{$fecha->FechaEvento}}</td>
      <td>{{$fecha->FechaInstalacion}}</td>
      <td>{{$fecha->FechaDesmontado}}</td>
      <td>
					<a href="{{route('admin.Eventos.show',$fecha->Evento->IdEvento)}}" class="btn btn-info glyphicon glyphicon-eye-open"></a></td>
    </tr>
    @endforeach
   

  </tbody> 

	</table>





@endsection