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
    
    <link rel="stylesheet" type="text/css" href="{{url('/CelularesPeru/fontawesome/css/font-awesome.css ')}}">


    <!-- Nuevas fuentes -->
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">

    <link rel="stylesheet" href="css/fontsnew/style.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{url('/CelularesPeru/css/app.css')}}">



    <!--  nuevas librerias-->


 






  </head>
  <body>
    <header id="header-container">
      <div class="container">
        <div class="row   flex-items-xs-middle">

            <div class="col-xs-3">
            <a href="{{url('/')}}"><img src="CelularesPeru/imagenes/logo.png" height="55px" alt="calidad"></a>
              
            </div>

             <div class="offset-xs-6 col-xs-3 text-xs-right">



              <!-- registrar **andre-->
                            @if (Auth::guest())
                            <a class="login hidden-xs-down text-uppercase font-weigth-bold" href="{{ url('/register') }}">
                               <span class=" icon-input-checked-outline">Registrar</a></span>
                            @endif




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
                                            Salir
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

    
    <!--/Menu-->

    		@yield('content')


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
        <div class="row text-xs-center">

      <div class="col-md-4">
      <h3>Siguenos:</h3>
      <ul class="redes">
        <li style="padding-left: 5px;"><a href="#"><i style="color: white;" class="fa fa-facebook-square fa-2x"></i></a></li>
        <li style="padding-left: 5px;"><a href="#"><i style="color: white;" class="fa fa-twitter-square fa-2x"></i></a></li>
        <li style="padding-left: 5px;"><a href="#"><i style="color: white;" class="fa fa-google-plus-square fa-2x"></i></a></li>
        <li style="padding-left: 5px;"><a href="#"><i style="color: white;" class="fa fa-youtube-square fa-2x"></i></a></li>
      </ul>
      <h3>Escribenos: </h3>
      <i class="fa fa-at" ></i> <a href="#">peruvianexus@gmail.com</a>
    </div>


    <div class="col-md-4">
      <div class="author-info">
        <br><br><br><p>Copyright © 2005-2017<br>
           PeruvianNexus<br>
           Todos los derechos reservados. </p>
      </div>
    </div>

          <div class="col-md-4 text-xs-left">
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCXwj0xZGAU1X7Q2usZb0g8mggpuPIYU5A"></script>
    <script src="{{url('/CelularesPeru/dist/maps.js')}}"></script>

  </body>
</html>