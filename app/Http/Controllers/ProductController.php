<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;

class ProductController extends Controller
{
    public function index(){

        $products=product::get();
        return view('pages.product.index',compact('products'));
    }
}
