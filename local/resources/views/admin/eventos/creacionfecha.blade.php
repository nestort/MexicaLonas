@extends('admin.template.Layout')
@section('title','Seleccion de fechas')  

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
<?php 
	$horas=array('09:00:00'=>'09:00 am',
				 '09:30:00'=>'09:30 am',
				 '10:00:00'=>'10:00 am',
				 '10:30:00'=>'10:30 am',
				 '11:00:00'=>'11:00 am',
				 '11:30:00'=>'11:30 am',
				 '12:00:00'=>'12:00 pm',
				 '12:30:00'=>'12:30 pm',
				 '13:00:00'=>'01:00 pm',
				 '13:30:00'=>'01:30 pm',
				 '14:00:00'=>'02:00 pm',
				 '14:30:00'=>'02:30 pm',
				 '15:00:00'=>'03:00 pm',
				 '15:30:00'=>'03:30 pm',
				 '16:00:00'=>'04:00 pm',
				 '16:30:00'=>'04:30 pm',
				 '17:00:00'=>'05:00 pm',
				 '17:30:00'=>'05:30 pm',
				 '18:00:00'=>'06:00 pm',
				 '18:30:00'=>'06:30 pm',
				 '19:00:00'=>'07:00 pm',
				);
?>


{!! Form::open(['route'=>'admin.Eventos.creacionfechas','method'=>'POST']) !!}
 
<div class="form-group col-xs-12 col-lg-12">
	
	<div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4 " >
		{!! Form::label('FechaInstalacion','Fecha de montado') !!}
		{{  Form::text('FechaInstalacion',null,['class'=>'datepickerr datepicker form-control ']) }}	
	</div>
	
	<div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4 ">
		{!! Form::label('FechaEvento','Fecha de evento') !!}
		{{  Form::text('FechaEvento',null,['class'=>'datepickerr datepicker form-control ']) }}	
	</div>
	
	<div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4 ">
		{!! Form::label('FechaDesmontado','Fecha de desmontado') !!}
		{{  Form::text('FechaDesmontado',null,['class'=>'datepickerr datepicker form-control ']) }}	
	</div>
		

</div>


	<div class=" chosen-container  form-group " >
		<div class="  col-lg-4 col-md-4 col-sm-12 col-xs-12  col-lg-offset-1 col-md-offset-1  form-group derecha" >
		{!! Form::label('HoraInstalacion','Hora de Instalacion') !!}
		
		{{ Form::select('HoraInstalacion',$horas,null,['class'=>'chosen-select','style'=>'width:100%;','placeholder'=>'Seleccione una hora'])}}		

		
		</div>
	
	
		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12  col-lg-offset-1 col-md-offset-1   form-group derecha">
		{!! Form::label('HoraDesmontado','Hora de desmontado') !!}
		
		{{ Form::select('HoraDesmontado',$horas,null,['class'=>'chosen-select','style'=>'width:100%;','placeholder'=>'Seleccione una hora'])}}	
		
		</div>

</div>




<div class="form-group col-lg-12 row">		
	<div class="col-lg-1 col-md-1 col-lg-push-9 col-md-push-9 ">
		{!! Form::submit('Siguiente',['class'=>'btn btn-primary']) !!}
	</div>
	</div>
</div>




	


	


			


  
<script type="text/javascript">
    $(function () {
        $('#datetimepicker3').datetimepicker({
            format: 'LT'
        });
    });
</script>


<script>
	var date = new Date();
  	var yy = date.getYear();
    var year = (yy < 1000) ? yy + 1900 : yy;
    var d  = date.getDate();
    var day = (d < 10) ? '0' + d : d;
    var m = date.getMonth() + 1;
    var month = (m < 10) ? '0' + m : m;
    
    $('.datepickerr').datepicker({    	
        format: "yyyy/mm/dd",
        autoclose: true,       
        endDate: "2050/12/12",
        startDate: year+"/"+month+"/"+day,
        todayHighlight: true,        
        language: "es"   
    });
</script>

{!! Form::close() !!}
	


@endsection

@section('jschose')  
	<script>
		$(".chosen-select").chosen({
		}); 
	</script>
@endsection
