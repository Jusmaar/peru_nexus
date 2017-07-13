<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InShoppingCart extends Model
{
    protected $fillable = ["product_id", "shopping_cart_id","cant","subtotal"];  
    //protected $fillable = ["shopping_cart_id","cant","subtotal"]; 

    public function product(){
		return $this->belongsTo("App\Product");
	}
}
