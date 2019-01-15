<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\product;

class cartController extends Controller {

    public function index() {
        $carts = Cart::content();
        return view('Web.shopping-cart', compact('carts'));
    }

    public function addItem($id) {
        $carts = Cart::content();
        $pro = product::find($id);

        Cart::add(['id' => $pro->id, 'name' => $pro->product_name, 'qty' => 1, 'price' => $pro->product_price, 'options' => ['img' => $pro->product_image, 'pv' => $pro->product_pv_value]]);

        return view('Web.shopping-cart', compact('carts'));
    }

    public function removeItem($id) {
        Cart::remove($id);
        return back();
    }

    public function update(Request $request) {
        $qty = $request->newQty;
        $rowId = $request->rowID;
        Cart::update($rowId, $qty);
        echo 'cart updated successfuly';
        // return back();
    }

}
