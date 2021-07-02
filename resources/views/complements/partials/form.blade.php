
<div class="row">
	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
		<div class="form-group">
			{{ Form::label('nombre', 'Nombre' ) }}
			{{ Form::text('nombre', null, ['class' => 'form-control']) }}
		</div>
	</div>

	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
		<div class="form-group">
			{{ Form::label('stock', 'Stock') }}
			{{ Form::number('stock', null , [ 'placeholder' => '0' , 'class' => 'form-control']) }}
		</div>
	</div>
</div>

<div class="form-group">
	{{ Form::label('descripcion', 'Descripción') }}
	{{ Form::textarea('descripcion', null, ['class' => 'form-control textarea-personalizado', 'placeholder' => 'Descrpcion', 'id' => 'max-descripcion-textarea' , 'maxlength' => '500']) }}
</div>

<div class="max-descripcion">
		<lavel>maximo de caracteres : <span id= "max-descripcion-numero">500</span> </lavel>
</div>

<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-info']) }}
</div