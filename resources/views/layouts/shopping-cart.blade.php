<link rel="stylesheet" href="{{asset('css/layout/shopping-cart.css')}}">

<div class="contenedor-shopping-cart {{($shoppingCount!=0)? '' : 'hiden'}}">
	<div class="item-shopping-cart">
		<a href="{{url('/carrito')}}">
			<img src="{{asset('img/stoptime-menu.png')}}" alt="">
		</a>
	</div>
	<span class="contador-menu">{{$shoppingCount}}</span>

	<div class="efecto-ordenar"></div>
</div>