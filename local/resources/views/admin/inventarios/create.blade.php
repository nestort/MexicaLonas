@extends('admin.template.Layout')
@section('title','Creacion de Inventario')
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

	{!! Form::open(['route'=>'admin.Inventarios.store','method'=>'POST']) !!}
	


		<div class="col-xs-12">
		{!! Form::label('Tipo','Tipo') !!}
            <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-edit"></span></span>
                {!! Form::select('Tipo',['Auditorio'=>'Auditorio','Toldo'=>'Toldo','Enlonado'=>'Enlonado'],'user',['class'=>'form-control']) !!}
            </div>
        </div>
		

        <div class="col-xs-6">
            {!! Form::label('Alto','Alto') !!}
            <div class="input-group">     
            	<span class="input-group-addon"><span class="glyphicon glyphicon-resize-vertical"></span></span>       	
                {!! Form::text ('Alto',null,['class'=>'form-control','placeholder'=>'Alto']) !!}
                <span class="input-group-addon">Mts</span>
            </div>
        </div>

        <div class="col-xs-6">
            {!! Form::label('Largo','Largo') !!}
            <div class="input-group">         
            	<span class="input-group-addon"><span class="glyphicon glyphicon-resize-horizontal"></span></span>    	
                {!! Form::text ('Largo',null,['class'=>'form-control','placeholder'=>'Largo']) !!}
                <span class="input-group-addon">Mts</span>
            </div>
            <br> 
        </div>
       
 		<div class="col-xs-6">
			{!! Form::label('Ancho','Ancho') !!}
            <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-resize-full"></span></span>
                {!! Form::text ('Ancho',null,['class'=>'form-control','placeholder'=>'Ancho']) !!}
                <span class="input-group-addon">Mts</span>
            </div>
        </div>  



		<div class="form-group col-xs-12">
			{!! Form::label('Notas','Notas') !!}
			{!! Form::textarea ('Notas',null,['class'=>'form-control ','placeholder'=>'Notas']) !!}			
		</div>


		

   		

		<div class="form-group col-xs-3 " align="left">	 
			{!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}					
		</div>
	

	{!! form::close() !!}
@endsection

