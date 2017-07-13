<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests; 
use App\ShoppingCart;
use App\InShoppingCart;
use App\Product;

class InShoppingCartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function __construct(){
        $this->middleware("shoppingcart");
    }
    
    public function store(Request $request)
    {
        $shopping_cart = $request->shopping_cart;

        $response = InShoppingCart::create(["shopping_cart_id" => $shopping_cart->id,"product_id" => $request->product_id ,"cant"=>1,"subtotal"=>$request->product_pricing]);

      
        if ($response) {
            return redirect('/carrito');
        }

        else
            return back();
    }

    public function edit($id){

        



    }

        public function update(Request $request, $id)
    
    {
            
            $carrito=InShoppingCart::find($id);
            $id_product=$carrito->product_id;
            $producto=Product::find($id_product);
            $precio=$producto->pricing;
            $carrito->cant=$request->cant;
            $carrito->subtotal=($request->cant)*$precio;
            $carrito->save();
            return("exito");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
       $item = InShoppingCart::find($id);
       $item->delete();

       return redirect ('carrito');

    }
}
