@extends('layouts.admin')

@section('contenido')
<div class="container">
            <div class="">
                <div class="panel-heading titulo_login">Rol</div>

                <div class="panel-body">                                        
                    <p><strong>Nombre :</strong>     {{ $role->name }}</p>
                    <p><strong>Descripción :</strong>  {{ $role->description }}</p>
                </div>
            </div>

</div>
@endsection