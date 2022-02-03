<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\customer;

class CustomerController extends Controller
{
    public function addCustomer(Request $request){

        customer::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'address'=>$request->address,
        ]);

        return redirect()->route('dashbord');
    }

    public function removeCustomer(Request $request){

        customer::where('id',$request->id)->delete();
        return 'success';
    }

    public function updateCustomer(Request $request){

        customer::where('id',$request->cus_id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'address'=>$request->address,
        ]);

        return redirect()->route('dashbord');
    }


}
