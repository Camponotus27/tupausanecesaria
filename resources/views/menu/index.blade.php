@extends ('layouts.admin')
@section ('contenido')

<style>

	/* sacar a un nuevo componente */
	.spacing{
		width: 100%;
		height: 120px;
	}

	.spacing {
    	position: relative;
	}

	.spacing:before {
		content: "";
		background: #ab2f0f;
		bottom: 0;
		height: 2px;
		left: 30%;
		width: 40%;
		top: 60%;
		position: absolute;
		transition: all 0.6s;
	}
</style>

	<link rel="stylesheet" href="{{asset('css/menu/menu.css?v=1.0')}}">

	<div class="row">
		<div class="col-lg-6 col-sm-8 col-md-6 col-xs-12 center-block">
			<div class="panel-heading titulo_login">Elige tus favoritos</div>
			{{-- @include('menu.search') --}}
		</div>
	</div>

	<div class="row">
		<div>
			
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
					@endif
				@endforeach
			</center>
		</div>
	</div>
	<div class="spacing" >

	</div>
@endsection