@extends('layouts.admin')

@section('contenido')

<style type="text/css">
    
    .table-resp{
        min-width: 700px;
    }

</style>
                
<div class="row">
    <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 center-block">
        <div class="alert-atras">
                    {!! link_to('/', '', ['class' => 'btn-atras']) !!}
                    @if (session('info'))
                        <div class="alert alert-success">{{ session('info') }}</div>
                    @endif
        </div>
        <h3>Listado de Roles 
            @can('roles.create')
                <a href="{{ route('roles.create') }}" 
                class="btn btn-success btn-success-crear">
                    Crear
                </a>
            @endcan
        </h3>
    </div>
</div> 


<center>{{$roles->render()}}
    <div class="table-resp-cont">
        <table class="table-resp">
            <thead>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripcion
                <th colspan="2">&nbsp;</th>
            </thead>
            @foreach($roles as $role)
            <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
                <td class="texto-largo-cont">
                    <div class="texto-largo">
                        {{ $role->description}}
                    </div>
                </td> 
                <td>
                    @can('roles.edit')
                        <a href="{{ route('roles.edit', $role->id) }}" 
                        class="btn btn-info">
                            Editar
                        </a>
                    @endcan
                    @can('roles.destroy')
                        <a href="" data-target ="#modal-delete-{{$role->id}}" data-toggle = "modal"><button class="btn btn-danger">Eliminar</button></a>
                    @endcan
                </td>
            </tr>
            @include('roles.modal')
            @endforeach
        </table>

    </div>
{{ $roles->render() }}</center>

@endsection