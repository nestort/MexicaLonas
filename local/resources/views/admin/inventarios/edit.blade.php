@extends('admin.template.Layout')
@section('title','Actualizacion inventario')
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

	{!! Form::open(['route'=>['admin.Inventarios.update',$inventario],'method'=>'PUT']) !!}
	


		<div class="col-xs-12">
		{!! Form::label('Tipo','Tipo') !!}
            <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-edit"></span></span>
                {!! Form::select('Tipo',['Auditorio'=>'Auditorio','Toldo'=>'Toldo','Enlonado'=>'Enlonado'],$inventario->Tipo,['class'=>'form-control']) !!}
            </div>
        </div>
		

        <div class="col-xs-6">
            {!! Form::label('Alto','Alto') !!}
            <div class="input-group">     
            	<span class="input-group-addon"><span class="glyphicon glyphicon-resize-vertical"></span></span>       	
                {!! Form::text ('Alto',$inventario->Alto,['class'=>'form-control','placeholder'=>'Alto']) !!}
                <span class="input-group-addon">Mts</span>
            </div>
        </div>

        <div class="col-xs-6">
            {!! Form::label('Largo','Largo') !!}
            <div class="input-group">         
            	<span class="input-group-addon"><span class="glyphicon glyphicon-resize-horizontal"></span></span>    	
                {!! Form::text ('Largo',$inventario->Largo,['class'=>'form-control','placeholder'=>'Largo']) !!}
                <span class="input-group-addon">Mts</span>
            </div>
            <br> 
        </div>
       
 		<div class="col-xs-6">
			{!! Form::label('Ancho','Ancho') !!}
            <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-resize-full"></span></span>
                {!! Form::text ('Ancho',$inventario->Ancho,['class'=>'form-control','placeholder'=>'Ancho']) !!}
                <span class="input-group-addon">Mts</span>
            </div>
        </div>      
        
      


		<div class="form-group col-xs-12">
			{!! Form::label('Notas','Notas') !!}
			{!! Form::textarea ('Notas',$inventario->Notas,['class'=>'form-control','placeholder'=>'Notas']) !!}			
		</div>
   		

		<div class="form-group col-xs-3 " align="left">	 
			{!! Form::submit('Actualizar',['class'=>'btn btn-primary']) !!}					
		</div>
	

	{!! form::close() !!}
@endsection