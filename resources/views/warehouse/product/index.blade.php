@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 center-block">
			{!! link_to('/', '', ['class' => 'btn-atras']) !!}
			<h3>Listado de Articulos 
				@if($cant_complements>0)
					@can('warehouse.product.create')
						<a href="product/create"><button class="btn btn-success btn-success-crear">Nuevo</button></a>
					@endcan
				@else
					<a href="complements/create"><button class="btn btn-success btn-success-crear">Nuevo</button></a>
					<p>sin complements no puedes crear products</p>
				@endif
			</h3>
			@include('warehouse.product.search')
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 center-block">
			<center>{{$products->render()}}
			<div class="table-resp-cont">
				<table class="table-resp">
					<thead>
						<th>ID</th>
						<th>NOMBRE</th>
						<th>CATEGORIA</th>
						<th>STOCK</th>
						<th>CANT INSUMOS</th>
						<th>CREMA</th>
						<th>AZUCAR</th>
						<th>PRECIO</th>
						<th>IMAGEN</th>
						<th>DESCRIPCION</th>
						<th>OPCIONES</th>
					</thead>
					@foreach($products as $product)
					<tr>
						<td>{{ $product->id}}</td>
						<td class="capitalize">{{ $product->nombre}}</td>
						<td>{{ $product->category->nombre}}</td>
						<td>{{ $product->stock}}</td>
						<td>{{ $product->cant_complements}}</td>
						<td>{{ ($product->crema == 0)?'NO':'SI'}}</td>
						<td>{{ ($product->azucar== 0)?'NO':'SI'}}</td>
						<td>${{ $product->precio}}</td>
						<td><div class="imagen-tabla">
								<img src="{{getImageOrDefault('products/Ico-'.$product->imagen)}}" alt="{{$product->imagen}}" class="img-thumbnail">  
							</div>
						</td>
						<td class="texto-largo-cont"><div class="texto-largo">{{ $product->descripcion}}</div>
						</td> 
						<td><div>
							@can('warehouse.product.edit')
								<a href="{{action([App\Http\Controllers\ProductController::class, 'edit'], $product)}}"><button class="btn btn-info">Editar</button></a>
							@endcan
					
							@can('warehouse.product.delete')
								<a href="" data-target ="#modal-delete-{{$product->id}}" data-toggle = "modal"><button class="btn btn-danger">Eliminar</button></a>
							@endcan
							</div>
						</td>
					</tr>
					@include('warehouse.product.modal')
					@endforeach
				</table>

			</div>
			{{$products->render()}}</center>
		</div>
	</div>
	
@endsection