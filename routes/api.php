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
            // Sản phẩm theo nhà cung cấp
            Route::get('product-supplier/{id}', 'HomeController@getProductSupplier')->name('product.supplier');
            Route::get('product-category/{id}', 'HomeController@getProductCategory')->name('product.category');
            //Color, Size theo Product
            Route::get('product-color/{id}', 'HomeController@getProductColor')->name('product.color');
            Route::get('product-size/{product}/{color}', 'HomeController@getProductSize')->name('product.size');
        
        //Cart
            Route::post('add-cart', 'CartController@add')->name('cart.add');
            Route::get('update-cart/{id}', 'CartController@update')->name('cart.update');
            Route::get('remove/{id}', 'CartController@remove')->name('cart.remove');
            Route::get('clear', 'CartController@clear')->name('cart.clear');
            Route::get('view-cart', 'CartController@view')->name('cart.view');

        //Payment (store bill)
            Route::post('bill', 'BillController@store')->name('bill.store');
     
        //login
            Route::post('login', 'LoginController@login')->name('login');

        //Product - Category - Supplier == WEB PAGE
            Route::get('category', 'CategoryController@search');
            Route::get('supplier', 'SupplierController@search');
            Route::get('product', 'ProductController@search');

    /*
    |--------------------------------------------------------------------------
    | ADMIN PAGE
    |--------------------------------------------------------------------------
    */
    Route::group(['middleware' => ['auth']], function () {
        Route::group(['middleware' => ['role']], function () {
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
        });
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
                Route::get('bill/{id}', 'BillController@show')->name('bill.show');
                Route::put('bill/{id}', 'BillController@update')->name('bill.update');
                Route::delete('bill/{id}', 'BillController@destroy')->name('bill.destroy');
                Route::get('statistical', 'BillController@statistical')->name('bill.statistical');

                //Logout
                Route::get('logout', 'LoginController@logout')->name('user.logout');
    });
});