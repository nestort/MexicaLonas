@extends('admin.template.Layout')
@section('title','Listado clientes')
@section('contenedor')
<table class="table table-striped">
		<thead>
			<th>Nombre</th>
			<th>Ciudad</th>
			<th>Nombre de contacto</th>
			<th>Acciones</th>
			
		</thead>
		<tbody>			
			@foreach($clientes as $cliente)
			<tr>			
				<td>{{$cliente->NombreCompleto}}</td>
				<td>{{$cliente->Ciudad}}</td>
				<td>{{$cliente->NombreContacto}}</td>
				


				<td>
					<a  data-toggle="modal" 
					data-target="#exampleModal" 
					data-nombre="{{$cliente->NombreCompleto}}" 
					data-direccion="{{$cliente->Direccion}}" 
					data-colonia="{{$cliente->Colonia}}" 
					data-ciudad="{{$cliente->Ciudad}}" 
					data-rfc="{{$cliente->RFC}}"
					data-tfijo="{{$cliente->TelefonoFijo}}"
					data-tmovil="{{$cliente->TelefonoMovil}}"
					data-email="{{$cliente->Email}}"					
					data-ncontacto="{{$cliente->NombreContacto}}"					
					

					data-tmcontacto="{{$cliente->TelefonoMovilContacto}}"
					data-referencia="{{$cliente->Referencia}}"
					data-pdescuento="{{$cliente->PorcentajeDescuento}}"
					data-credito="{{$cliente->Credito}}"
					data-Notas="{{$cliente->Notas}}"

					class="btn btn-info glyphicon glyphicon-eye-open">						
					</a>

					<a href="{{route('admin.Clientes.destroy',$cliente->IdCliente)}}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger glyphicon glyphicon-trash">
					</a> 
					<a href="{{route('admin.Clientes.edit',$cliente->IdCliente)}}" class="btn btn-warning glyphicon glyphicon-cog">					
					</a>
						

				</td>
			</tr>
			@endforeach			
		</tbody>
	</table>



<!-- ***********************************Ventana modal*****************************************************************+-->
  	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    	<div class="modal-dialog modal-lg" role="document">
      		<div class="modal-content">
        
	        	<div class="modal-header">
	          		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	            		<span aria-hidden="true">&times;</span>
	          		</button>
	          		<h4 class="modal-title" id="exampleModalLabel"></h4>          
	        	</div>

				<div class="modal-body">      
	      			 Nombre:      
	      			<p class="modal-nombre "></p>
	        		<hr>
	      			Direccion:
	      			<p class="modal-direccion "></p>
	        		<hr>
	      			Colonia:
	      			<p class="modal-colonia"></p>        
					<hr>
	      			Ciudad:
	      			<p class="modal-ciudad"></p> 
	      			<hr>
	      			RFC:
	      			<p class="modal-rfc"></p>
	      			<hr>
	      			Telefono fijo:
	      			<p class="modal-tfijo"></p>       
	      			<hr>
	      			Telefono movil:
	      			<p class="modal-tmovil"></p>     
	      			<hr>
	      			Correo:
	      			<p class="modal-email"></p>   
	      			<hr>  
	      			Nombre de contacto:
	      			<p class="modal-ncontacto"></p> 
	      			<hr>
	      			Telefono de contacto:
	      			<p class="modal-tmcontacto"></p> 
	      			<hr>
	      			Referencia:
	      			<p class="modal-referencia"></p> 
	      			<hr>
	      			Descuento:
	      			<p class="modal-pdescuento"></p> 	   
	      			<hr>
	      			Credito:
	      			<p class="modal-credito"></p> 	   
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
	var direccion    =button.data('direccion')              
	var colonia      =button.data('colonia')            
	var ciudad       =button.data('ciudad')           
	var rfc          =button.data('rfc')         
	var tfijo        =button.data('tfijo')
	var tmovil       =button.data('tmovil')            
	           
	var ncontacto    =button.data('ncontacto')               
	var email        =button.data('email')
	var tmcontacto   =button.data('tmcontacto')                
	var referencia   =button.data('referencia')                
	var pdescuento   =button.data('pdescuento')                
	var credito      =button.data('credito')             
	var notas        =button.data('notas')           





  var modal = $(this)
  
  modal.find(    '.modal-title'         ).text('Detalles de  ' + nombre)  
  modal.find(    '.modal-nombre'        ).text(nombre    )
  modal.find(    '.modal-direccion'     ).text(direccion )
  modal.find(    '.modal-colonia'       ).text(colonia   )
  modal.find(    '.modal-ciudad'        ).text(ciudad    )
  modal.find(    '.modal-rfc'           ).text(rfc       )
  modal.find(    '.modal-tfijo'         ).text(tfijo     )
  modal.find(    '.modal-tmovil'        ).text(tmovil    )
  
  modal.find(    '.modal-ncontacto'     ).text(ncontacto )
  modal.find(    '.modal-email'         ).text(email     )
  modal.find(    '.modal-tmcontacto'    ).text(tmcontacto)
  modal.find(    '.modal-referencia'    ).text(referencia)
  modal.find(    '.modal-pdescuento'    ).text(pdescuento)
  modal.find(    '.modal-credito  '     ).text(credito   )
  modal.find(    '.modal-notas'         ).text(notas     )
})
</script>

	{!! $clientes->render() !!}


@endsection

