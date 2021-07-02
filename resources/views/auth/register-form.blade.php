<div class="titulo_login_real titulo_register_clic {{ $errors->has('email-register') ? ' itulo_login_error' : '' }}">Unete a nosotros!</div>

<div class="panel-body panel-register">
    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('name-register') ? ' has-error' : '' }}">
            <label for="name" class="col-md-4 control-label">Nombre</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name-register" value="{{ old('name-register') }}" required autofocus>

                @if ($errors->has('name-register'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name-register') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('email-register') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email-register" value="{{ old('email-register') }}" required>

                @if ($errors->has('email-register'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email-register') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password-register') ? ' has-error' : '' }}">
            <label for="password" class="col-md-4 control-label">Password</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password-register" required>

                @if ($errors->has('password-register'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password-register') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password-register_confirmation" required>
            </div>
        </div>

        <div class="form-group">
            <div class="registrar_btn">
                <button type="submit" class="btn btn-primary">
                    Registrar
                </button>
            </div>
        </div>
    </form>
</div>