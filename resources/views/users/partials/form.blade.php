<div class="form-group">
	{{ Form::label('name', 'Nombre de Usuario') }}
	{{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
</div>
<h3>Lista de roles</h3>
<div class="form-group lista">
		@foreach($roles as $role)
	    <li>
	        <label>
	        	{{ Form::checkbox('roles[]', $role->id, null , ['id' => 'chekbox-permisos2-'.$role->id, 'class' => 'chekbox-permisos2']) }}

				<label for="chekbox-permisos2-<?php echo $role->id ?>" class="checkbox-personalizado2"></label>

				<label>{{ $role->name }}</label>
			    <label> &nbsp ({{ $role->description }})</label>
	        </label>
	    </li>
	    @endforeach
</div>
<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-info']) }}
</div>