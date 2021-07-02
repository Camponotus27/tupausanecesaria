@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>				
			</div>
			@endif
		</div>
	</div>

			<div class="alert-atras">
                    {!! link_to('/roles', '', ['class' => 'btn-atras']) !!}
                    @if (session('info'))
                        <div class="alert alert-success">{{ session('info') }}</div>
                    @endif
            </div>

            <div class="panel-heading titulo_login">Roles</div>
			{!! Form::open(array('url' => 'warehouse/product' , 'method' => 'POST' , 'autocomplete' => 'off', 'files' => 'true')) !!}
			{{Form::token()}}

			<div class="row">
				<div class="col-lg-6 col-sm-6 col-md-12 col-xs-12">
								<h3>Nuevo product</h3>
					<div class="form-group">
						<label for = "nombre">Nombre</label>
						<input type="text" name="nombre" required value="{{old('nombre')}}" class="form-control" placeholder="Nombre">
					</div>
					<div class="row">
						<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
							<div class="form-group">
								<label for = "category">Category</label>
								<select name="id_category" class="form-control">
									@foreach($categorys as $cat)
										@if($cat->id_category == old('id_category'))
											<option value="{{$cat->id_category}}" selected>{{$cat->nombre}}</option>
										@else
											<option value="{{$cat->id_category}}">{{$cat->nombre}}</option>
										@endif
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
							<div class="form-group">
								{{ Form::label('stock', 'Stock') }}
								{{ Form::number('stock', 0, ['class' => 'form-control']) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						{{ Form::label('precio', 'Valor') }}
						{{ Form::number('precio', 0, ['class' => 'form-control']) }}
					</div>
					<div class="form-group">
						{{-- <!-- <label for = "descripcion">Descripcion</label>
						<input type="textarea" name="descripcion" value="{{old('descripcion')}}" class="form-control" placeholder="descripcion"> --> --}}
						{{ Form::label('descripcion', 'Descripción') }}
						{{ Form::textarea('descripcion', null, ['class' => 'form-control textarea-personalizado', 'placeholder' => 'descrpcion', 'id' => 'max-descripcion-textarea' , 'maxlength' => '500']) }}
					</div>
					<div class="max-descripcion">
						<lavel>maximo de caracteres : <span id= "max-descripcion-numero">500</span> </lavel>
					</div>

				</div>

		

				<div class="image-editor col-lg-6 col-sm-6 col-md-12 col-xs-12" >
					<div class="image-editor2">
					    <input id="imagen_input" type="file" class="imput-personalizado cropit-image-input" name="imagen" required>
					    <label for="imagen_input" class="">
					    	<img src="{{asset('img/subir-imagen.png')}}">
					    </label>

					    <div class="cropit-responsive">
					      		<div class="sub-cropit-responsive">
					      			<div class="cropit-preview"></div>
					      		</div>
						</div>
						<div class="imagen-panel">
						    <div class="image-size-label">
						        Zoom
						    </div>
						    
							<div class="rotate-section">
								<div class="rotate-ccw rotate-imagen"><img src="{{asset('img/giro-iz.png')}}" alt=""></div>
							    <div class="rotate-cw rotate-imagen"><img src="{{asset('img/giro-iz.png')}}" alt=""></div>
								<input id="range-rotate" type="range" class="cropit-image-zoom-input">
		        		 		<input type="hidden" name="image-data" class="hidden-image-data" />
						    </div>
						</div>
				    </div>
				</div>

				<!-- end jcrop -->

				<div class="col-lg-6 col-sm-6 col-md-12 col-xs-12">
					<div class="form-group">
						<button class="btn btn-primary" type="submit">Guardar</button>
						<button class="btn btn-danger" type="reset" value="Reset">Borrar</button>
					</div>
				</div>
			</div>

			

		

			<div class="form-group">
				
				{!! link_to('/warehouse/product', 'Atras', ['class' => 'btn btn-default']) !!}
			</div>

			{!! Form::close() !!}

			<!-- cropit http://scottcheng.github.io/cropit/ -->
			 <script>
				      $(function() {
				        $('.image-editor').cropit({
				          exportZoom: 2,
				          width: 400,	
				          height: 400,
				          imageBackground: true,
				          imageBackgroundBorderWidth: 50,
				          minZoom: 'fill',
				          maxZoom: 2,
				          imageState: {
				            //src: 'http://lorempixel.com/500/400/',
				          },
				        });

				        $('.rotate-cw').click(function() {
				          $('.image-editor').cropit('rotateCW');
				        });
				        $('.rotate-ccw').click(function() {
				          $('.image-editor').cropit('rotateCCW');
				        });

				        $('form').submit(function() {
				          // Move cropped image data to hidden input
				          var imageData = $('.image-editor').cropit('export');
				          $('.hidden-image-data').val(imageData);

				          // Print HTTP request params
				          //var formValue = $(this).serialize();
				          //$('#result-data').text(formValue);

				          // Prevent the form from actually submitting
				          //return false;
				        });
				      });
			</script>
			<!-- end cropit -->

@endsection