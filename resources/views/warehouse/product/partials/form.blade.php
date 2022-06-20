<style>
	.lista  li > .azucar_crema > label:nth-child(2){
		order: 3;
	}
</style>

<div class="row">
	<div class="col-lg-6 col-sm-12 col-md-6 col-xs-12 center-block">
			<div class="row">
				<div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">

					{{ Form::label('nombre', 'Nombre') }}
					{{ Form::text('nombre', null , ['class' => 'form-control' , 'placeholder' => 'Nombre']) }}

				</div>

				<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
					<label for = "category">Category</label>
					<select name="id_category" class="form-control">
						@foreach($categories as $cat)
							@if ($cat->id == $product->id_category || $cat->id == old('id_category'))
							<option value="{{$cat->id}}" style="text-transform: capitalize;" selected>{{$cat->nombre}}</option>	
							@else
							<option value="{{$cat->id}}" style="text-transform: capitalize;" >{{$cat->nombre}}</option>
							@endif
						@endforeach
					</select>
				</div>
			</div>

						


			{{--
			<h4>Lista de complements</h4>
			<div class="form-group lista ">
				<div class="row max-h-overflow-y">
					@foreach($complements as $complement)
				    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				    		<li>
						        <label> 

									@if(old())
										<input type="checkbox" name="complements[]" value="{{$complement->id}}" class="chekbox-permisos checkbox_complements" id="chekbox-permisos-{{$complement->id}}" {{((old('complements') && in_array($complement->id, old('complements'))))? 'checked' :'' }}>
									@else
										<input type="checkbox" name="complements[]" value="{{$complement->id}}" class="chekbox-permisos checkbox_complements" id="chekbox-permisos-{{$complement->id}}" {{($complement->marcado == true)? 'checked' :'' }}>
									@endif

								     <label for="chekbox-permisos-{{$complement->id}}" class="checkbox-personalizado"></label>
							        
									<div class="checkbox-personalizado-descripcion">
								        <label for="chekbox-permisos-{{$complement->id}}" style="text-transform: capitalize;" >{{ $complement->nombre }}</label>
							        </div>
						        </label>
						    </li>
				    	</div>
				    @endforeach
				</div>
			</div>

			--}}

			<div class="row">
				{{-- 
				<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
					<div class="form-group">
						{{ Form::label('cant_complements', 'Cant. complements') }}
						{{ Form::number('cant_complements', null , [ 'placeholder' => '1' , 'class' => 'form-control' , 'min' => '1', 'max' => '1', 'id' => 'cant_complements']) }}
					</div>
				</div>

				
				<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
					<div class="form-group">
						{{ Form::label('stock', 'Stock') }}
						{{ Form::number('stock', null , [ 'placeholder' => '0' , 'class' => 'form-control']) }}
					</div>
				</div>
				--}}
				<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
					<div class="form-group">
						{{ Form::label('precio', 'Valor') }}
					${{ Form::number('precio', null , [ 'placeholder' => '0' , 'class' => 'form-control']) }}
					</div>
				</div>
			</div>

			{{--
			<div class="row lista">
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<li>
						        <label class="azucar_crema"> 
					
									@if(old())
										<input type="checkbox" name="crema" class="chekbox-permisos" value="1" id="crema" {{(old('crema') == '1')? 'checked' :'' }}>
									@else
										<input type="checkbox" name="crema" class="chekbox-permisos" value="1" id="crema" {{(!empty($product->crema) && $product->crema == 1)? 'checked' :'' }}>
									@endif

								     <label for="crema" class="checkbox-personalizado"></label>
							        
									<div class="checkbox-personalizado-descripcion">
								        <label for="crema" >Crema</label>
							        </div>
						        </label>
						    </li>
					</div>
				</div>
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="">
						<li>
						        <label class="azucar_crema"> 
						        	@if(old())
										<input type="checkbox" name="azucar" class="chekbox-permisos" value="1" id="azucar" {{(old('azucar') == '1')? 'checked' :'' }}>
									@else
										<input type="checkbox" name="azucar" class="chekbox-permisos" value="1" id="azucar" {{(!empty($product->azucar) && $product->azucar == 1)? 'checked' :'' }}>
									@endif

								     <label for="azucar" class="checkbox-personalizado"></label>
							        
									<div class="checkbox-personalizado-descripcion">
								        <label for="azucar" >Azucar</label>
							        </div>
						        </label>
						    </li>
					</div>
				</div>
			</div> --}}

			<div class="form-group">
				{{ Form::label('descripcion', 'Descripción') }}
				{{ Form::textarea('descripcion', null, ['class' => 'form-control textarea-personalizado', 'placeholder' => 'Descrpcion', 'id' => 'max-descripcion-textarea' , 'maxlength' => '500']) }}
			</div>
			<div class="max-descripcion">
				<label>maximo de caracteres : <span id= "max-descripcion-numero">500</span> </label>
			</div>

		</div>

		{{--
		<!-- jcrop -->
		<div class="image-editor col-lg-6 col-sm-12 col-md-6 col-xs-12" >
			<div class="image-editor2">
				@if(empty($product->imagen))
			    	<input id="imagen_input"  onchange="habilitar_edicion_imagen2()" type="file" class="imput-personalizado cropit-image-input" value="{{ old('image-data') }}" name="imagen">
			    @else
			    	<input id="imagen_input" type="file" class="imput-personalizado cropit-image-input" name="imagen" value="{{getImageOrDefault('products/'.$product->imagen)}}">
			    @endif

			    

			    <label for="imagen_input"  class="">
			    	<img src="{{asset('img/subir-imagen.png')}}">
			    </label>

			    <div class="cropit-responsive">
			      		<div class="sub-cropit-responsive">
			      			<div class="cropit-preview"></div>
			      		</div>
				</div>

				<div class="sub-titulo"> Tamaño minimo imagen 300x300 px</div>

				@if(empty($product->imagen))
			    	
				@else
					<div class="boton-imagen-panel btn btn-info" onclick="habilitar_edicion_imagen()">Editar imagen</div>		    	
					<input type="hidden" name="imagen_anterior" value="{{$product->imagen}}" >
				@endif
				

				<div class="imagen-panel">
				    <div class="image-size-label"></div>
				    
					<div class="rotate-section">
						<div class="rotate-ccw rotate-imagen"><img src="{{asset('img/giro-iz.png')}}" alt=""></div>
					    <div class="rotate-cw rotate-imagen"><img src="{{asset('img/giro-iz.png')}}" alt=""></div>
						<input id="range-rotate" type="range" class="cropit-image-zoom-input slider-range">
        		 		<input type="hidden" name="image-data" class="hidden-image-data" />
					    
				    </div>
				</div>
		    </div>
		</div>

		<!-- end jcrop -->
		--}}
