@extends('admin.template.Layout')

@section('title','Editando usuario')

@section('contenedor')
	{!! Form::open(['route' => ['admin.users.update',$user], 'method' => 'PUT']) !!}

		<div class="form-group">
			{!! Form::label('name','Nombre') !!}
			{!! Form::text ('name',$user->name,['class'=>'form-control','placeholder'=>'Nombre completo']) !!}			
		</div>
		<div class="form-group">
			{!! Form::label('email','Correo') !!}
			{!! Form::email ('email',$user->email,['class'=>'form-control','placeholder'=>'correo@example.com']) !!}			
		</div>

		<div class="form-group">
			{!! Form::label('type','Tipo') !!}
			{!! Form::select('type',['admin'=>'Administrador','user'=>'Usuario'],$user->type,['class'=>'form-control']) !!}			
		</div>
		<div class="form-group">
		{!! Form::submit('Actualizar',['class'=>'btn btn-primary']) !!}
			
		</div>



	{!! Form::close() !!}
@endsection

