@extends('admin.template.Layout')
@section('title','Modificacion de cliente')
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

	{!! Form::open(['route'=>['admin.Clientes.update',$cliente],'method'=>'PUT']) !!}
		
				
		<div class="form-group col-xs-5"><hr><hr><hr></div>
		<h1 class="glyphicon glyphicon-user col-xs-2 text-center text-muted"></h1>
		<div class="form-group col-xs-5"><hr><hr><hr></div>
		
		<div class="form-group col-xs-12 ">
			{!! Form::label('NombreCompleto','Nombre') !!}			
			{!! Form::text('NombreCompleto',$cliente->NombreCompleto,['class'=>'form-control','placeholder'=>'Nombre completo']) !!}			
		</div>
		<div class="form-group col-xs-12 ">
			{!! Form::label('Direccion','Direccion') !!}
			{!! Form::text('Direccion',$cliente->Direccion,['class'=>'form-control','placeholder'=>'Direccion']) !!}			
		</div>
		<div class="form-group col-xs-12 ">
			{!! Form::label('Colonia','Colonia') !!}
			{!! Form::text ('Colonia',$cliente->Colonia,['class'=>'form-control','placeholder'=>'Colonia']) !!}			
		</div>
		<div class="form-group col-xs-12 ">
			{!! Form::label('Ciudad','Ciudad') !!}
			{!! Form::text ('Ciudad',$cliente->Ciudad,['class'=>'form-control','placeholder'=>'Ciudad']) !!}
		</div>
		<div class="form-group col-xs-12 ">
			{!! Form::label('RFC','RFC') !!}
			{!! Form::text ('RFC',$cliente->RFC,['class'=>'form-control','placeholder'=>'RFC']) !!}			
		</div>
		<div class="form-group col-xs-6 ">
			{!! Form::label('TelefonoFijo','Telefono fijo') !!}
			{!! Form::text ('TelefonoFijo',$cliente->TelefonoFijo,['class'=>'form-control','placeholder'=>'Telefono fijo']) !!}			
		</div>
		<div class="form-group col-xs-6 ">
			{!! Form::label('TelefonoMovil','Telefono movil') !!}
			{!! Form::text ('TelefonoMovil',$cliente->TelefonoMovil,['class'=>'form-control','placeholder'=>'Telefono movil']) !!}	
		</div>
		<div class="form-group col-xs-12 ">
			{!! Form::label('Email','Correo electronico') !!}
			{!! Form::text ('Email',$cliente->Email,['class'=>'form-control','placeholder'=>'Correo electronico']) !!}			
		</div>

		<div class="form-group col-xs-6 ">
			{!! Form::label('NombreContacto','Nombre de contacto') !!}
			{!! Form::text ('NombreContacto',$cliente->NombreContacto,['class'=>'form-control','placeholder'=>'Nombre de contacto']) !!}			
		</div>
		<div class="form-group col-xs-6 ">
			{!! Form::label('TelefonoMovilContacto','Telefono movil de contacto') !!}
			{!! Form::text('TelefonoMovilContacto',$cliente->TelefonoMovilContacto,['class'=>'form-control','placeholder'=>'Telefono movil del contacto']) !!}			
		</div>
		
		<div class="form-group col-xs-5"><hr><hr><hr></div>
		<h1 class="glyphicon glyphicon-piggy-bank col-xs-2 text-center text-muted"></h1>
		<div class="form-group col-xs-5"><hr><hr><hr></div>
		


		<div class="form-group  col-xs-12 col-sm-12 col-md-3 col-lg-5 text-center">	
			
			{!! Form::label('Referencia','Referencia') !!}				
			{!! Form::label ('Referencia',$cliente->Referencia,['class'=>'form-control']) !!}


		</div>
	

		<div class="form-group  col-xs-6 col-sm-4 col-md-2 col-lg-2 text-center">
		
			{!! Form::label('PorcentajeDescuento','Descuento') !!}			
			{!! Form::select('PorcentajeDescuento',['0'=>'0%','5'=>'5%','10'=>'10%','15'=>'15%','20'=>'20%','25'=>'25%','30'=>'30%','40'=>'40%','50'=>'50%','60'=>'60%','70'=>'70%'],$cliente->PorcentajeDescuento,['class'=>'form-control']) !!}				
		</div>
		

		<div class="form-group col-xs-6 col-lg-5 text-center">			
			{!! Form::label('Credito','Credito') !!}
			{!! Form::text ('Credito',$cliente->Credito,['class'=>'form-control','placeholder'=>'Credito']) !!}			
		</div>

		<div class="form-group col-xs-12"><hr></div>


		<div class="form-group col-xs-12 col-sm-12 ">
			{!! Form::label('Notas','Notas') !!}
			{!! Form::textarea ('Notas',$cliente->Notas,['class'=>'form-control','placeholder'=>'Notas']) !!}			
		</div>

		<div class="form-group col-xs-12 ">
			{!! Form::submit('Actualizar',['class'=>'btn btn-primary']) !!}			
		</div>

	{!! form::close() !!}
@endsection