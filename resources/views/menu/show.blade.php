



@extends ('layouts.admin')
@section ('contenido')

<style>
	
	.menu-modal-titulo{
		font-size: var(--txl);
		margin: 0;
	}	

	.menu-modal-cont{
		display: flex;
		flex-direction: column;
		justify-content: space-around;
	}

	.menu-modal-cont h2{
		font-size: var(--tl);

	}

	.menu-modal-item{
		padding: 0 var(--tn);
	}

	.flex-grow{
		flex: 0 1 auto;
	}

	.servir{
		align-self: center;
	}

	.modal-dialog{
		width: 80%;
	}

	@media screen and (min-width: 360px) {
			
	}
	
	@media screen and (min-width: 768px) {
		.menu-modal-cont{
			flex-direction: row;
		}

		.modal-dialog{
			width: 800px;
		}

		.flex-grow{
		flex: 0 1 200px;
	}
	
	}
	
	@media screen and (min-width: 1200px) {
		
	}

	

</style>

	<link rel="stylesheet" href="{{asset('css/menu/menu.css')}}">

	<div class="row">
		<div class="col-lg-6 col-sm-8 col-md-6 col-xs-12 center-block">
			<div class="panel-heading titulo_login">Menu</div>
			@include('menu.search')
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<center>

				<div class="containerr">

					@foreach($products as $product)
					<div class="item">
						<div class="caja-item">
							<div class="nombre">{{ $product->nombre}}</div>
							<div class="sub-item">		
								<img src="{{asset('imagenes/products/'.$product->imagen)}}" alt="{{$product->imagen}}" height="100px" width="100px" class=" imagen">
							</div>
							<div class="precio">${{$product->precio}}</div>

							<a href="" class="modal-bottom" data-target ="#modal-ordenar-{{$product->id}}" data-toggle = "modal">
								<button id="{{$product->id}}" class="boton-carrito">Ordenar</button>
							</a>

						</div>
					</div>
					@include('menu.modal-ordenar' , ['complements' => $product->complements] )
					@endforeach
				</div>
			
			</center>
		</div>
	</div>
@endsection