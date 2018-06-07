@extends('admin.template.Layout')
@section('title','Listado usuarios')
@section('contenedor')
	<table class="table table-striped">
		<thead>
			<th>Id</th>
			<th>Nombre</th>
			<th>Correo</th>
			<th>Tipo</th>
			<th>Accion</th>
		</thead>
		<tbody>
			@foreach($users as $user)
			<tr>
				<td>{{$user->id}}</td>
				<td>{{$user->name}}</td>
				<td>{{$user->email}}</td>
				<td>
					@if($user->type=="admin")
						<span class="label label-danger">{{$user->type}}</span>
					@else	
						<span class="label label-primary">{{$user->type}}</span>
					@endif

				<td>
					<a href="{{route('admin.users.destroy',$user->id)}}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger glyphicon glyphicon-trash">
					
					</a> 
					<a href="{{route('admin.users.edit',$user)}}" class="btn btn-warning glyphicon glyphicon-cog">
					
					</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{!! $users->render() !!}

@endsection