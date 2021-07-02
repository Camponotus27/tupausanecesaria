@extends ('layouts.admin')
@section ('contenido')

<style type="text/css">
	
	.table-resp{
		min-width: 600px;
	}

</style>

<div class="row">
	<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 center-block">
		{!! link_to('/', '', ['class' => 'btn-atras']) !!}
		<h3>Listado de Complements 
			
				<a href="complements/create"><button class="btn btn-success btn-success-crear">Nuevo</button></a>
			
		</h3>
		@include('complements.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 center-block">
		<div class="table-resp-cont">
			<table class="table-resp">
				<thead>
					<th>Nombre</th>
					<th>Stock</th>
					<th>Descripcion</th>
					<th>Acciones</th>
				</thead>
				@foreach($complements as $complement)
				<tr>
					<td class="capitalize">{{ $complement->nombre}}</td>
					<td>{{ $complement->stock}}</td>
					<td class="texto-largo-cont">
						<div class="texto-largo">
							{{ $complement->descripcion}}
						</div>
					</td> 
					<td><div>
						
							<a href="{{action([App\Http\Controllers\ComplementController::class, 'edit'], $complement)}}"><button class="btn btn-info">Editar</button></a>
						
							<a href="" data-target ="#modal-delete-{{$complement->id}}" data-toggle = "modal"><button class="btn btn-danger">Eliminar</button></a>
						
						</div>
					</td>
				</tr>
				@include('complements.modal')
				@endforeach
			</table>

		</div>
		{{$complements->render()}}</center>
	</div>
</div>
	
@endsection