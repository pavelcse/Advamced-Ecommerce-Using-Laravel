<?php

// For FrontEnd Client Side................................... 
Route::get('/', 'HomeController@index');

// For User................................... 
Route::get('/login', 'UserController@index');
Route::post('/user-login', 'UserController@login');
Route::post('/user-signup', 'UserController@signUp');
Route::get('/user-logout', 'UserController@logout');

// For Show Category Wise Products................................... 
Route::get('/product-by-category/{category_id}', 'HomeController@productByCategory');


// For Show Brand Wise Products................................... 
Route::get('/product-by-brand/{brand_id}', 'HomeController@productByBrand');


// For Show Specific Products................................... 
Route::get('/view-product/{product_id}', 'HomeController@productByID');







// For Add to Cart Products................................... 
Route::post('/cart', 'CartController@addToCart');
Route::get('/show-cart', 'CartController@showCart');
Route::get('/delete-cart/{rowId}', 'CartController@deleteCart');
Route::get('/qty-increase/{rowId}/{qty}', 'CartController@increaseCartQuantity');
Route::get('/qty-decrease/{rowId}/{qty}', 'CartController@decreaseCartQuantity');

// For CheckOut Products................................... 
Route::get('/checkout', 'CheckoutController@index');
Route::post('/shipping-details', 'CheckoutController@shippingDetails');
Route::get('/payment', 'CheckoutController@payment');
Route::post('/payment-gateway', 'CheckoutController@paymentGateway');









// For BackEnd Admin Side................................... 
Route::get('/logout', 'SuperAdminController@logout');
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard', 'SuperAdminController@index');
Route::post('/admin-dashboard', 'AdminController@login');


//Category.............
Route::get('/category-add', 'CategoryController@index');
Route::post('/category-save', 'CategoryController@categorySave');
Route::get('/category-list', 'CategoryController@categoryList');
Route::get('/unpublish/{category_id}', 'CategoryController@unpublish');
Route::get('/publish/{category_id}', 'CategoryController@publish');
Route::get('/edit/{category_id}', 'CategoryController@categoryEdit');
Route::post('/category-update/{category_id}', 'CategoryController@categoryUpdate');
Route::get('/delete/{category_id}', 'CategoryController@categoryDelete');


//Brand.......................................................
Route::get('/brand-add', 'BrandController@index');
Route::post('/brand-save', 'BrandController@brandSave');
Route::get('/brand-list', 'BrandController@brandList');
Route::get('/brand-unpublish/{brand_id}', 'BrandController@unpublish');
Route::get('/brand-publish/{brand_id}', 'BrandController@publish');
Route::get('/brand-edit/{brand_id}', 'BrandController@brandEdit');
Route::post('/brand-update/{brand_id}', 'BrandController@brandUpdate');
Route::get('/brand-delete/{brand_id}', 'BrandController@brandDelete');


//Products.......................................................
Route::get('/product-add', 'ProductsController@create');
Route::post('/product-save', 'ProductsController@store');
Route::get('/product-list', 'ProductsController@index');
Route::get('/product-unpublish/{product_id}', 'ProductsController@unpublish');
Route::get('/product-publish/{product_id}', 'ProductsController@publish');
Route::get('/product-edit/{product_id}', 'ProductsController@edit');
Route::post('/product-update/{product_id}', 'ProductsController@update');
Route::get('/product-delete/{product_id}', 'ProductsController@destroy');


//Slider.......................................................
Route::get('/slider-add', 'SliderController@create');
Route::post('/slider-save', 'SliderController@store');
Route::get('/slider-list', 'SliderController@index');
Route::get('/slider-unpublish/{slider_id}', 'SliderController@unpublish');
Route::get('/slider-publish/{slider_id}', 'SliderController@publish');
Route::get('/slider-edit/{slider_id}', 'SliderController@edit');
Route::post('/slider-update/{slider_id}', 'SliderController@update');
Route::get('/slider-delete/{slider_id}', 'SliderController@destroy');


//Social Links.......................................................
Route::get('/social-add', 'HeaderController@index');
Route::post('/social-update/{id}', 'HeaderController@update');


// For BackEnd Admin Side................................... 
Route::get('/manage-order', 'OrderController@index');
Route::get('/order-details/{order_id}', 'OrderController@orderDetails');
Route::get('/order-confirm/{order_id}', 'OrderController@confrm');
Route::get('/order-delete/{order_id}', 'OrderController@orderDelete');