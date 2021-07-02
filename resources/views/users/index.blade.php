@extends ('layouts.admin')
@section ('contenido')

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
        <h3>Personal</h3>
    </div>
</div>

<div class="table-resp-cont">
    <table class="table-resp">
        <thead>
            <th>ID</th>
            <th>Nombre</th>
            <th>E-mail</th>
            <th>OPCIONES</th>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                @can('users.edit')
                        <a href="{{ route('users.edit', $user->id) }}" 
                        class="btn btn-info">
                            Editar
                        </a>
                @endcan
                @can('users.destroy')
                        {{-- {!! Form::open(['route' => ['users.destroy', $user->id], 
                        'method' => 'DELETE']) !!}
                            <button class="btn btn-danger">
                                Eliminar
                            </button>
                        {!! Form::close() !!} --}}

                        <a href="" data-target ="#modal-delete-{{$user->id}}" data-toggle = "modal"><button class="btn btn-danger">Eliminar</button></a>
                @endcan
                </td>
            </tr>
            @include('users.modal')
            @endforeach
        </tbody>
    </table>
    {{ $users->render() }}
</div>

@endsection