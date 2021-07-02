@extends('layouts.admin')

@section('contenido')
<div class="row">
	<div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 center-block"> 
            	<div class="alert-atras">
                    {!! link_to('/roles', '', ['class' => 'btn-atras']) !!}
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

                <div class="titulo_login">Roles</div>                 
                    {!! Form::model($role, ['route' => ['roles.update', $role->id],
                    'method' => 'PUT']) !!}

                        @include('roles.partials.form')
                        
                    {!! Form::close() !!}
    </div>
</div>
@endsection