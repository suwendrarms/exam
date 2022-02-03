<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use Illuminate\Support\Facades\DB;

class FilterController extends Controller
{
    public function printerType(Request $request){

        if($request->val=='All'){
            $content = DB::table('products as p')
            ->where('p.product', 'like', '%')
            ->get();
        }else{
            $content = DB::table('products as p')
            ->where('p.product', 'like', '%' . $request->val . '%')
            ->get();
        }

        

        return response()->json($content);

    }

    public function lowestPrice(Request $request){

        if($request->val=='All'){
            $content = DB::table('products as p')
            ->where('p.product', 'like', '%')
            ->orderby('price','asc')
            ->get();
        }else{
            $content = DB::table('products as p')
            ->where('p.product', 'like', '%' . $request->val . '%')
            ->orderby('price','asc')
            ->get();
        }

        

        return response()->json($content);

    }

    public function highestPrice(Request $request){

        if($request->val=='All'){
            $content = DB::table('products as p')
            ->where('p.product', 'like', '%')
            ->orderby('price','desc')
            ->get();
        }else{
            $content = DB::table('products as p')
            ->where('p.product', 'like', '%' . $request->val . '%')
            ->orderby('price','desc')
            ->get();
        }

        

        return response()->json($content);

    }
}
