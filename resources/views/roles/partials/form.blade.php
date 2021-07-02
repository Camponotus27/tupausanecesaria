<div class="form-group">
	{{ Form::label('name', 'Nombre del rol') }}
	{{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
</div>

{{-- <!--
<div class="form-group">
	{{ Form::label('slug' , 'URL Amigable') }}
	{{ Form::text('slug' , '' , ['class' => 'form-control', 'id' => 'slug']) }}
</div> --> --}} 

	{{Form::hidden('slug','slug',['id' => 'slug'])}}

<div class="form-group">
	{{ Form::label('descripcion', 'Descripción') }}
	{{ Form::textarea('descripcion', null, ['class' => 'form-control textarea-personalizado', 'placeholder' => 'Descrpcion', 'id' => 'max-descripcion-textarea' , 'maxlength' => '500']) }}
</div>
<div class="max-descripcion">
		<lavel>maximo de caracteres : <span id= "max-descripcion-numero">500</span> </lavel>
</div>

<hr>
<h3>Permiso especial</h3>
<div class="form-group lista" id="radio-check-personalizar-lista">
 	<label class="radio-personalizado"> 
 		<label>Acceso total</label>
 		{{ Form::radio('special', 'all-access') }} 
 		<span class="radio-check"></span>
 	</label>
 	<label class="radio-personalizado"> 
 		<label>Ningún acceso </label>
 		{{ Form::radio('special', 'no-access') }} 
 		<span class="radio-check"></span>
 	</label> 
 	<label class="radio-personalizado">
 		<label>Personalizar </label>
 		{{ Form::radio('special', '' , true, ['id' => 'radio-check-personalizar']) }} 
 		<span class="radio-check"></span>
 	</label>
</div>
<h3>Lista de permisos</h3>
<div class="form-group lista">
		@foreach($permissions as $permission)
	    <li>
	        <label>
		        <!-- {{-- Form::checkbox('permissions[]', $permission->id , [ 'id' =>'chackbox-permisos']) --}} --> 

				@if($permission->marcado == true)
			        <input type="checkbox" name="permissions[]" value="<?php echo $permission->id ?>" checked class="chekbox-permisos" id="chekbox-permisos-<?php echo $permission->id ?>">

			        <label for="chekbox-permisos-<?php echo $permission->id ?>" class="checkbox-personalizado"></label>
		        @else
					<input type="checkbox" name="permissions[]" value="<?php echo $permission->id ?>" class="chekbox-permisos" id="chekbox-permisos-<?php echo $permission->id ?>">

			        <label for="chekbox-permisos-<?php echo $permission->id ?>" class="checkbox-personalizado"></label>
		        @endif


		        
				<div class="checkbox-personalizado-descripcion">
			        <label for="chekbox-permisos-<?php echo $permission->id ?>">{{ $permission->name }}</label>
			        <label>({{ $permission->description }})</label>
		        </div>
	        </label>
	    </li>
	    @endforeach
</div>
<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-info']) }}
</div>