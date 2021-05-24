<?php
/*
|--------------------------------------------------------------------------
| API Routes <===> E-commerce Website Shose Store
|--------------------------------------------------------------------------
|E-commerce Website Shose Store
*/
Route::group(['namespace' => 'Api', 'middleware' => ['cors']], function () {
    /*
    |--------------------------------------------------------------------------
    | WEB PAGE
    |--------------------------------------------------------------------------
    */
        //Show web page
            //ProductNew
            Route::get('product-new', 'HomeController@show');
            // Sản phẩm theo nhà cung cấp
            Route::get('product-supplier/{id}', 'HomeController@getProductSupplier');
            Route::get('product-category/{id}', 'HomeController@getProductCategory');
            //Color, Size theo Product
            Route::get('product-color/{id}', 'HomeController@getProductColor');
            Route::get('product-size/{product}/{color}', 'HomeController@getProductSize');
            
        //Product - Category - Supplier == WEB PAGE
        Route::get('category', 'CategoryController@search');
        Route::get('supplier', 'SupplierController@search');
        Route::get('product', 'ProductController@search');
        
        //Login ADMIN
            Route::post('login', 'LoginController@login')->name('login');

        //Customer
            Route::post('customer', 'CustomerController@store'); //Register customer
            Route::put('customer/{id}', 'CustomerController@update');
            Route::get('customer/{id}', 'CustomerController@show');
            //Login WEB PAGE
            Route::post('login-customer', 'CustomerController@login');

        //Payment WEB PAGE
        //Route::group(['middleware' => ['customer']], function () {
            //Cart
            Route::post('add-cart/{customer}', 'CartController@add');
            Route::get('view-cart/{customer}', 'CartController@view');
            Route::get('remove/{id}', 'CartController@remove');
            Route::get('clear/{customer}', 'CartController@clear');
            Route::put('update-cart/{id}', 'CartController@update');

            //get total cart theo customer
            Route::get('total-cart/{customer}', 'CartController@total');
            
            //Payment (store bill)
            Route::post('bill/{customer}', 'BillController@store');
        //});

        //Logout
        Route::get('logout', 'LoginController@logout');

    /*
    |--------------------------------------------------------------------------
    | ADMIN PAGE
    |--------------------------------------------------------------------------
    */
   // Route::group(['middleware' => ['auth']], function () {
     //   Route::group(['middleware' => ['role']], function () {
            /*
            |--------------------------------------------------------------------------
            | ADMIN - (role == 1)
            |--------------------------------------------------------------------------
            */
                //Category
                Route::post('category', 'CategoryController@store');
                Route::get('category/{id}', 'CategoryController@show');
                Route::put('category/{id}', 'CategoryController@update');

                //Supplier
                Route::post('supplier', 'SupplierController@store');
                Route::get('supplier/{id}', 'SupplierController@show');
                Route::put('supplier/{id}', 'SupplierController@update');

                //Product
                Route::get('product/{id}', 'ProductController@show');
                Route::post('product', 'ProductController@store');
                Route::put('product/{id}', 'ProductController@update');
                Route::delete('product/{id}', 'ProductController@destroy');

                //altribute
                Route::get('altribute', 'ProductController@searchPSC');
                Route::post('altribute', 'ProductController@storePSC');
                Route::put('altribute/{id}', 'ProductController@updatePSC');

                //User
                Route::get('user', 'UserController@search');
                Route::post('user', 'UserController@store');
                Route::get('user/{id}', 'UserController@show');
                Route::put('user/{id}', 'UserController@update');
                Route::delete('user/{id}', 'UserController@destroy');

                //Size Color
                Route::get('size', 'Productcontroller@getsize');
                Route::get('color', 'Productcontroller@getcolor');

                //Token
                Route::post('refresh', 'LoginController@refreshToken');
                Route::delete('delete-token', 'LoginController@deleteToken');
     //  });
        /*
            |--------------------------------------------------------------------------
            | ADMIN - USER (role == 1 || role ==2)
            |--------------------------------------------------------------------------
        */
                //User
                Route::get('userprofile/{id}', 'UserController@showProfile');
                Route::post('userprofile/{id}', 'UserController@updateProfile');

                //Bill & BillDetail
                Route::get('bill', 'BillController@search');
                Route::get('bill/{id}', 'BillController@show');
                Route::put('bill/{id}', 'BillController@update');
                Route::delete('bill/{id}', 'BillController@destroy');
                Route::get('statistical', 'BillController@statistical');

                //Customer
                Route::get('customer', 'CustomerController@search');

                // //Logout
                // Route::get('logout', 'LoginController@logout')->name('user.logout');
   //});
});