<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
route::get('/contact', function(){
    return view('contact');
});
*/

//first parameter is the URL, the second parameter is the name of the view
//this is good to call a single view without passing multiple data
route::view('contact-us','contact'); 

route::get('customer', function(){

    //create a customerList array variable
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
});

