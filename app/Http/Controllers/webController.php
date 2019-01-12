<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;

class webController extends Controller
{
    public function index(){
         $products = product::all();
        return view('Web.product_body', compact('products'));
        
    }
}
