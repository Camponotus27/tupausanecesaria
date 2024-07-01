<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>StopTime</title>
    
    <!-- fuente -->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway:600,100,400,500,700,800,200,300"/>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Fuente -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Shrikhand&display=swap" rel="stylesheet">
  
    <!-- icono -->
    <link rel="shortcut icon" href="{{asset('img/Logoico.png')}}">

    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

    <!-- x-editable -->

    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

    <!-- DatePicker -->
    <link rel="stylesheet" href="{{asset('css/datapicker/bootstrap-datetimepicker.css')}}">



    <!-- end x-editable -->

    <!--bootstrap-glyphicons-->

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">

    <!--bootstrap-glyphicons-->

    <link rel="stylesheet" href="{{asset('css/principal.css?v=2.0')}}">

    <!-- Jcrop -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/cropit/cropit.css')}}">
    <!-- end Jcrop -->

    <!-- Font  -->

    <link rel="stylesheet" href="{{asset('fonts/font.css?100')}}" type="text/css" charset="utf-8" />
    
  
   <!-- Fin Font -->

    <link rel="stylesheet" href="{{asset('css/flexboxgrid.css')}}">

    <!-- slider

    <link rel="stylesheet" href="{{asset('css/slider1/slider/responsiveslides.css')}}">
    <link rel="stylesheet" href="{{asset('css/slider1/slider/demo/demo.css')}}">
    <script src="{{asset('css/slider1/slider/responsiveslides.min.js')}}"></script>
    <script src="{{asset('css/slider1/slider/responsiveslides.js')}}"></script>}

     fin slider -->

   <!-- onesignal 
     <link rel="manifest" href="/manifest.json" />
      <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
      <script>
        var OneSignal = window.OneSignal || [];
        OneSignal.push(function() {
          OneSignal.init({
            appId: "19d0c731-9fa8-468b-be14-b1f633be682d",
          });
        });
      </script>
      </script> -->

 


    <!-- Google Analytics 
    <script type="text/javascript">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-22254185-1']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
    </script>-->

  </head>
      <body>
        <!-- nav bar http://librosweb.es/libro/bootstrap_3/capitulo_6/barras_de_navegacion.html -->

        <nav style="display: none;" class="navbar navbar-default navbar-fixed-top"  role="navigation">
        <!-- El logotipo y el icono que despliega el menú se agrupan
             para mostrarlos mejor en los dispositivos móviles -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse"
                  data-target=".navbar-ex1-collapse">
            <span class="sr-only">Desplegar navegación</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" id="logo" href="{{ url('/') }}"><img src="{{asset('img/Logopng_sintexto.png')}}" alt=""></a>
        </div>
       
        <!-- Agrupar los enlaces de navegación, los formularios y cualquier
             otro elemento que se pueda ocultar al minimizar la barra -->
        <div class="nav_movile collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav">
            
              <li class="nav-item">
                <a class="nav-link" href="{{ route('menu.index') }}">Menu</a>
              </li>

            


            {{-- <!-- Forma antigua de llamar las rutas
            @can('warehouse/product.index')
            <li class="nav-item">{!! link_to('/warehouse/product', 'Articulo', ['class' => 
            'nav-link']) !!}</li>
            @endcan

            @can('warehouse.category.index')
            <li class="nav-item">{!! link_to('/warehouse/category', 'Category', ['class' => 'nav-link']) !!}</li>
            @endcan-->--}}

            @can('opciones.index')
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  Opciones <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
              
                  @can('warehouse.product.index')
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('products.index') }}">Articulos</a>
                    </li>
                  @endcan

                  <li class="divider"></li>
                  
                  @can('roles.index')
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('roles.index') }}">Roles</a>
                    </li>
                  @endcan

                  @can('users.index')
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('users.index') }}">User</a>
                    </li>
                  @endcan
                </ul>
              </li>
            @endcan

          </ul>
       
          <!-- <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Buscar">
            </div>
            <button type="submit" class="btn btn-default">Enviar</button>
          </form> -->
       
          <ul class="nav navbar-nav navbar-right">

            <li>  
                  <li>
                    <a href="{{url('/carrito')}}">Mi carrito : {{$shoppingCount ?? ''}}</a>
                  </li>
                    
                        {{-- <!-- https://laraveles.com/obtener-usuario-autenticado-facade-auth/ --> --}}
                        @guest
                            <li><a href="{{ route('login') }}">Ingresar</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Salir
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest

            </li>
           
          </ul>
        </div>
      </nav>


      <!-- fin navbar -->
      <!-- menu personalizado -->
      <!--  @if(Request::url() === Request::root())
          <div class="">
                  @can('navigate.unete')
                    @include('layouts.unete')
                  @endcan
                  
                  @include('layouts.menu-personalizado')  

          </div> 
        @else
          <div class="seccion-menu">
                  @include('layouts.menu-personalizado')               
          </div>
        @endif
                
              
       @include('layouts.menu-herramientas') -->

    
        @include('layouts.shopping-cart')  

        <div class="{{(Request::url() === Request::root())? '' :'seccion' }}">
                @yield('contenido')                
        </div> 
   
          <!--Fin-Contenido-->

          <!--
          <footer>
            <div class="footer-personalizado">
              <div class="mt-txl"></div>
              @include('layouts.avisos')
              <div class="footer-personalizado-item txl">
                <h3>Siguenos!</h3>
                <div class="redes-sociale">
                  <div class="redes-sociale-item">
                      <a href="https://www.facebook.com/stoptime.cl" target="_blank">
                          <img src="{{asset('img/Iconos/facebook.png')}}" alt="">
                      </a>
                  </div>
                  <div class="redes-sociale-item">
                      <a href="https://instagram.com/stoptime.cl" target="_blank">
                        <img src="{{asset('img/Iconos/instagram.png')}}" alt="">
                      </a>
                  </div>
                </div>
              </div>
              
              <div class="footer-personalizado-item txl">
                Tu pausa necesaria
              </div>
            </div>
            <div class="footer-personalizado-dos tl">
                <a style="text-decoration: none; color: #dbcb6b;" href="{{ url('/login') }}">StopTime</a> distribuidora anonima
            </div>
          </footer>
            -->
        <script src="{{ mix('js/app.js') }}"></script>

        <!-- jquery 2.1.4 al cambiarlo muere el jcrop -->
        <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="{{asset('js/bootstrap.js')}}"></script>
        <!-- end Bootstrap 3.3.5  -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('js/principal.js')}}"></script>

        <!-- shopping cart -->
        <script src="{{asset('js/shopping-cart/shopping-cart.js')}}"></script>
        <script src="{{asset('js/modal-menu/modal-menu.js')}}"></script>
        <!-- end shopping cart -->

        <!-- orderDay -->
        <script src="{{asset('js/order/orderDay.js')}}"></script>
        <!-- end orderDay -->

        <!-- cropit -->
       
        <script src="{{asset('js/cropit/jquery.cropit.js')}}"></script>
        <!-- endcropit -->
        <!-- datapicker -->
        <script src="{{asset('js/datapicker/bootstrap-datetimepicker.js')}}"></script>

 
      </body>
</html>