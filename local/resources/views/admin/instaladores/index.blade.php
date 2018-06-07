@extends('admin.template.Layout')
@section('title','Listado usuarios')
@section('contenedor')
	<table class="table table-striped">
		<thead>
			<th>Id</th>
			<th>Nombre</th>
			<th>Equipo</th>
			<th>notas</th>
			<th>Accion</th>
		</thead>
		<tbody>
			@foreach($instaladores as $instalador)
			<tr>			
				<td>{{$instalador->IdInstalador}}</td>
				<td>{{$instalador->Nombre}}</td>
				<td>{{$instalador->Equipo}}</td>
				
				@if(strlen($instalador->Notas)>10)
				<td>{{ substr($instalador->Notas, 0 ,10)."..."}}</td>
				@else
				<td>{{ $instalador->Notas}}</td>
				@endif

				<td>
					<a  data-toggle="modal" data-target="#exampleModal" data-nombre="{{$instalador->Nombre}}" data-equipo="{{$instalador->Equipo}}" data-notas="{{$instalador->Notas}}" class="btn btn-info glyphicon glyphicon-eye-open"></a>

					<a href="{{route('admin.Instaladores.destroy',$instalador->IdInstalador)}}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger glyphicon glyphicon-trash">
					</a> 
					<a href="{{route('admin.Instaladores.edit',$instalador->IdInstalador)}}" class="btn btn-warning glyphicon glyphicon-cog">					
					</a>
					
						

				</td>
			</tr>
			@endforeach			
		</tbody>
	</table>


<!-- ***********************************Ventana modal*****************************************************************+-->
  	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    	<div class="modal-dialog" role="document">
      		<div class="modal-content">
        
	        	<div class="modal-header">
	          		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	            		<span aria-hidden="true">&times;</span>
	          		</button>
	          		<h4 class="modal-title" id="exampleModalLabel"></h4>          
	        	</div>

				<div class="modal-body">      
	      			Nombre:      
	      			<p class="modal-nombre"></p>
	        		<hr>
	      			Equipo:
	      			<p class="modal-equipo"></p>
	        		<hr>
	      			Notas:
	      			<p class="modal-notas"></p>        
	      		</div>		

	        	<div class="modal-footer">
	         		<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>          
	        	</div>

    		</div>
    	</div>
  	</div>




<script >
	

	$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var nombre = button.data('nombre') 
  var equipo = button.data('equipo')
  var notas = button.data('notas')

  var modal = $(this)
  
  modal.find('.modal-title').text('Detalles de  ' + nombre)  
  modal.find('.modal-nombre').text(nombre)
  modal.find('.modal-equipo').text(equipo)
  modal.find('.modal-notas').text(notas)
})
</script>




	{!! $instaladores->render() !!}



@endsection
