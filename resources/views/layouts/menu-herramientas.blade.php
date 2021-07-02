@can('opciones.index')

<link rel="stylesheet" type="text/css" href="{{asset('css/layout/container-menu-herramientas.css')}}">

<div class="boton-opciones">
  <img src="{{asset('img/tuerca.png')}}" alt="">
</div>


<div class="container-menu-herramientras">
    
    <!--
    @can('order_day.index')
        <a class="item-menu-herramientas"  href="{{ route('ordersDay.index') }}">Ordenes del dia</a>
    @endcan
    -->

    @can('warehouse.products.index')
        <a class="item-menu-herramientas"  href="{{ route('products.index') }}">Productos</a>
    @endcan

    @can('warehouse.complement.index')
        <a class="item-menu-herramientas"  href="{{ route('complements.index') }}">Complementos</a>
    @endcan

    @can('warehouse.category.index')
        <a class="item-menu-herramientas"  href="{{ route('category.index') }}">Categorias</a>
    @endcan
    
    @can('roles.index')
        <a class="item-menu-herramientas"  href="{{ route('roles.index') }}">Roles</a>
    @endcan

    @can('users.index')
        <a class="item-menu-herramientas"  href="{{ route('users.index') }}">Personal</a>
    @endcan

    <!--
    @can('orders.index')
        <a class="item-menu-herramientas"  href="{{ route('orders.index') }}">Estadisticas</a>
    @endcan
    -->

</div>


<script src="{{asset('js/layout/menu-herramientras.js')}}"></script>
@endcan
