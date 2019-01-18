<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\product;
use App\orders;
use Illuminate\Support\Facades\Auth;
use DB;

class cartController extends Controller {

    public function index() {
        $carts = Cart::content();
        return view('Web.shopping-cart', compact('carts'));
    }

    public function checkout() {

        $orders = new orders();
        $order = orders::createOrder();

        $orders->user_id = $order->id;
        $orders->total = Cart::total();
        $orders->save();
        $lastid = $orders->id;

        foreach (Cart::content() as $data) {
            $orders->orderCols()->attach($data->id, [
                'total' => $data->qty * $data->price,
                'qty' => $data->qty,
                'pv_value' => $data->options->pv,
                'image' => $data->options->img
            ]);
        }
        Cart::destroy();
        return back();
    }

    public function addItem($id) {
        $carts = Cart::content();
        $pro = product::find($id);

        Cart::add(['id' => $pro->id, 'name' => $pro->product_name, 'qty' => 1, 'price' => $pro->product_price, 'options' => ['img' => $pro->product_image, 'pv' => $pro->product_pv_value]]);


        return back();
    }

    public function removeItem($id) {
        Cart::remove($id);
        return back();
    }

    public function viewOrdersById($id) {
//        $order_products = DB::table('orders_product')
//                ->where('orders_id', $id)
//                ->get();


        $order_products = DB::table('orders_product')
                ->join('products', 'orders_product.product_id', '=', 'products.id')
                 ->join('orders', 'orders_product.orders_id', '=', 'orders.id')
                ->select('orders_product.*', 'products.product_name', 'orders.created_at', 'orders.total')
                ->where('orders_id', $id)
                ->get();


        // $orders = orders::find($id)->;
        return $order_products;
    }

    public function update(Request $request) {
        $qty = $request->newQty;
        $rowId = $request->rowID;
        Cart::update($rowId, $qty);
        echo 'cart updated successfuly';
        // return back();
    }

    public function viewOrders() {

        $user_id = Auth::user()->id;


        $orders = orders::select(\DB::raw('orders.*, SUM(orders_product.pv_value) as PV_value'))
                ->leftJoin('orders_product', 'orders_product.orders_id', '=', 'orders.id')
                ->groupBy('orders.id')
                ->where('orders.user_id', '=', $user_id)
                ->get();


// $orders = DB::table("orders")
//                 ->join('orders_product', 'orders.id', '=', 'orders_product.orders_id')
//                 ->select('orders_product.orders_id',DB::raw('SUM(orders_product.total) as PV_val'))
//                 ->groupBy('orders_id')
//                 ->where('orders.user_id', '=', $user_id)
//                 ->get();
// $users = DB::table('orders')
//         ->joinSub($orders, 'orders_product', function ($join) {
//             $join->on('orders.id', '=', 'orders_product.orders_id');
//         })->get();
// // $orderss = DB::table("orders")
// //                 ->select('*')
// //                 ->where('orders.user_id', '=', $user_id)
// $orders = DB::table('orders')
//                 ->join('orders_product', 'orders.id', '=', 'orders_product.orders_id')
//             ->select('orders.*', 'orders_product.product_id')
//             ->groupBy('orders.id')
        // return $orders;
        return view('Admin.viewOrders', compact('orders'));
    }

}
