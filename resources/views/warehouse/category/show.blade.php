@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<div class="form-group ">
				<label for = "nombre">Nombre</label>
				<h2>{{ $category->nombre }}</h2>
			</div>

			<div class="form-group">
				<label for = "descripcion">Descripcion</label>
				<h2>{{ $category->descripcion }}</h2>
			</div>

			<div class="form-group">	 
				{!! link_to('/warehouse/category', 'Atras', ['class' => 'btn btn-default']) !!}
			</div>
		</div>
	</div>
@endsection