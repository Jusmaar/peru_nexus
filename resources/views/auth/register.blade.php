@extends('layouts.master')

@section('content')

    <!--Registro-->
    <div id="registro-container">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col">
                <div class="cajalogin">

               <form class="form-group text-xs-center" role="form" method="POST" action="{{ url('/register') }}">
               {{ csrf_field() }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                  <label  for="name" class="datosUsuario">Nombre</label>
                  <input type="text" class="form-control" id="name" placeholder="Ingrese su nombre" name="name" value="{{ old('name') }}" required autofocus>
                    @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                     @endif

                </div>
                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                  <label  for="email" class="datosUsuario">E-Mail</label>
                  <input type="text" class="form-control" id="email" placeholder="Ingrese su e-mail" name="email" value="{{ old('email') }}" required>
                     @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif

                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} ">
                  <label for="passwword" class="datosUsuario">Password</label>
                  <input type="password" class="form-control" id="password" placeholder="Ingrese contraseña" name="password" required>
                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group ">
                  <label for="passwword-confirm" class="datosUsuario">Confirmar Password</label>
                  <input type="password" class="form-control" id="password-confirm" placeholder="Ingrese contraseña" name="password_confirmation" required>
                     @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                     @endif
                </div>
                
                <button type="submit" class="btn btn-lg">Registrar</button>
                
      

               
                
               
          </form>

        </div>

          </div>
        </div>
      </div>
    </div>

    <!--Registro-->
 

@stop