</div>



<div class="row" onLoad>
	<div class="col-lg-6 col-sm-8 col-md-12 col-xs-12 center-block">
			<div class="form-group botonera-form" >
				<button class="btn btn-info" type="submit">Guardar</button>
			</div>
	</div>
</div>


<script>

	window.addEventListener('load', function(){

		var productsComplements = {
			inputCantComplements: document.querySelector('#cant_complements'),
			checkbox: document.querySelectorAll('.checkbox_complements'),
			checkbosChecked: null,
			run:()=>{
				for(var i = 0 ; i < productsComplements.checkbox.length ; i++){
					productsComplements.checkbox[i].addEventListener('change', productsComplements.cont , false);
				}
			},
			cont:()=>{
				productsComplements.checkbosChecked = document.querySelectorAll('.checkbox_complements:checked').length
				if(productsComplements.checkbosChecked > 0){
					productsComplements.inputCantComplements.max = productsComplements.checkbosChecked;
					productsComplements.inputCantComplements.value = productsComplements.checkbosChecked;
					productsComplements.inputCantComplements.readOnly = false;
				}else{
					productsComplements.inputCantComplements.max = 1;
					productsComplements.inputCantComplements.value = 0;
					productsComplements.inputCantComplements.readOnly = true;
				}
			}
		};
		productsComplements.cont();
		productsComplements.run();

	} , false);
	
</script>