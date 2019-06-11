<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InputController extends Controller
{
    public function requestInput(Request $request){
        //dd($request);

        //$input = $request->all();

        $email = $request->input('email');
        $pass = $request->input('password');

        return view('/displayInfo', 
        [
            'email' => $email,
            'pass' => $pass
        ]);
    }

}
