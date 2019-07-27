<?php
//Front-end Routes starts here

Route::get('/', [
	'uses' => 'ShopNowController@index',
	'as'   => '/'
]);

Route::get('/', [
	'uses' => 'ShopNowController@index',
	'as'   => 'index'
]);

Route::get('/contact', [
	'uses' => 'ShopNowController@contact',
	'as'   => 'contact'
]);

Route::get('/aboutUs', [
    'uses' => 'ShopNowController@aboutUs',
    'as'   => 'aboutUs'
]);


Route::get('/login', [
	'uses' => 'ShopNowController@login',
	'as'   => 'login'
]);

//Admin Routes starts here
Route::get('/dashboard-admin', [
    'uses' => 'ShopNowController@dashboard',
    'as'   => 'dashboard',
    'middleware' =>'DashBoard'
]);



Route::get('/profile-admin', [
    'uses' => 'ShopNowController@UserInfo',
    'as'   => 'UserInfo',
    'middleware' =>'DashBoard'
]);

Route::get('/inbox',[
    'uses' => 'MessageController@InboxMessage',
    'as' => 'InboxMessage',
    'middleware' =>'DashBoard'
]);

Route::get('/compose-email',[
    'uses' => 'MessageController@ComposeMessage',
    'as' => 'ComposeMessage',
    'middleware' =>'DashBoard'
]);


Route::get('/inbox/delete/{id}',[
    'uses' => 'MessageController@DeleteMessage',
    'as' => 'DeleteMessage',
    'middleware' =>'DashBoard'
]);

Route::get('/inbox/reply/{id}',[
    'uses' => 'MessageController@ReplyMessage',
    'as' => 'ReplyMessage',
    'middleware' =>'DashBoard'
]);

Route::post('/inbox/send-reply',[
    'uses' => 'MessageController@SendReplyMessage',
    'as' => 'SendReplyMessage',
    'middleware' =>'DashBoard'
]);
//Catagory Routes starts here

Route::get('/catagory/add',[
    'uses' => 'CatagoryController@CatagoryAdd',
    'as' => 'CatagoryAdd',
    'middleware' =>'DashBoard'
]);

Route::post('/catagory/save',[
    'uses' => 'CatagoryController@SaveCatagory',
    'as' => 'SaveCatagory',
    'middleware' =>'DashBoard'
]);

Route::get('/catagory/manage',[
    'uses' => 'CatagoryController@CatagoryManage',
    'as' => 'CatagoryManage',
    'middleware' =>'DashBoard'
]);

Route::get('/catagory/edit/{id}',[
    'uses' => 'CatagoryController@CatagoryEdit',
    'as' => 'catagory-edit',
    'middleware' =>'DashBoard'
]);

Route::post('/catagory/manage',[
    'uses' => 'CatagoryController@CatagoryUpdate',
    'as' => 'UpdateCatagory',
    'middleware' =>'DashBoard'
]);

Route::get('/catagory/delete/{id}',[
    'uses' => 'CatagoryController@CatagoryDelete',
    'as' => 'catagory-delete',
    'middleware' =>'DashBoard'
]);


Route::get('/dashboard', [
    'uses' => 'ShopNowController@UserDashboard',
    'as'   => 'userDashboard',
    'middleware' => 'UserDash'
   
    
]);

Route::get('/profie', [
    'uses' => 'ShopNowController@Profile',
    'as'   => 'MyProfile',
    'middleware' => 'UserDash'
    
]);

Route::get('/my-purchased-list', [
    'uses' => 'ShopNowController@PurchasedList',
    'as'   => 'purchasedList',
    
]);

//Product Type Routes starts here


Route::get('/product-type/add',[
    'uses' => 'ProductTypeController@ProductTypeAdd',
    'as' => 'ProductTypeAdd',
    'middleware' =>'DashBoard'
]);


Route::post('/product-type/save',[
    'uses' => 'ProductTypeController@ProductTypeSave',
    'as' => 'SaveProductType',
    'middleware' =>'DashBoard'
]);

Route::get('/product-type/manage',[
    'uses' => 'ProductTypeController@ProductTypeManage',
    'as' => 'ProductTypeManage',
    'middleware' =>'DashBoard'
]);

Route::get('/product-type/manage/edit/{id}',[
    'uses' => 'ProductTypeController@ProductTypeEdit',
    'as' => 'ProductTypeEdit',
    'middleware' =>'DashBoard'
]);

Route::post('/product-type/manage',[
    'uses' => 'ProductTypeController@ProductTypeUpdate',
    'as' => 'UpdateProductType',
    'middleware' =>'DashBoard'
]);

Route::get('/product-type/manage/{id}',[
    'uses' => 'ProductTypeController@ProductTypeDelete',
    'as' => 'ProductTypeDelete',
    'middleware' =>'DashBoard'
]);

//Products Routes starts here

Route::get('/product/add',[
    'uses' => 'ProductController@ProductAdd',
    'as' => 'ProductAdd',
    'middleware' =>'DashBoard'
]);

Route::post('/product/save',[
    'uses' => 'ProductController@ProductSave',
    'as' => 'SaveProduct',
    'middleware' =>'DashBoard'
]);

