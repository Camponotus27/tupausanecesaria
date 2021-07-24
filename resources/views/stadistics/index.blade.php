@extends ('layouts.admin')
@section ('contenido')

<style>

	
</style>

	<link rel="stylesheet" href="{{asset('css/menu/menu.css?123')}}">

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
        
                @foreach($visits_grouped_created as $created_at => $visits)
                    <h2>{{$created_at." (".count($visits).")"}}</h2>
                    <!--
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">URL</th>
                          <th scope="col">Device</th>
                          <th scope="col">Ip</th>
                          <th scope="col">Creacion</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach($visits as $visit)
                              <tr>
                                  <th scope="row">{{$visit->id}}</th>
                                  <td>{{$visit->url}}</td>
                                  <td>{{$visit->device." - ".$visit->platform." - ".$visit->browser}}</td>
                                  <td>{{$visit->ip}}</td>
                                  <td>{{$visit->created_at}}</td>
                              </tr>
                          @endforeach
                      </tbody>
                    </table>
                    -->
                  @endforeach

			</center>
		</div>
	</div>
	<div class="spacing" >

	</div>
@endsection