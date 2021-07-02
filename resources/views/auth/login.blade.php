@extends('layouts.admin')

@section('contenido')

<div class="contenedor-flex-login">
    
    <div class="item-flex-login">
        <div class="titulo_login_real titulo_login_clic {{ $errors->has('email') ? ' itulo_login_error' : '' }}">Inicia tu sesión</div>

    <div class="panel-body panel-login {{ $errors->has('email') ? ' mostrar_panel_login' : '' }}">
        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email-login" class="col-md-4 control-label">E-Mail</label>

                <div class="col-md-6">
                    <input id="email-login" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password2" class="col-md-4 control-label">Contraseña</label>

                <div class="col-md-6">
                    <input id="password2" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recuerdame
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-8 col-md-offset-4">
                    <button type="submit" class="btn btn_ingresar_login btn-primary">
                        Ingresar
                    </button>

                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        Olvidaste tu contraseña?
                    </a>
                </div>
            </div>
        </form> 
    </div>
    </div>

    <div class="item-flex-login">
        <div class="texto-agua" >Aun no tienes una cuenta?</div>
        @include('auth.register-form')
    </div>
</div>

{{-- <!-- <fb:login-button 
  scope="public_profile,email"
  onlogin="checkLoginState();">

  lohin
</fb:login-button>

 <script src="{{ asset('js/auth/login/facebook-login.js')}}"></script> --> --}}
 <script src="{{ asset('js/auth/login/login.js')}}"></script>

@endsection
