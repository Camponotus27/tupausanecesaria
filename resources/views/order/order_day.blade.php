@extends ('layouts.admin')
@section ('contenido')
	
<style>

	.contOrdersDay{
		display: flex;
		flex-direction: column;
		justify-content: space-around;
		margin-right: 0;
		background: rgba(50,133,0,0.1);
		margin-bottom: var(--tn);
	}

	.itemOrderDay{
		display: flex;
		flex-direction: column;
		padding: var(--ts) 0;
	}

	.itemOrderDay:first-child{
		flex-basis: 20%;
		background: #F0E448;
	}

	.itemOrderDay:nth-child(2) {
		flex-basis: 70%;
	}

	.itemOrderDay:nth-child(3) {
		flex-basis: 20%;
	}


	.itemOrderDay:nth-child(2) > .flexCol{
		border-top: 1px solid rgba(100,100,100,0.3);
	}

	.itemOrderDay:nth-child(2) > .flexCol:first-child{
		border-top: none;
	}
	
	
	.flexRow{
		outline: 1px  red;
		display: flex;
		justify-content: space-around;
	}

	.flexCol{
		display: flex;
		flex-direction: column;
		justify-content: space-around;
	}

	.subItemPrderDay{
		padding-bottom: calc(var(--txxs)*0.5);
		display: flex;
		justify-content: space-around;
	}

	.table-row > div{
		flex-basis: 20%;
		padding: 0 var(--txs);
	}


	.formsOrderDay{
		width: 100%;
	}

	.Pagado{
		color: green;
	}

	.No-Pagado{
		color: red;
	}

	.botonFormOrdeDay{
		background: white;
		width: 100%;
		height: 40px;
		text-align: center;
		margin: 0 1px;
		display: flex;
		justify-content: center;
		align-items: center;
		cursor: pointer;
		border-bottom-right-radius: 0;
		border-bottom-left-radius: 0;
		border: none;
	}

	.statusbFOD{
		text-transform: uppercase;
		color: white;
		width: 100%;
		line-height: 3em;
		font-size: var(--tl);
		margin: 0 1px;
		border: none;
	}

	.bFODD{
		flex-basis: 60%;
	}

	.bFODI{
		flex-basis: 40%;
	}

	.fondo-verde{
		background: green;
		color: white;
	}

	.fondo-amarillo{
		background: yellow;
		color: black;
	}

	.fondo-rojo{
		background: red;
		color: white;
	}


	@media screen and (min-width: 360px) {
			
	}
	
	@media screen and (min-width: 768px) {
		.contOrdersDay{
			flex-direction: row;
			margin-right: 85px;
		}

		.statusbFOD{
			line-height: 2.5em;
		}

		.botonFormOrdeDay:hover{
			background: white;
		}
	
	}
	
	@media screen and (min-width: 1200px) {
		
	}

</style>

<div class="row">
	<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 center-block ">
		{!! link_to('/', '', ['class' => 'btn-atras']) !!}
		<h3>Ordenes del dia</h3>
	</div>
</div>

{{--
<div class="table-resp-cont">
	<table class="table-resp">
		<thead>
			<th>Orden</th>
			<th>Comprador</th>
			<th>Fecha de venta</th>
			<th>Fecha de venta</th>
			<th>Monto</th>
			<th>Pagado</th>
			<th>Acciones</th>
		</thead>
		@foreach($orders as $order)
		<tr>
			<td>{{$order->id}}</td>
			<td>{{$order->recipient_name}}</td>
			
			 <td>
				<a href="#" data-type="text" 
							data-pk="{{$order->id}}" 
							data-url="{{url('/orders/'.$order->id)}}"
							data-title="Numero de guia" 
							data-value="{{$order->guide_number}}"
							data-name="guide_number"
							class="set-guide_number"></a>
			</td> 

			<td>{{$order->created_at->format('d-m-Y H:i:s')}}</td>
			<td>{{Carbon\Carbon::parse($order->shopping()->first()->fecha_reserva)->format('d-m-Y H:i:s')}}</td>
			<td>${{ $order->shopping()->first()->total() }}</td>
			 <td class="x-edit-select">
				<a href="#" data-type="select" 
							data-pk="{{$order->id}}" 
							data-url="{{url('/orders/'.$order->id)}}"
							data-title="Estado" 
							data-value="{{$order->status}}"
							data-name="status"
							class="select-status"></a>		
			</td> 
			<td>{{($order->pagado == 1)? "Pagado":""}}</td>
			<td>
				<a href="{{URL::action('OrdersController@show' , $order->id )}}"><button class="btn btn-info">Ver</button></a>

				<a href="" data-target ="#modal-delete-{{$order->id}}" data-toggle = "modal"><button class="btn btn-danger">Eliminar</button></a>
			</td>
		</tr>
		@endforeach
	</table>
</div>


--}}

