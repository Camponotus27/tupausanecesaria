{!! Form::open(array('url'=>'warehouse/product', 'method'=>'GET', 'autocomplete'=>'off', 'role'=>'search')) !!}

	<div class="form-group">
		<div class="input-group">
			<input type="text" class="form-control" name="searchText" placeholder="Buscar.." value="{{$searchText}}">
			<span class="input-group-btn">
				<button class="btn-search btn btn-primary"type="submit">Buscar</button>
			</span>
		</div>
	</div>

{{Form::close()}}