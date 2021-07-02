@extends ('layouts.admin')
@section ('contenido')
	
<div class="row">
	<div class="col-lg-6 col-sm-8 col-md-6 col-xs-12 center-block">
			<div class="alert-atras">
                    {!! link_to('/warehouse/product', '', ['class' => 'btn-atras']) !!}
                    @if (session('info'))
                        <div class="alert alert-success">{{ session('info') }}</div>
                    @endif

                    @if (count($errors)>0)
					<div class="alert alert-danger">
						<ul>
							@foreach($errors->all() as $error)
							<li>{{$error}}</li>
							@endforeach
						</ul>				
					</div>
					@endif
            </div>

            <div class="panel-heading titulo_login">Nuevo product</div>
    </div>
</div>


			{!! Form::open(array('url' => 'warehouse/product' , 'method' => 'POST' , 'autocomplete' => 'off', 'files' => 'true')) !!}

			{{Form::token()}}

				@include('warehouse.product.partials.form')

			{!! Form::close() !!}

			<!-- cropit http://scottcheng.github.io/cropit/ -->
			 <script src="{{asset('js/cropit/cropit.opciones.js')}}" ></script>
			<!-- end cropit -->

@endsection