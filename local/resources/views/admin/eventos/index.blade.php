@extends('admin.template.Layout')
@section('title','Listado eventos')
@section('contenedor')
<table class="table table-striped">
		<thead>
			<th>Tipo Evento</th>
			<th>Cliente</th>
			<th>Ciudad</th>
			<th>Accion</th>
		</thead>
		<tbody>
			@foreach($Eventos as $Evento)
			<tr>			
				<td>{{$Evento->TipoEvento}}</td>
				<td>{{substr(App\Cliente::find($Evento->IdCliente)->NombreCompleto,0,10)}}</td>
				<td>{{substr($Evento->Ciudad,0,20)}}</td>
				<td>
					<a href="{{route('admin.Eventos.show',$Evento->IdEvento)}}" class="btn btn-info glyphicon glyphicon-eye-open"></a>

					<a href="{{route('admin.Eventos.destroy',$Evento->IdEvento)}}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger glyphicon glyphicon-trash"></a> 
				</td>
			</tr>
			@endforeach			
		</tbody>
	</table>
{!! $Eventos->render() !!}
@endsection