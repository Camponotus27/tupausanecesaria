@can('opciones.index')

<link rel="stylesheet" type="text/css" href="{{asset('css/layout/container-menu-herramientas.css')}}">

<div class="boton-opciones">
  <img src="{{asset('img/tuerca.png')}}" alt="">
</div>


<div class="container-menu-herramientras">

        <a class="item-menu-herramientas"  href="{{ route('ordersDay.index') }}">Ordenes del dia</a>

    @can('warehouse.product.index')
        <a class="item-menu-herramientas"  href="{{ route('products.index') }}">Productos</a>
    @endcan

    <a class="item-menu-herramientas"  href="{{ route('complements.index') }}">Complementos</a>

    <a class="item-menu-herramientas"  href="{{ route('category.index') }}">Categorias</a>
    
    @can('roles.index')
        <a class="item-menu-herramientas"  href="{{ route('roles.index') }}">Roles</a>
    @endcan

    @can('users.index')
        <a class="item-menu-herramientas"  href="{{ route('users.index') }}">Personal</a>
    @endcan

        <a class="item-menu-herramientas"  href="{{ route('orders.index') }}">Estadisticas</a>

</div>


<script src="{{asset('js/layout/menu-herramientras.js')}}"></script>
@endcan
