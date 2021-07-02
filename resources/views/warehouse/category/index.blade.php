@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 center-block">
			<div class="alert-atras">
                    {!! link_to('/', '', ['class' => 'btn-atras']) !!}
                    @if (session('info'))
                        <div class="alert alert-success">{{ session('info') }}</div>
                    @endif
            </div>
			<h3>Listado de Categorias 
				@can('warehouse.category.create')
				<a href="category/create"><button class="btn btn-success btn-success-crear">Nuevo</button></a></h3>
				@endcan

			{{-- {!! link_to('/warehouse/category', 'Atras', ['class' => 'btn btn-default']) !!} --}}
			@include('warehouse.category.search')
		</div>
	</div>

	<div class="cont-table-resp">
		<table class="table-resp" style="min-width: 650px;">
			<thead>
				<th>ID</th>
				<th>NOMBRE</th>
				<th>DESCRIPCION</th>
				<th>OPCIONES</th>
			</thead>
			@foreach($categorys as $category)
			<tr>
				<td>{{ $category->id}}</td>
				<td>{{ $category->nombre}}</td>
				<td>{{ $category->descripcion}}</td>
				<td>
					@can('warehouse.category.edit')
						<a href="{{ action([App\Http\Controllers\CategoryController::class, 'edit'], $category) }}"><button class="btn btn-info">Editar</button></a>
					@endcan

					@can('warehouse.category.delete')
						<a href="" data-target ="#modal-delete-{{$category->id}}" data-toggle = "modal"><button class="btn btn-danger">Eliminar</button></a>
					@endcan
				</td>
			</tr>
			@include('warehouse.category.modal')
			@endforeach
		</table>
	</div>

@endsection