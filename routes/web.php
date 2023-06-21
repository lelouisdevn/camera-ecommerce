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
//Homepage
Route::get('/', 'HomeController@index');
Route::get('/Homepage', 'HomeController@index');


//Sidebar
Route::get('/Category/{CategoryId}', 'Categories@showCategory');
Route::get('/Brand/{TrademarkId}', 'trademark@showTrademark');
Route::get('/ProductDetail/{ProductId}', 'ProductController@showDetails');
Route::get('/showProduct', 'ProductController@showProduct');


//Adminstration
Route::get('/adminLogin', 'AdminController@index');
Route::get('/dashboard', 'AdminController@display_Dashboard');
Route::get('/logOut', 'AdminController@logOut');
Route::post('/adminDashboard', 'AdminController@getIntoDashboard');


//Categories
Route::get('/addNewCategory', 'Categories@addProduct');
Route::post('/saveCategory', 'Categories@saveCategory');
Route::get('/listAllCategories', 'Categories@listCategories');
Route::get('/editCategoryProduct/{CategoryId}', 'Categories@editCategory');
Route::get('/deleteCategoryProduct/{CategoryId}', 'Categories@deleteCategory');
Route::post('/updateCategory/{CategoryId}', 'Categories@updateCategory');


//Trademarks
Route::get('/addNewTrademark', 'trademark@addNewTrademark');
Route::post('/saveTrademark', 'trademark@saveTrademark');
Route::get('/listAllTrademark', 'trademark@listAllTrademark');
Route::get('/editTrademark/{TrademarkId}', 'trademark@editTrademark');
Route::get('/deleteTrademark/{TrademarkId}', 'trademark@deleteTrademark');
Route::post('/updateTrademark/{TrademarkId}', 'trademark@updateTrademark');


//Products
Route::get('/addNewProduct', 'ProductController@addNewProduct');
Route::post('/saveProduct', 'ProductController@saveProduct');
Route::get('/listAllProduct', 'ProductController@listAllProduct');
Route::get('/editProduct/{ProductId}', 'ProductController@editProduct');
Route::get('/deleteProduct/{ProductId}', 'ProductController@deleteProduct');
Route::post('/updateProduct/{ProductId}', 'ProductController@updateProduct');
Route::get('editProductDetail/{ProductId}', 'ProductController@editProductDetail');
Route::post('updateProductDetail/{ProductId}', 'ProductController@updateProductDetail');

//Carts
Route::post('/saveToCart', 'showCart@saveToCart');
Route::get('/showCarts', 'showCart@showCarts');
Route::get('/deleteCartItems/{ProductId}', 'showCart@deleteCartItems');
Route::get('/increaseOneItems/{ProductId}', 'showCart@increaseOneItems');
Route::get('/decreaseOneItem/{ProductId}', 'showCart@decreaseOneItem');
Route::post('/updateQuantity', 'showCart@updateQuantity');


//Users
Route::get('/loginCheckOut', 'UserController@loginCheckOut');
Route::get('/registerAccount', 'UserController@registerAccount');
Route::post('/UserRegister', 'UserController@UserRegister');
Route::post('/pay', 'UserController@pay');
Route::get('UserLogin', 'UserController@UserLogin');
Route::post('authenticate', 'UserController@authenticate');
Route::get('signOut', 'UserController@signOut');
//-----------------------------------------------------------------------//
Route::get('displayProfile/{UserId}', 'UserController@displayProfile');
Route::get('UserOrder/{UserId}', 'UserController@UserOrder');
Route::get('settings/{UserId}', 'UserController@settings');
Route::get('changePassword/{UserId}', 'UserController@changePassword');
Route::post('saveNewPassword/{UserId}', 'UserController@saveNewPassword');
Route::get('deleteAccount/{UserId}', 'UserController@deleteAccount');
Route::post('updateUserInfo', 'UserController@updateUserInfo');
//-----------------------------------------------------------------------//
Route::get('deleteUser/{UserId}', 'AdminController@deleteUser');

//Product details
Route::get('addProductDetail/{ProductId}', 'ProductController@addProductDetail');
Route::post('saveDetail/{ProductId}', 'ProductController@saveDetail');


//Orders
Route::post('saveOrder/{UserId}', 'Order@saveOrder');
Route::get('payment', 'Order@announcement');
Route::get('manageOrder','AdminController@manageOrder');
Route::get('seeOrderDetail/{OrderId}','Order@seeOrderDetail');
Route::post('changeOrderStatus/{OrderId}', 'Order@changeOrderStatus');
Route::get('deleteOrder/{OrderId}', 'Order@deleteOrder'); 
Route::get('printOrder/{OrderId}', 'Order@printOrder');
Route::get('cancelOrder/{OrderId}', 'Order@cancelOlder');


//Comments
Route::post('addComment/{ProductId}', 'Comment@addComment');
Route::get('listAllComments', 'Comment@listAllComments');
Route::get('deleteComment/{CommentId}', 'Comment@deleteComment');
Route::post('deleteManyComments', 'Comment@deleteManyComments');


//Wishlists
Route::get('addToWishlist/{ProductId}', 'ProductController@addToWishlist');
Route::get('removeFromWishlist/{ProductId}', 'ProductController@removeFromWishlist');
Route::get('displayWishlist/', 'UserController@displayWishlist');
Route::get('removeFromWishlist1/{ProductId}', 'ProductController@removeFromWishlist1');
Route::post('saveToCart1', 'showCart@saveToCart1');

//Helpdesk
Route::post('saveHelpdesk', 'helpdesk@saveHelpdesk');
Route::get('listAllHelpdesk', 'helpdesk@listAllHelpdesk');

//Customers_admin
Route::get('listCustomers', 'AdminController@listCustomers');

//Search
Route::get('/search', 'HomeController@search');
Route::get('searchOrder', 'search@searchOrder');

//Mail
Route::get('sendmail', 'MailController@sendmail');
Route::get('resetpassword', 'MailController@resetpassword');

//Sliders
Route::get('listSliders', 'AdminController@listSliders');
Route::get('addNewSlider', 'AdminController@addNewSlider');
Route::get('saveNewSlider/{ProductId}', 'AdminController@saveSlider');
Route::get('deleteSlider/{ProductId}', 'AdminController@deleteSlider');

//News
Route::get('hotnews/{NewsId}', 'AdminController@news');
Route::get('showAllNews', 'AdminController@showAllNews');
Route::get('addNews', 'AdminController@addNews');
Route::post('saveNews', 'AdminController@saveNews');
Route::get('editNews/{NewsId}', 'AdminController@editNews');
Route::post('updateNews/{NewsId}', 'AdminController@updateNews');
Route::get('deleteNews/{NewsId}', 'AdminController@deleteNews');
//----------------------------------------------------------------
Route::post('saveNewsComment/{NewsId}', 'news@saveNewsComment');
Route::get('listNewsComments', 'news@listNewsComments');

//Passwords
Route::get('forgotpassword', 'UserController@forgotpassword');
Route::post('checkEmail', 'MailController@checkEmail');
Route::get('verifyidentity/{UserId}', 'UserController@verifyidentity');
Route::post('checkotp/{UserId}', 'MailController@checkotp');