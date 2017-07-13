@extends('layouts.master')

@section('content')

 <div ng-app="Tienda" ng-controller="Tiendita" class="container">

      <div class=" text-xs-center">
        <h1>Tu carrito de compras  <span class="glyphicon glyphicon-shopping-cart text-danger"></span></h1>
      </div>
@if (count($in_shoping_cart)) 
<table class="table table-bordered hidden-sm-down">
  <tr class="bg-primary">
    
    <td>Producto</td>
    <td ng-click="holi()">Descripcion</td>
    <td width="100px">Cantidad</td>
    <td width="190px">Precio unitario</td>
    <td width="190px">subtotal</td>
    <td width="50px">Operación</td>
    
  </tr>


  <tr data-id="@{{item.id}}" data-cant="@{{item.cant}}" ng-repeat="item in inShoppingCart"   >
 

    <td class="text-center"><i style="font-size: 25px" class="fa fa-mobile" aria-hidden="true"></i> </td>
    <td >@{{item.title}}</td>
    <td >
           <form action="{{ url('/in_shopping_carts/:id_shoping_cart') }}" class ="form-actualizar" method="put">
         <input type="hidden" name="_method" value="put">
          {{ csrf_field() }} 
     
          <input  ng-change="CalcularSubTotal()" size="2" name="cant" class="cantidad"  ng-model='item.cant' >
         </form>
    </td>
    <td>@{{item.precio}}</td>
    <td>@{{item.subTotal}}<input type="hidden"  value=@{{item.subTotal}} name="subtotal"></td>
    <td class="text-center"><button class="delete  btn btn-danger btn-xs glyphicon glyphicon-remove" ></button>@{{item.estado}}</td>
     

  </tr>
 
              <tr>
              <td colspan="3"></td>
              <td>Total</td>
              <td>@{{total}}<input type="hidden" value=@{{total}} name="total"></td>
              <td></td>
            </tr>
  


</table>

 <table class="table table-bordered table-responsive hidden-sm-up">
  <tr class="bg-primary">
    
    <td>Producto</td>
    <td ng-click="holi()">Descripcion</td>
    <td width="100px">Cantidad</td>
    <td width="190px">Precio unitario</td>
    <td width="190px">subtotal</td>
    <td width="50px">Operación</td>
    
  </tr>


  <tr data-id="@{{item.id}}" data-cant="@{{item.cant}}" ng-repeat="item in inShoppingCart"   >
 

    <td class="text-center"><i style="font-size: 25px" class="fa fa-mobile" aria-hidden="true"></i> </td>
    <td >@{{item.title}}</td>
    <td >
           <form action="{{ url('/in_shopping_carts/:id_shoping_cart') }}" class ="form-actualizar" method="put">
         <input type="hidden" name="_method" value="put">
          {{ csrf_field() }} 
     
          <input  ng-change="CalcularSubTotal()" size="2" name="cant" class="cantidad"  ng-model='item.cant' >
         </form>
    </td>
    <td>@{{item.precio}}</td>
    <td>@{{item.subTotal}}<input type="hidden"  value=@{{item.subTotal}} name="subtotal"></td>
    <td class="text-center"><button class="delete  btn btn-danger btn-xs glyphicon glyphicon-remove" ></button>@{{item.estado}}</td>
     

  </tr>
 
              <tr>
              <td colspan="3"></td>
              <td>Total</td>
              <td>@{{total}}<input type="hidden" value=@{{total}} name="total"></td>
              <td></td>
            </tr>
  


</table>
 

  </br>
  <div class="text-xs-right">
        @include("shopping_carts.form")
      </div>
    
 <!-- <div class="text-right" >
      <button class="btn btn-primary" id="Actualizar_carrito">Enviar Datos</button>

   </div> -->
     @else 
     <div class="col-md-4"></div>
     <div class="col-md-4 text-center">
             <h3>Su carrito esta vacío</h3>
             <br><br><br><br>

             <a href="{{url('/catalogo')}}"><button class="btn btn-danger">Ir a comprar</button></a>
     </div>
  @endif
   <br><br>
     


  <form action="{{ url('/in_shopping_carts/:id_shoping_cart') }} " id="form-delete" method="delete">
  <input type="hidden" name="_method" value="DELETE">
  {{ csrf_field() }}
  </form>
      
          <script type="text/javascript">
        var _inShoppingCart = [
          @foreach($in_shoping_cart as $item)
            {'id':{{$item->id}}, 'title':  '{{$item->product->title}}', 'cant' : {{$item->cant}}, 'precio': {{$item->product->pricing}}, 'subTotal' : {{$item->subtotal}},'estado':'','habilitar':false },
          @endforeach
          ];

          var _total=
          {'total':'{{$total}}'}
          ;
        
    </script>

    </div>

@stop
