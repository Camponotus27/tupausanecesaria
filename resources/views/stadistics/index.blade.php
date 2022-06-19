@extends ('layouts.admin')
@section ('contenido')

<style>

	
</style>
	<link rel="stylesheet" href="{{asset('css/menu/menu.css?v=1.0')}}">

	<div class="row">
		<div class="col-lg-6 col-sm-8 col-md-6 col-xs-12 center-block">
			<div class="panel-heading titulo_login">Estadisticas</div>
			{{-- @include('menu.search') --}}
		</div>
	</div>

	<div class="row">
		<div>
			
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<center>
				<div id="visit-component"></div>
			</center>
		</div>
	</div>
	<div class="spacing" >

	</div>
@endsection