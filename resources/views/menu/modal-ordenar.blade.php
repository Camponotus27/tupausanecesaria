
<div class="modal fade modal-slide-in-rigth modal-order" aria-hidden = "true" data-backdrop="static" role = "dialog" tabindex = "-1" id="modal-ordenar-{{$art->id}}">

	{!! Form::open(['url' => '/in_shopping_carts' , 'class' => 'add-to-cart' , 'data-idArticulo' => $art->id , 'method' => 'POST']) !!}
		<div class="modal-dialog">
			<div class="modal-content">	
				<div class="modal-header">
					<button type="button" class="close close-modal-{{$art->id}}" data-dismiss = "modal" aria-label = "Cerrar">
						<span aria-hidden = "true">x</span>
					</button>
					<h4 class="menu-modal-titulo">Eliga su pedido</h4> 
				</div>
				<div class="modal-body">	
					<div class="menu-modal-cont">

						<div class="menu-modal-item lista flex-grow" style="display: {{(empty($art->cant_complements))?'none':'block'}}">
							<h2>Variaciones (<span class="cantidad_complements cantComplements-modal-{{$art->id}}">{{$art->cant_complements}}</span>)</h2>
						
							@foreach($complements as $complement)
								<li>
							        <label> 
										<input type="checkbox" name="complements[]" value="{{$complement->nombre}}" class="chekbox-permisos checkbox-modal-{{$art->id}}" id="chekbox-permisos-{{$art->id}}-{{$complement->id}}">

									    <label for="chekbox-permisos-{{$art->id}}-{{$complement->id}}" class="checkbox-personalizado"></label>
								        
										<div class="checkbox-personalizado-descripcion">
									        <label for="chekbox-permisos-{{$art->id}}-{{$complement->id}}" >{{ $complement->nombre }}</label>
								        </div>
							        </label>
							    </li>
							@endforeach
							<p class="advertencia-model-complements-{{$art->id}}">Selecciona al menos una</p>
						</div>
						
						@if($art->crema == true)
							<div class="menu-modal-item lista">
								<h2>Crema</h2>
								<div class="form-group lista" id="radio-check-personalizar-lista">
								 	<label class="radio-personalizado"> 
								 		<label>Sin nada</label>
								 		{{ Form::radio('crema', 'sin-nada', true) }} 
								 		<span class="radio-check"></span>
								 	</label>
								 	<label class="radio-personalizado"> 
								 		<label>Shantilly</label>
								 		{{ Form::radio('crema', 'shantilly') }} 
								 		<span class="radio-check"></span>
								 	</label> 
								 	<label class="radio-personalizado">
								 		<label>Crema de leche</label>
								 		{{ Form::radio('crema', 'leche' ) }} 
								 		<span class="radio-check"></span>
								 	</label>
								</div>
							</div>
						@endif

						@if($art->azucar == true)
							<div class="menu-modal-item">
								<h2>Azucar</h2>
								<div class="form-group lista" id="radio-check-personalizar-lista">
								 	<label class="radio-personalizado"> 
								 		<label>Sin nada</label>
								 		{{ Form::radio('azucar', 'sin-nada', true) }} 
								 		<span class="radio-check"></span>
								 	</label>
								 	<label class="radio-personalizado"> 
								 		<label>Azucar</label>
								 		{{ Form::radio('azucar', 'azucar') }} 
								 		<span class="radio-check"></span>
								 	</label> 
								 	<label class="radio-personalizado">
								 		<label>Endulzante</label>
								 		{{ Form::radio('azucar', 'endulzante' ) }} 
								 		<span class="radio-check"></span>
								 	</label>
								</div>
							</div>
						@endif
						<div class="menu-modal-item servir">
							<div class="form-group lista" id="radio-check-personalizar-lista">
							 	<label class="radio-personalizado"> 
							 		<label>Servir</label>
							 		{{ Form::radio('servir', 'servir', true) }} 
							 		<span class="radio-check"></span>
							 	</label>
							 	<label class="radio-personalizado"> 
							 		<label>Llevar</label>
							 		{{ Form::radio('servir', 'llevar') }} 
							 		<span class="radio-check"></span>
							 	</label> 
							</div>
						</div>
					</div>
					

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss = "modal">Cerrar</button>
						
					<input type="hidden" name="products_id" value="{{$art->id}}" >

					<button type="submit" class="btn btn-primary" >Confirmar</button>
 
				</div>
			</div>
		</div>
	{{form::close()}}
</div>
