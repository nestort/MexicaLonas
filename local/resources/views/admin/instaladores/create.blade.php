@extends('admin.template.Layout')

@section('title','Creacion de instalador')

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

	{!! Form::open(['route'=>'admin.Instaladores.store','method'=>'POST']) !!}
		<div class="form-group">
			{!! Form::label('Nombre','Nombre') !!}
			{!! Form::text('Nombre',null,['class'=>'form-control','placeholder'=>'Nombre completo']) !!}			
		</div>
		<div class="form-group">
			{!! Form::label('Equipo','Equipo') !!}
			{!! Form::text('Equipo',null,['class'=>'form-control','placeholder'=>'Equipo']) !!}			
		</div>
		<div class="form-group">
			{!! Form::label('Notas','Notas') !!}
			{!! Form::textarea ('Notas',null,['class'=>'form-control','placeholder'=>'Notas']) !!}			
		</div>

		<div class="form-group">
			{!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}			
		</div>
	{!! form::close() !!}
@endsection