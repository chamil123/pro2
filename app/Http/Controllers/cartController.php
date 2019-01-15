<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\product;

class cartController extends Controller
{
    public function index(){
        $carts= Cart::content();
        return view('Web.shopping-cart', compact('carts'));
      
    }
    public function addItem($id){
        $pro= product::find($id);
        
        Cart::add(['id' => $pro->id, 'name' => $pro->product_name, 'qty' => 1, 'price' => $pro->product_price,'options'=>['img'=> $pro->product_image]]);
       // return view('cart');
        
    }
    public function removeItem($id){
        Cart::remove($id);
        
    }
}