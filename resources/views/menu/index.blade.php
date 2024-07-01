@extends ('layouts.admin')
@section ('contenido')

	<link rel="stylesheet" href="{{asset('css/menu/menu.css?v=1.0')}}">

	<div class="row">
		<div class="col-lg-6 col-sm-8 col-md-6 col-xs-12 center-block">
			<div class="titulo_login">Saborea lo mejor de</div>
            <div class="titulo_login">Oasis Urbano</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 menu">
			<center>
				@foreach($categories as $category)
					@if($category->products->count() > 0)
						<h1 class="category">{{$category->nombre}}</h1>
						<div class="category-descripcion">{{$category->descripcion}}</div>
						<div class="">
								@foreach($category->products as $product)
								<div class="item-menu">
									<div class="caja-item">
										<div>
											<div class="nombre">{{ $product->nombre}}</div>
											<div class="descripcion">{{ $product->descripcion}}</div>
										</div>
										<div class="precio">${{$product->precio}}</div>		
									</div>
								</div>
								@include('menu.modal-ordenar' , ['complements' => $product->complements] )
								@endforeach
						</div>
						<div class="category-descripcion-secundaria">{{$category->descripcion_secundaria}}</div>
					@endif
				@endforeach
			</center>
		</div>
	</div>
	<div class="spacing" >

	</div>
@endsection