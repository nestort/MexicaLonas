@extends('admin.template.Layout')

@section('title','Creacion de usuario')

@section('contenedor')
	
	@if(count($errors)>0)
		<div class="alert alert-danger" role="alert">
			<ul>
				@foreach($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
			</ul>			
		</div>

	@endif

	{!! Form::open(['route'=>'admin.users.store','method'=>'POST']) !!}
		<div class="form-group ">
			
		
			<div class="form-group ">
				{!! Form::label('name','Nombre') !!}
				{!! Form::text ('name',null,['class'=>'form-control','placeholder'=>'Nombre completo']) !!}			
			</div>
			<div class="form-group">
				{!! Form::label('email','Correo') !!}
				{!! Form::email ('email',null,['class'=>'form-control','placeholder'=>'correo@example.com']) !!}			
			</div>
			<div class="form-group">
				{!! Form::label('password','Contraseña') !!}
				{!! Form::password ('password',['class'=>'form-control','placeholder'=>'**********']) !!}			
			</div>
			<div class="form-group">
				{!! Form::label('type','Tipo') !!}
				{!! Form::select('type',['admin'=>'Administrador','user'=>'Usuario'],'user',['class'=>'form-control']) !!}			
			</div>
			<div class="form-group">
			{!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}
				
			</div>
		</div>

	{!! form::close() !!}
@endsection