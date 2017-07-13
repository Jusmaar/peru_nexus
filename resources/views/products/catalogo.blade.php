@extends('layouts.master')

@section('content')

    
    <!--/Menu-->

    <!--Celulares-->
        <section id="celulares-container">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-md-3">
            <div class="list-group filtros-toggle">
              <a id="filtrosToggle" href="" class="list-group-item list-group-item-action navbar-toggler hidden-sm-up" data-target="#filtros-container" data-toggle="collapse">
                <h5 class="list-group-item-heading">Filtros
                <i class="fa fa-chevron-down"></i>
                </h5>
              </a>
            </div>
            <div id="filtros-container" class="collapse navbar-toggleable-xs">
              <div class="list-group">
                <a href="" class="list-group-item list-group-item-action active">
                  <h5 class="list-group-item-heading">Gama</h5>
                </a>
                <a href="" class="list-group-item list-group-item-action">
                  Alta <span class="tag tag-pill tag-default pull-xs-right">100</span>
                </a>
                 <a href="" class="list-group-item list-group-item-action">
                  Media <span class="tag tag-pill tag-default pull-xs-right">50</span>
                </a>
                 <a href="" class="list-group-item list-group-item-action">
                  Baja <span class="tag tag-pill tag-default pull-xs-right">69</span>
                </a>
              </div>
              <div class="list-group">
                <a href="" class="list-group-item list-group-item-action active">
                  <h5 class="list-group-item-heading">Conectividad</h5>
                </a>
                <a href="" class="list-group-item list-group-item-action">
                  4G <span class="tag tag-pill tag-default pull-xs-right">70</span>
                </a>
                 <a href="" class="list-group-item list-group-item-action">
                  3G <span class="tag tag-pill tag-default pull-xs-right">50</span>
                </a>
              </div>
              <div class="list-group">
                <a href="" class="list-group-item list-group-item-action active">
                  <h5 class="list-group-item-heading">Marca</h5>
                </a>
                <a href="" class="list-group-item list-group-item-action">
                  Samsung <span class="tag tag-pill tag-default pull-xs-right">70</span>
                </a>
                <a href="" class="list-group-item list-group-item-action">
                  iPhone <span class="tag tag-pill tag-default pull-xs-right">50</span>
                </a>
                <a href="" class="list-group-item list-group-item-action">
                  HTC <span class="tag tag-pill tag-default pull-xs-right">50</span>
                </a>
                <a href="" class="list-group-item list-group-item-action">
                  LG <span class="tag tag-pill tag-default pull-xs-right">50</span>
                </a>
                <a href="" class="list-group-item list-group-item-action">
                  Huawei <span class="tag tag-pill tag-default pull-xs-right">50</span>
                </a>
              </div>
            </div>
          </div>


          <div class="col-xs-12 col-md-9">
            <div class="row listado-celulares">

            @foreach ($products as $product)
              <div class="col-xs-12 col-sm-10">
                <div class="card">


                @if($product->extension)
                  <img src="{{url("/products/images/$product->id.$product->extension")}}" class="card-img-top img-fluid">
                @endif

                  <div class="card-block">
                  <div class="inblock">
                    <h3 class="card-title tituloprod">{{$product->title}} </h3>
                    <h2 class="precioprod"><strong>s/{{$product->pricing}}</strong></h2>
                  </div>
                    
                    <p><strong>Marca:  </strong>{{$product->marca}}</p>
                    <p><strong>Gama:  </strong>{{$product->gama}}</p>
                    <p><strong>Conectividad:  </strong>{{$product->conectividad}}</p>
                    <p><strong>Descripcion</strong></p>
                    <p>{{$product->description}}</p>
                    <br>

                    <p class="text-xs-center">
                      @include("in_shopping_carts.form",["product"=>$product])
                    </p>

                        @if(Auth::check() && $product->user_id == Auth::user()->id)
                        <div>
                          <a href="{{url('/products/'.$product->id.'/edit')}}">Editar</a>
                          @include('products.delete',['product'=>$product])
                        </div>

                        @endif

                  </div>
                </div>


              </div>

            @endforeach
            </div>

            


          </div>

        </div>
      </div>


    </section>


    <!--/Celulares-->

@stop