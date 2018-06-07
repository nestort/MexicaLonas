@extends('admin.template.Layout')
@section('title','Creacion de eventos')

   

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

	{!! Form::open(['route'=>'admin.Eventos.store','method'=>'POST']) !!}
	
  	
	<div class="form-group col-xs-12">
			{!! Form::label('TipoEvento','Tipo de evento') !!}
			{!! Form::text('TipoEvento',null,['class'=>'form-control','placeholder'=>'Tipo de evento']) !!}			
		</div>
		<div class="form-group col-xs-12">
			{!! Form::label('Direccion','Direccion') !!}
			{!! Form::text('Direccion',null,['class'=>'form-control','placeholder'=>'Direccion del evento']) !!}			
		</div>
		<div class="form-group col-xs-12">
			{!! Form::label('Colonia','Colonia') !!}
			{!! Form::text('Colonia',null,['class'=>'form-control','placeholder'=>'Colonia']) !!}			
		</div>
		<div class="form-group col-xs-12">
			{!! Form::label('Ciudad','Ciudad') !!}
			{!! Form::text('Ciudad',null,['class'=>'form-control','placeholder'=>'Ciudad ']) !!}		
		</div>

		
		<div class=" form-group col-xs-12 col-sm-12 col-md-3 col-lg-5 ">
			{!! Form::label('IdCliente','Nombre cliente') !!}
			{!! Form::select('IdCliente',$clientes,null,['class'=>'form-control','placeholder'=>'Seleccione un cliente','required']) !!}		
		</div>
		<div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-5 ">
			{!! Form::label('IdInstalador','Nombre Instalador') !!}
			{!! Form::select('IdInstalador',$instaladores,null,['class'=>'form-control','placeholder'=>'Seleccione el instalador','required']) !!}		
		</div>
				

		<div class=" form-group col-xs-12  ">
			{!! Form::label('listado','Inventario (Alto x Largo x Ancho)') !!}
			{{ Form::select('listado[]',$listado,null,['class'=>'chosen-select  ','multiple','style'=>'width:100%;']) }}		
		</div>

		<div class="form-group col-xs-12">
			{!! Form::label('CostoTotal','Costo Total') !!}
			{!! Form::text('CostoTotal',null,['class'=>'form-control','placeholder'=>'$123123']) !!}			
		</div>




		<div class="form-group col-xs-12  ">
			{!! Form::label('Notas','Notas') !!}
			{{ Form::textarea ('Notas',null,['class'=>'form-control','placeholder'=>'Notas']) }}			
		</div>
		<div class="form-group col-xs-12 ">
			{!! Form::submit('Crear',['class'=>'btn btn-primary']) !!}			
		</div>


  


	{!! form::close() !!}
	


@endsection

@section('jschose')  
<script>
$(".chosen-select").chosen({

}); 



</script>
@endsection
