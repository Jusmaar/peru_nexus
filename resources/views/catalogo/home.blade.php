@extends('layouts.master')

@section('content')
<div class="container">
  <div class="row" ng-app="Tienda" ng-controller="CatalogoController">
<div class="col-md-3">
  
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
 <div class="col-md-8 ">     
 <style >
   .producto_marco:hover{
    background-color: rgba(0,0,0,0.1);
   }
   #filtros-container{
    padding: 10px;
   }
 </style>   

          @foreach ($products as $product)
              
<div class="panel panel-default col-md-4 producto_marco ">
       <div  class="panel-body text-center  ">         
          
                @if($product->extension)
                  <img  src="{{url("/products/images/$product->id.$product->extension")}}" class="img-responsive">
                @endif
                        
                    <h3 class="text-warning" ">{{$product->title}} </h3>
                    <h2 class="text-danger"><strong>s/{{$product->pricing}}</strong></h2>      
                    <p>{{$product->marca}}</p>
                    <p>{{$product->gama}}</p>
                    <p>{{$product->conectividad}}</p>                 
                    <a href=""><span ng-click="VerDetalles('{{$product->description}}','{{$product->pricing}}','{{$product->id}}','{{$product->title}}')">Ver detalles</span></a>
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
     @endforeach
<style >
.modal-dialog2{width: 70%;
                margin: auto;}

.zoom{
          transition: width 2s, height 2s, transform 2s;
        -moz-transition: width 2s, height 2s, -moz-transform 2s;
        -webkit-transition: width 2s, height 2s, -webkit-transform 2s;
        -o-transition: width 2s, height 2s,-o-transform 2s;
}
.zoom:hover{
   transform : scale(1);
        -moz-transform : scale(1);      /* Firefox */
        -webkit-transform : scale(1.1);   /* Chrome - Safari */
        -o-transform : scale(1);        /* Opera */
 
}
.texto_boton{
    font-family: 'Open Sans', sans-serif;
}
</style>
@foreach ($products as $product)
<div id="Detalles" class="modal fade" role="dialog">
  <div  class="modal-dialog2 ">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Detalles del producto</h4>
      </div>
      <div class="modal-body row">

              <div class="col-md-4">
               <img  src="{{url("/products/images/$product->id.$product->extension")}}" class="zoom img-responsive"> 
              </div>
              <div style="border:0px solid #BDBDBD" class="col-md-6 text-justify texto_boton">
        <h3 class="text-danger">@{{Titulo}}</h3>
        <p>@{{Descripcion}}</p>
        </div>
              <div class="col-md-2 ">
                <h2 class="text-danger">S/.@{{Precio}}</h2><br><br>
                 <form action="{{ url('/AgregarCarrito') }} " id="form-agregar" method="post">
                  <input type="hidden" name="_method" value="post">
                  <input type="hidden" name="product_id" value="@{{idProducto}}">
                   <input type="hidden" name="product_pricing" value="@{{Precio}}">
                 {{ csrf_field() }}
  
                <button type="submit"  class="btn btn-primary btn-md glyphicon glyphicon-shopping-cart"><span class="texto_boton"><br>  Agregar al <br> carrito</span></button>
                </form>
              </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
       
    </div>

  </div>
</div>
</div>
@endforeach
       
           

          </div>

          <!-- Modal -->



</div>


@stop