<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public function processData(Request $request){
        //dd($request);
        $name = $request->query('customerName');
        $weight = $request->query('weight');
        $options = $request->query('options');

        

        return view('/shippingPrice', [
            'name' => $name,
            'weight' => $weight,
            'options' => $options
        ]);
    } // end processData
}
