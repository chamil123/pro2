<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\product;
use App\orders;
use Illuminate\Support\Facades\Auth;
use DB;
use App\dummey_pv;
use App\temp_dummey_pv;
use Illuminate\Support\Arr;

class cartController extends Controller {

    public function index() {
        $dummeys = DB::table('dummeys')
                ->select('dummeys.dummey_name', 'dummeys.id')
                ->where('user_id', Auth::user()->id)
                ->get();
        $carts = Cart::content();
        return view('Web.shopping-cart', compact('carts', 'dummeys'));
    }

    public function checkout(Request $request) {

        $orders = new orders();
        $order = orders::createOrder();

        $orders->user_id = $order->id;
//        $orders->total = Cart::total();
        $orders->save();
        $lastid = $orders->id;

        $i = 0;
        foreach (Cart::content() as $data) {

            $orders->orderCols()->attach($data->id, [
                'total' => $data->qty * $data->price,
                'qty' => $data->qty,
                'pv_value' => $data->options->pv,
                'image' => $data->options->img,
                'test' => $data->options->arryas[0]->product_name
                    ]
            );
            $orders_product_id = DB::table('orders_product')->orderBy('id', 'DESC')->take(1)->select('orders_product.id')->get();

            $order_productss = DB::table('temp_dummey_pvs')
                    ->select('temp_dummey_pvs.dummey_id', 'temp_dummey_pvs.product_id', 'temp_dummey_pvs.pv_value')
                    ->where('product_id', $data->id)
                    ->get();
            $val = 0;
            foreach ($order_productss as $order_product) {
                $dummey_pv = new dummey_pv();
                $dummey_pv->orders_product_id = $orders_product_id[0]->id;
                $dummey_pv->dummey_id = $order_product->dummey_id;
                $dummey_pv->pv = $order_product->pv_value;
                $dummey_pv->save();
                $val++;
            }
            if ($val > 0) {
                
            } else {
                $dummey_pv = new dummey_pv();
                $dummey_pv->orders_product_id = $orders_product_id[0]->id;
                $dummey_pv->dummey_id = $request->dummey_id;
                $dummey_pv->pv = $data->options->pv;
                $dummey_pv->save();
            }
            

            $val = 0;
        }
        temp_dummey_pv::query()->truncate();
        Cart::destroy();
        return back();
    }

    public function orderCols() {


        $array = ['chamil' => '2500', 'products' => ['price' => 100, 'dddd' => 100, 'ffff' => 100]];
//$array = array_prepend($array, 'products[]price',500);
        //  $price = array_get($array, 'products.price');
        return $array;
    }

    public function addItem($id) {
        $carts = Cart::content();
        $pro = product::find($id);

        //Cart::add(['id' => $pro->id, 'name' => $pro->product_name, 'qty' => 1, 'price' => $pro->product_price, 'options' => ['img' => $pro->product_image, 'pv' => $pro->product_pv_value]]);
        Cart::add(['id' => $pro->id, 'name' => $pro->product_name, 'qty' => 1, 'price' => $pro->product_price, 'options' => ['img' => $pro->product_image, 'pv' => $pro->product_pv_value, 'arryas' => product::all()]]);

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
                ->select('orders_product.*', 'products.product_name', 'orders.created_at')
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

    public function storeDummeyPv(Request $request) {
        $temp_dummey_pv = new temp_dummey_pv();
        $temp_dummey_pv->dummey_id = $request->dummey_id;
        $temp_dummey_pv->product_id = $request->product_id;
        $temp_dummey_pv->pv_value = $request->pv_value;

        print_r($temp_dummey_pv);
        $temp_dummey_pv->save();
    }

    public function viewDummeyPv($id) {
        $temp_dummey_pv = DB::table('temp_dummey_pvs')
                ->select('temp_dummey_pvs.dummey_id', 'temp_dummey_pvs.product_id', 'temp_dummey_pvs.pv_value')
                ->where('product_id', $id)
                ->get();
//        $temp_dummey_pv = temp_dummey_pv::all($id);
        return $temp_dummey_pv;
    }

    public function delete_pv($id) {
        $temp_dummey_pv = temp_dummey_pv::find($id);
        $temp_dummey_pv->delete();
        return "ss";
    }

}
