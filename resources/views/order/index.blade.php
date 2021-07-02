@extends ('layouts.admin')
@section ('contenido')
	
<style>

	.contenedor-estadisticas-order{
		display: flex;
	}

	.contenedor-estadisticas-order .item-estadisticas-order:first-child{
		border-left: solid 1px #333;
	}

	.item-estadisticas-order{
		padding: 1em;
		text-align: center;
		border-right: solid 1px #333;
		flex-basis: 33.33%;
	}

	.item-estadisticas-order span{
		display: block;
		font-size: var(--txl);
		color: #3f51b5;
	}

	.data-picker-order{
	  
	}

	.form-data-picher-order{
		text-align: left;
	}

	.data-picker-irder-group{
		display: flex;
	}


</style>

<div class="row">
	<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 center-block">
		{!! link_to('/', '', ['class' => 'btn-atras']) !!}
		<h3>Registro de Ordenes con Pago</h3>
	</div>
</div>

<div class="row mt-txl">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 center-block">
		<h3 class="t-center">Estadisticas</h3>

		<div class="contenedor-estadisticas-order mb-txl">
			<div class=" item-estadisticas-order">
				<span> {{$totalMonthUS}} USD </span>
				Ingres del mes
			</div>
			<div class=" item-estadisticas-order">
				<span> {{$totalMonthCLI}} CLI </span>
				Ingres del mes
			</div>
			<div class=" item-estadisticas-order">
				<span> {{$totalMonthCount}} </span>
				Numero de ventas
			</div>
		</div>
			

		<div class="form-contenedor">

			{!! Form::open(['action' => 'OrdersController@index' , 'method' => 'GET' , 'class' => 'form-data-picher-order mb-txl']) !!}

			<div class="data-picker-irder-group">
				{{ Form::select('month', array('01' => 'Enero', '02' => 'Febrero', '03' => 'Marzo', '04' => 'Abril', '05' => 'Mayo', '06' => 'Junio', '07' => 'Julio', '08' => 'Agosto', '09' => 'Septiembre', '10' => 'Octubre', '11' => 'Noviembre', '12' => 'Diciemte'), date('m') , ['class' => 'ml-txl data-picker-months-order form-control']) }}

				{{ Form::select('year', array('2018' => '2018', '2019' => '2019', '2020' => '2020', '2021' => '2021', '2022' => '2022'), date('Y') , ['class' => 'ml-txl data-picker-order form-control']) }}

				{{ Form::submit('Buscar por fecha' , ['class' => 'btn btn-info ml-txl']) }}
			</div>

			

			{!! Form::close() !!}
		</div>
	</div>
</div>

<div class="table-resp-cont">
	<table class="table-resp">
		<thead>
			<th>N°</th>
			<th>Comprador</th>
			<th>Fecha de venta</th>
			<th>Hora de venta</th>
			<th>MontoUS</th>
			<th>MontoCLI</th>
			<th>Estado</th>
			<th>Acciones</th>
		</thead>
		@foreach($orders as $order)
		<tr>
			<td>{{$order->id}}</td>
			<td>{{$order->recipient_name}}</td>
			
			{{-- <td>
				<a href="#" data-type="text" 
							data-pk="{{$order->id}}" 
							data-url="{{url('/orders/'.$order->id)}}"
							data-title="Numero de guia" 
							data-value="{{$order->guide_number}}"
							data-name="guide_number"
							class="set-guide_number"></a>
			</td> --}}

			<td>{{$order->created_at->format('d-m-Y')}}</td>
			<td>{{$order->created_at->format('H:i:s')}}</td>
			<td>{{$order->total}} USD</td>
			<td>$ {{$order->totalCLI()}}</td>
			<td class="x-edit-select">
				<a href="#" data-type="select" 
							data-pk="{{$order->id}}" 
							data-url="{{url('/orders/'.$order->id)}}"
							data-title="Numero de guia" 
							data-value="{{$order->status}}"
							data-name="status"
							class="select-status"></a>		
			</td>
			<td>
				<a href="{{URL::action('OrdersController@show' , $order->id )}}"><button class="btn btn-info">Ver</button></a>

				<a href="" data-target ="#modal-delete-{{$order->id}}" data-toggle = "modal"><button class="btn btn-danger">Eliminar</button></a>
			</td>
		</tr>
		@include('order.modal')
		@endforeach
	</table>
</div>
		
@endsection