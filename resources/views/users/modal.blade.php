<div class="modal fade modal-slide-in-rigth" aria-hidden = "true" role = "dialog" tabindex = "-1" id="modal-delete-{{$user->id}}">

	{{Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete'])}}
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss = "modal" aria-label = "Cerrar">
						<span aria-hidden = "true">x</span>
					</button>
					<h4 class="modal-title">Eliminar</h4>
				</div>
				<div class="modal-body">
					<p>Confirme si desea eliminar el usuario</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss = "modal">Cerrar</button>
					<button type="submit" class="btn btn-primary">Confirmar</button>
				</div>
			</div>
		</div>
	{{form::close()}}
</div>