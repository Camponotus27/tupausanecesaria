<link rel="stylesheet" href="{{asset('css/layout/menu-personalizado.css')}}">

<div class="container-buttons-botom">
    
        <div class="item-buttons-botom item-buttons-botom-left ">
          <div class="subitem-buttons-botom"> 
                <a class="menu-link color-blanco" href="{{ route('menu.index') }}">Menu</a>             
          </div>
          @can('navigate.nosotros.index')
            <div class="subitem-buttons-botom">Nosotros</div>
          @endcan
        </div>

        <div class="item-buttons-botom item-buttons-botom-center">
          <div class="subitem-buttons-botom">
            <a class="logo color-blanco" href="{{ url('/') }}"><img src="{{asset('img/Logopng_sintexto2.png')}}" alt=""></a>
            <div class="conteiner-barrita-menu">
              <div class="conteiner-sub-barrita-menu">
                <span class=" barrita-menu barrita-menu-superior"></span>
                <span class=" barrita-menu barrita-menu-inferior"></span>
              </div>
            </div>
            
          </div>
        </div>

        <div class="item-buttons-botom item-buttons-botom-right">
          @can('navigate.reservas.index')
            <div class="subitem-buttons-botom">Reservas</div>
          @endcan
          <div class="subitem-buttons-botom">
            <a class="menu-link color-blanco" href="{{ route('navigate.contact-us') }}">Contactanos</a>          
          </div>
        </div>

</div>

<script src="{{asset('js/layout/menu-personalizado.js')}}"></script>