Route::get('/product/manage',[
    'uses' => 'ProductController@ProductManage',
    'as' => 'ProductManage',
    'middleware' =>'DashBoard'
]);

Route::get('/order-list/view-order-details/{id}',[
    'uses' => 'OrderController@ViewOrderDetails',
    'as' => 'ViewOrderDetails',
    'middleware' =>'DashBoard'
]);

Route::get('/order-list/view-invoice/{id}',[
    'uses' => 'OrderController@ViewInvoice',
    'as' => 'ViewInvoice',
    'middleware' =>'DashBoard'
]);

Route::get('/order-list/download-invoice/{id}',[
    'uses' => 'OrderController@DownloadInvoice',
    'as' => 'DownloadOrderInvoice',
    'middleware' =>'DashBoard'
]);

Route::get('/product/edit/{id}',[
    'uses' => 'ProductController@ProductEdit',
    'as' => 'ProductEdit',
    'middleware' =>'DashBoard'
]);

Route::post('/product/update',[
    'uses' => 'ProductController@ProductUpdate',
    'as' => 'UpdateProduct',
    'middleware' =>'DashBoard'
]);

Route::get('/product/delete/{id}',[
    'uses' => 'ProductController@ProductDelete',
    'as' => 'ProductDelete',
    'middleware' =>'DashBoard'
]);

//Order Routes starts here
Route::get('/order/list',[
    'uses' => 'OrderController@OrderList',
    'as' => 'OrderList',
    'middleware' =>'DashBoard'
]);

Route::get('/confirm-order-status/{id}',[
    'uses' => 'OrderController@OrderConfirm',
    'as' => 'OrderConfirm',
    'middleware' =>'DashBoard'
]);


Route::get('/additional-info/update/{id}',[
    'uses' => 'ShopNowController@UpdateAdditionalInfo',
    'as' => 'UpdateAdditionalInfo',
    'middleware' =>'DashBoard'
]);


Route::get('/delete-order-status/{id}',[
    'uses' => 'OrderController@PaymentOfOrderConfirm',
    'as' => 'PaymentOfOrderConfirm',
    'middleware' =>'DashBoard'
]);

Route::get('/payment-order-status/{id}',[
    'uses' => 'OrderController@OrderDeleteConfirm',
    'as' => 'OrderDeleteConfirm',
    'middleware' =>'DashBoard'
]);

Route::get('/order/confirmed',[
    'uses' => 'OrderController@ConfirmedOrder',
    'as' => 'ConfirmedOrder'
]);
Route::get('/cart/delete/{rowId}',[
    'uses' => 'CartController@cartDelete',
    'as' => 'deleteCart'
]);
Route::get('/products/info/{id}',[
    'uses' => 'ShopNowController@productInfo',
    'as' => 'singleProduct'
]);
Route::get('/{cname}/{id}',[
    'uses' => 'ShopNowController@productViewCatagory',
    'as' => 'CatagoryProductView'
]);

Route::get('/{cname}/{pname}/{id}',[
    'uses' => 'ShopNowController@productView',
    'as' => 'ProductView'
]);



Route::get('/cart',[
    'uses' => 'CartController@showCart',
    'as' => 'showCart'
]);

Route::post('/cart/add',[
    'uses' => 'CartController@addCart',
    'as' => 'cart'
]);

Route::post('/cart/update',[
    'uses' => 'CartController@updateCart',
    'as' => 'updateCart'
]);

Route::get('/order',[
    'uses' => 'OrderController@OrderIndex',
    'as' => 'placeOrder'
]);

Route::post('/order',[
    'uses' => 'OrderController@saveOrder',
    'as' => 'SaveShippingInfo'
]);

Route::get('/payment',[
    'uses' => 'OrderController@payment',
    'as' => 'payment',
    'middleware' => 'payment'
]);

Route::post('/payment-confirm',[
    'uses' => 'OrderController@SavePayment',
    'as' => 'SavePaymentInfo'
]);

Route::get('/order-confirmation',[
    'uses' => 'OrderController@showConfirm',
    'as' => 'showConfirm',
    'middleware' =>'PaymentConfirmation'
]);

Route::post('/search-product',[
    'uses' => 'SearchController@search',
    'as' => 'search'
]);

Route::get('/search-doesnt-exist',[
    'uses' => 'SearchController@SearchDoesntExist',
    'as' => 'SearchDoesntExist'
]);


Route::get('/additional-info',[
    'uses' => 'ShopNowController@AdditionalInfo',
    'as' => 'AdditionalInfo',
    'middleware' =>'DashBoard'
]);

Route::post('/additional-info-save',[
    'uses' => 'ShopNowController@SaveInfo',
    'as' => 'SaveInfo',
    'middleware' =>'DashBoard'
]);


Route::post('/send-message-done',[
    'uses' => 'MessageController@SendMessage',
    'as' => 'SendMessage'
]);

Route::post('/send-message',[
    'uses' => 'MessageController@SendComposeMessage',
    'as' => 'SendComposeMessage',
    'middleware' =>'DashBoard'
]);




Auth::routes();

Route::get('/home', 'ShopNowController@afterLogIn')->name('home');
