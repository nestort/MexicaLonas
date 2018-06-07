@extends('admin.template.Layout')
@section('title','Inventario')
@section('contenedor')
	<table class="table table-striped">
		<thead>
			<th>Tipo</th>
			<th>Alto x Largo x Ancho</th>			
			<th>Notas</th>
		</thead>
		<tbody>
			@foreach($inventarios as $inventario)
			<tr>
				<td>{{$inventario->Tipo}}</td>
				<td>{{$inventario->Alto}} x {{$inventario->Largo}} x {{$inventario->Ancho}}</td>
					@if(strlen($inventario->Notas)>10)
						<td>{{ substr($inventario->Notas, 0 ,10)."..."}}</td>
					@else
						<td>{{ $inventario->Notas}}</td>
					@endif
				<td>
					<a  data-toggle="modal" data-target="#exampleModal" data-tipo="{{$inventario->Tipo}}" data-medidas="{{$inventario->Alto}} X {{$inventario->Largo}} X {{$inventario->Ancho}}"  data-notas="{{$inventario->Notas}}" class="btn btn-info glyphicon glyphicon-eye-open"></a>

					<a href="{{route('admin.Inventarios.destroy',$inventario->IdInventario)}}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger glyphicon glyphicon-trash">
					
					</a> 
					<a href="{{route('admin.Inventarios.edit',$inventario->IdInventario)}}" class="btn btn-warning glyphicon glyphicon-cog">
					
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
	      			Tipo:      
	      			<p class="modal-tipo"></p>
	        		<hr>
	      			Medidas (Alto x Largo x Ancho):
	      			<p class="modal-medidas"></p>
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
  var tipo = button.data('tipo') 
  var medidas = button.data('medidas')
  var cantidad=button.data('cantidad')
  var notas = button.data('notas')


  var modal = $(this)
  
  modal.find('.modal-title').text('Detalles de  ' + tipo)  
  modal.find('.modal-tipo').text(tipo)
  modal.find('.modal-medidas').text(medidas)
  modal.find('.modal-cantidad').text(cantidad)
  modal.find('.modal-notas').text(notas)
})
</script>






	{!! $inventarios->render() !!}

@endsection