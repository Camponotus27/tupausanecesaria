@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 center-block">
			<div class="alert-atras">
                    {!! link_to('/warehouse/category', '', ['class' => 'btn-atras']) !!}
                    @if (session('info'))
                        <div class="alert alert-success">{{ session('info') }}</div>
                    @endif

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
			<h3>Editar category : {{$category->nombre}}</h3>

			{!! Form::model($category , ['method' => 'PATCH', 'route' => ['category.update' , $category->id]]) !!}
			{{Form::token()}}

			<div class="form-group">
				<label for = "nombre">Nombre</label>
				<input type="text" name="nombre" class="form-control" value="{{$category->nombre}}" placeholder="Nombre">
			</div>

			<div class="form-group">
				{{ Form::label('orden', 'Orden') }}
				${{ Form::number('orden', null , [ 'placeholder' => '0' , 'class' => 'form-control']) }}
			</div>

			<div class="form-group">
				{{ Form::label('descripcion', 'Descripción') }}
				{{ Form::textarea('descripcion', null, ['class' => 'form-control textarea-personalizado', 'placeholder' => 'Descrpcion', 'id' => 'max-descripcion-textarea' , 'maxlength' => '500']) }}
			</div>
			<div class="max-descripcion">
				<label>maximo de caracteres : <span id= "max-descripcion-numero">500</span> </label>
			</div>
			

			<div class="form-group">
				{{ Form::label('descripcion_secundaria', 'Descripción') }}
				{{ Form::textarea('descripcion_secundaria', null, ['class' => 'form-control textarea-personalizado', 'placeholder' => 'Descrpcion', 'id' => 'max-descripcion-textarea-2' , 'maxlength' => '500']) }}
			</div>
			<div class="max-descripcion">
				<label>maximo de caracteres : <span id= "max-descripcion-numero-2">500</span> </label>
			</div>

			<div class="form-group">
				<button class="btn btn-info" type="submit">Guardar</button>
			</div>

			{!! Form::close() !!}
		</div>
	</div>
@endsection