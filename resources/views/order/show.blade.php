@extends ('layouts.admin')
@section ('contenido')

	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 center-block">
			{!! link_to('/orders', '', ['class' => 'btn-atras']) !!}
			<h3>Registro de: {{ $order->recipient_name }} </h3>
		</div>
	</div>
	
	<div class="row info-dos-colum">

		<div class="conteiner col-lg-6 col-md-6 col-sm-6 col-xs-12 center-block">
			<div class="row ">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 center-block">
				<div class="form-group ">
					<label for = "nombre">N°</label>
					<p>{{$order->id}}</p>
				</div>

				<div class="form-group ">
					<label for = "Direccion">Direccion</label>
					<p>{{$order->address()}}</p>
				</div>

				<div class="form-group ">
					<label for = "nombre">Codigo postal</label>
					<p>{{$order->postal_code}}</p>
				</div>

				<div class="form-group ">
					<label for = "nombre">Pais y estado</label>
					<p>{{$order->country_code." ".$order->state}}</p>
				</div>

			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 center-block">
				<div class="form-group ">
					<label for = "nombre">Total compra</label>
					<p>{{$order->total}}</p>
				</div>

				<div class="form-group ">
					<label for = "nombre">Email</label>
					<p>{{$order->email}}</p>
				</div>


				<div class="form-group ">
					<label for = "nombre">Fecha y hora de la transacion</label>
					<p>{{$order->created_at}}</p>
				</div>
			</div>
		</div>
		</div>

</div>

<div class="table-resp-cont">
	<table class="table-resp">
		<thead>
			<th>ID</th>
			<th>NOMBRE</th>
			<th>STOCK</th>
			<th>PRECIO</th>
			<th>IMAGEN</th>
			<th>DESCRIPCION</th>
		</thead>
		@foreach($products as $product)
		<tr>
			<td>{{ $product->id }}</td>
			<td>{{ $product->nombre }}</td>
			<td>{{ $product->stock }}</td>
			<td>${{ $product->precio }}</td>
			<td><div class="imagen-tabla">
					<img src="{{asset('imagenes/products/'.$product->imagen)}}" alt="{{$product->imagen}}" class="img-thumbnail">  
				</div>
			</td>
			<td class="texto-largo-cont">
				<div class="texto-largo">{{ $product->descripcion}}</div>
			</td> 
			
		</tr>
		@endforeach
	</table>
</div>

<div class="form-group">	 
	{!! link_to('/orders', 'Atras', ['class' => 'btn btn-default']) !!}
</div>
	

@endsection