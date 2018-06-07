@extends('admin.template.Layout')
@section('title','Resumen de evento')
@section('contenedor')

<table class="  table ">
  <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12 ">

  <h3>Resumen de evento</h3>
  <tbody>
    <tr>       
      <th>Tipo de evento</th>
      <td>{{$eventos->TipoEvento}}</td>      
    </tr>
    
    <tr>
      <th>Direccion</th>    
      <td>{{$eventos->Direccion}}</td>      
    </tr>
    
    <tr>
      <th>Colonia</th>    
      <td>{{$eventos->Colonia}}</td>      
    </tr>        
    
    <tr>
      <th>Ciudad</th>    
      <td>{{$eventos->Ciudad}}</td>      
    </tr>        
    
    <tr>
      <th>Nombre del cliente</th>    
      <td>{{$clientes->NombreCompleto}}</td>      
    </tr>  

    <tr>
      <th>Fecha de montado</th>    
      <td>{{$fechas->FechaInstalacion}} a las {{$fechas->HoraInstalacion}} hrs</td>      
    </tr> 
    <tr>
      <th>Fecha de desmontado</th>    
      <td>{{$fechas->FechaDesmontado}} a las {{$fechas->HoraDesmontado}} hrs</td>      
    </tr> 
    <tr>
      <th>Fecha del evento</th>    
      <td>{{$fechas->FechaEvento}} </td>      
    </tr>

    <tr>
      <th>Inventario</th>
      <td>@foreach($list as $lis)    
      {{$lis}}<br>  
      @endforeach   
      </td>
    </tr> 

    <tr>
      <th>Grupo de instaladores</th>    
      <td>{{App\Instalador::find($eventos->IdInstalador)->Nombre}} </td>      
    </tr>
    <tr>
      <th>Costo total</th>    
      <td>{{$costos->CostoTotal}}</td>      
    </tr>
    <tr>
      <th>Persona que atendio</th>    
      <td>{{App\User::find($eventos->IdUsuario)->name}}</td>      
    </tr>
    <tr>
      <th>Notas del evento</th>    
      <td>{{$eventos->Notas}}</td>      
    </tr>

  </tbody>

</div>

</table>

@endsection