@foreach($orders as $order)
	<div class="contOrdersDay">
		
		<div class="itemOrderDay">
			<div class="flexRow" style="font-size: var(--tl)">
				<div class="subItemPrderDay">
					<a href="{{URL::action('OrdersController@show' , $order->id )}}">{{$order->id}}</a>
				</div>
				<div class="subItemPrderDay">{{Carbon\Carbon::parse($order->shopping()->first()->fecha_reserva)->format('H:i:s')}}</div>
			</div>
			<div class="subItemPrderDay">
				{{$order->recipient_name}} 	
			</div>

			<div style="font-size: var(--tl)" class="subItemPrderDay">${{ $order->shopping()->first()->total() }}</div>
			<div style="font-size: var(--tl)" class="subItemPrderDay {{($order->pagado == 1)? 'Pagado':'No-Pagado'}}">{{($order->pagado == 1)? "Pagado":"Pendiente"}}</div>	
		
		</div>


		<div class="itemOrderDay flexCol">
			
				@foreach($order->shopping()->first()->products()->get() as $product)

					<div class="flexCol">
						<div class="flexRow table-row">
							<div>{{$product->nombre}}</div>
							<div>${{$product->precio}}</div>
							<div>{{$product->pivot->complements}}</div>
							<div>{{$product->pivot->crema}}</div>
							<div>{{$product->pivot->azucar}}</div>
							<div>{{$product->pivot->servir}}</div>
						</div>
					</div>

				@endforeach

		</div>

		<div class="itemOrderDay flexCol">

			{{ Form::open(['url' => 'orders/'.$order->id, 'method' => 'PUT' , 'class' => ('formsOrderDay formsOrderDay-'.$order->id )]) }}

			<div class="flexRow">
				<input type="submit" value="1" data-orderID="{{$order->id}}" class="botonFormOrdeDay bFOD1-{{$order->id}} bFOD1 btn fondo-rojo">
				<input type="submit" value="2" data-orderID="{{$order->id}}" class="botonFormOrdeDay bFOD2-{{$order->id}} bFOD2 btn fondo-amarillo">
				<input type="submit" value="3" data-orderID="{{$order->id}}" class="botonFormOrdeDay bFOD3-{{$order->id}} bFOD3 btn fondo-verde" >

			</div>
			<div data-orderID="{{$order->id}}" class="subItemPrderDay statusbFOD-{{$order->id}} statusbFOD {{ ($order->status=='creado')? 'fondo-rojo' : 'fondo-amarillo' }}">
				{{$order->status}}</div>
			<div class="flexRow">
	
				<input type="submit" value="<-" data-orderID="{{$order->id}}" class="botonFormOrdeDay bFODI-{{$order->id}} bFODI btn">
				<input type="submit" value="->" data-orderID="{{$order->id}}" class="botonFormOrdeDay bFODD-{{$order->id}} bFODD btn" >


			</div>



			{{ Form::hidden('value' , 'creado', ['class' => 'hiddenFormOrdeDay-'.$order->id]) }}
			{{ Form::hidden('name' , 'status') }}

			{{ Form::close() }}

		</div>



	</div>
@endforeach
		
@endsection