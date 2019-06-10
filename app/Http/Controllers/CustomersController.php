<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function list()
    {
        $customerList = [
            'Khang Mai',
            'Batman',
            'King Kong',
        ];
    
        //create a new varialbe type string 
        $department = 'Sales';
    
        return view('internal_customer/customer',[
            //pass the values of customerList array and department  to new list variable so that it can be seen and used in view customer
            'list' => $customerList,
            'dep' => $department
        ]);
    } //end function list
    
} //end class CustomersController
