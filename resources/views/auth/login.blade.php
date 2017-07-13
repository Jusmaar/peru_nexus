@extends('layouts.master')

@section('content')


    <!--Login-->
    <div id="login-container">
      <div class="container">
        <div class="row">
         
          <div class="col-xs-12">
            <div class="cajalogin">

               <form class="form-group text-xs-center" role="form" method="POST" action="{{ url('/login') }}">
               {{ csrf_field() }}
                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                  <label  for="email" class="datosUsuario">E-mail</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Ingrese usuario" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif

                </div>
                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }} ">
                  <label for="password" class="datosUsuario">Password</label>
                  <input type="password" class="form-control" id="password" placeholder="Ingrese contraseña" name="password" required>
                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif

                </div>
                <div class="form-check recordar">
                  <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="remenber"> Recordarme
                  </label>
                </div>


                <button type="submit" class="btn btn-lg"><strong>Iniciar Sesion</button></strong>
                <br><br>
                <!-- INOPERATIVO .... 
                <a  type="submit" class="btn btn-lg" href="{{ url('/password/reset') }}">
                <strong>¿Olvidaste tu contraseña?</strong></a></button>
                
<br><br>-->


                <a  type="submit" class="btn btn-lg" href="{{ url('/register') }}">
                <strong>Registrarme</strong></a></button>
    
                
               
          </form>

        </div>
      </div>
    </div>

  </div>
  </div>




    <!--/Login-->

@stop