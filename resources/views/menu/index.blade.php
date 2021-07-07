@extends ('layouts.admin')
@section ('contenido')

<style>
	

</style>

	<link rel="stylesheet" href="{{asset('css/menu/menu.css')}}">

	<div class="row">
		<div class="col-lg-6 col-sm-8 col-md-6 col-xs-12 center-block">
			<div class="panel-heading titulo_login">Menu</div>
			{{-- @include('menu.search') --}}
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<center>

				@foreach($categories as $category)
					@if($category->products->count() > 0)
						<h1>{{$category->nombre}}</h1>
						<div class="containerr">
								@foreach($category->products as $product)
								<div class="item">
									<div class="caja-item">
										<div class="nombre">{{ $product->nombre}}</div>
										<div class="sub-item">		
											<img src="{{getImageOrDefault('products/'.$product->imagen)}}" alt="{{$product->imagen}}" height="100px" width="100px" class=" imagen">
										</div>
										<div class="precio">${{$product->precio}}</div>	
										<p class="precio">{{$product->descripcion}}</p>	
									</div>
								</div>
								@include('menu.modal-ordenar' , ['complements' => $product->complements] )
								@endforeach
						@endif
					</div>
				@endforeach
			</center>
		</div>
	</div>
@endsection