<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{url('CelularesPeru/css/bootstrap-flex.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('/CelularesPeru/css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('/CelularesPeru/fontawesome/css/font-awesome.css ')}}">


    <!-- Nuevas fuentes -->
    <link rel="stylesheet" href="css/fontsnew/style.css">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>




    <!--  nuevas librerias-->


 






  </head>
  <body>
    <header id="header-container">
      <div class="container">
        <div class="row  flex-items-xs-between flex-items-xs-middle">

            <div class="col-xs-3">
              <img src="CelularesPeru/imagenes/logo.png" height="55px" alt="calidad">
            </div>

             <div class="col-xs-3 text-xs-right">



              <!-- registrar **andre-->
                
                            <a class="login hidden-xs-down text-uppercase font-weigth-bold" href="{{ url('/register') }}">
                               <span class=" icon-input-checked-outline">Registrar</a></span>





              <!-- Entrar -->
              <button class="navbar-toggler  hidden-sm-up" data-toggle="collapse" data-target="#navMenu">&#9776;</button>
              
                @if (Auth::guest())
                    
                            <a class="login hidden-xs-down text-uppercase font-weigth-bold" href="{{ url('/login') }}">
                               <span class="icon-power">Entrar</a></span>
                            
                @else
                    
                                <a href="#" class="login text-uppercase font-weigth-bold">
                                    {{ Auth::user()->name }} 
                                </a>

                        
                                 <a class="login hidden-xs-down text-uppercase font-weigth-bold" href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">&#62;
                                            Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                </form>
                                    
                            
                @endif



            </div> 
        </div>

      </div>  
    </header>

   <!-- Menu -->
    <div id="menu-container">
      <nav id="navMenu" class="navbar-toggleable-xs navbar navbar-light collapse">
      <div class="container">
        <div class="row">
          <div class="col-xs-10 offset-xs-1 col-md-6 offset-md-0">
            <ul class="nav navbar-nav" >
              <li class="nav-item text-xs-center">
                <a href="{{url('/')}}" class="nav-link active"><span class="icon-home-outline">Home</a></span>
              </li>
              <li class="nav-item text-xs-center">
                <a href="{{url('/catalogo')}}" class="nav-link"><span class="icon-news">Catalogo</a></span>
              </li>


              <li class="nav-item text-xs-center">
                <a href="{{url('/carrito')}}" class="nav-link"><span class="icon-shopping-cart">Carrito
                <span>
                  {{$productsCount}}
                </span>
                </a>
                </span>
              </li>


              <li class="nav-item text-xs-center">
                <a href="{{url('/nosotros')}}" class="nav-link"><span class="icon-group">Nosotros</a></span>
              </li>
              <li class="nav-item text-xs-center">
                <a href="{{url('/contacto')}}" class="nav-link"><span class="icon-location">Contacto</a></span>
              </li>
              @if (Auth::guest())
              <li class="nav-item text-xs-center hidden-sm-up">
                <a href="login.html" class="nav-link">Login</a>
              </li>
              @else
              <li class="nav-item text-xs-center hidden-sm-up">
                <a class="nav-link" href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                </form>
                                    
              </li>
              @endif

            </ul>
          </div>
          <div class="col-xs-12 col-md-6  hidden-xs-down">
            <form>
              <div class="input-group">
                <input  type="text" class="form-control" placeholder="¿Qué está buscando?"></input>
                <span class="input-group-btn">
                  <button class="btn btn-celperu" type="button">
                    <span class="hidden-sm-down">Buscar</span>
                    <i class="fa fa-search hidden-md-up"></i>
                  </button>
                </span>
              </div>
            </form>
          </div>
        </div>
      </div>
      </nav>
      <div id="search-bar" class="container hidden-sm-up">
        <div class="row">
          <div class="col-xs">
            <form>
              <div class="input-group">
                <input  type="text" class="form-control" placeholder="¿Encontro lo que buscaba?"></input>
                <span class="input-group-btn">
                  <button class="btn btn-celperu" type="button">
                    <span class="hidden-sm-down">Buscar</span>
                    <i class="fa fa-search hidden-md-up"></i>
                  </button>
                </span>
              </div>
            </form>
          </div>
        </div>
      </div>

    </div>


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




    <!--Informacion-->
      <div id="info-container">
        <div id="container">
          <div class="row text-xs-center">
            <div class="col-xs-12 col-md-4">
              <img src="{{url('/CelularesPeru/imagenes/calidad.png')}}" alt="calidad" class="img-fluid">
              <h4>Calidad</h4>
            </div>
            <div class="col-xs-12 col-md-4">
              <img src="{{url('/CelularesPeru/imagenes/envio.png')}}"  alt="envio" class="img-fluid">
              <h4>Envio </h4>
            </div>
            <div class="col-xs-12 col-md-4">
              <img src="{{url('/CelularesPeru/imagenes/soporte.png')}}"  alt="soporte" class="img-fluid">
              <h4>Atencion 24h</h4>
            </div>
          </div>
        </div>
      </div>
    <!--/Informacion-->


    <!--Footer-->
    
    <footer id="footer-container">
      <div class="container">
        <div class="row text-xs-center text-md-left">





      <div class="col-md-4">
      <h3>Siguenos:</h3>
      <ul class="redes">
        <li><a href="#"><i class="fa fa-facebook-square fa-2x"></i></a></li>
        <li><a href="#"><i class="fa fa-twitter-square fa-2x"></i></a></li>
        <li><a href="#"><i class="fa fa-google-plus-square fa-2x"></i></a></li>
        <li><a href="#"><i class="fa fa-youtube-square fa-2x"></i></a></li>
      </ul>
      <h3>Escribenos: </h3>
      <i class="fa fa-at" ></i> <a href="#">celulareperu@gmail.com</a>
    </div>


    <div class="col-md-4">
      <div class="author-info">
        <br><br><br><p>Copyright © 2005-2017<br>
           CelularesPerú<br>
           Todos los derechos reservados. </p>
      </div>
    </div>



          <div class="col-md-4"  style="text-align:right">
            <ul class="foot">
              <li class="nav-item">
                 <a href="{{url('/')}}" class="nav-link active"><span class="icon-home-outline">Home</a></span>
              </li>
              <br>
              <li class="nav-item">
                <a href="{{url('/catalogo')}}" class="nav-link"><span class="icon-news">Catalogo</a></span>
              </li>
              <br>
              <li class="nav-item">
                <a href="{{url('/carrito')}}" class="nav-link"><span class="icon-shopping-cart">Carrito</a></span>
              </li>
              <br>
              <li class="nav-item">
                <a href="{{url('/contacto')}}" class="nav-link"><span class="icon-location">Contacto</a></span>
              </li>
              <br>
              <li class="nav-item">
                <a href="{{ url('/login') }}" class="nav-link" ><span class="icon-power">Entrar</a></span>
              </li>
               <br>
            </ul>
          </div>
        </div>
      </div>




    </footer>
    <!--/Footer-->



    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/js/bootstrap.min.js" integrity="VjEeINv9OSwtWFLAtmc4JCtEJXXBub00gtSnszmspDLCtC0I4z4nqz7rEFbIZLLU" crossorigin="anonymous"></script>
    <script src="{{url('/CelularesPeru/js/app.js')}}"></script>
  </body>
</html>