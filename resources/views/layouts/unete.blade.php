<div class="conteiner-buttons-unete">
  @guest
  <div class="conteiner-buttons-unete-principal conteiner-buttons-elevar">
      <a href="{{ route('login') }}" class="menu-link" >Únete!!</a>
  </div>
  @else
  <div class="conteiner-buttons-unete-principal conteiner-buttons-elevar">
      <a href="#" class="menu-link">
          {{ Auth::user()->name }}
      </a>
  </div>

      <ul class="boton-giratorio-desplegable conteiner-buttons-elevar">
              <a href="{{ route('logout') }}" class="menu-link" 
                  onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                  X
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
      </ul>
  @endguest
</div> 