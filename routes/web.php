<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return redirect('/home');
});

Auth::routes(['register'=>false]);

Route::get('/login2', function () {
    return view('log');
});
Route::get('/invoice', function () {
    return view('orders.invoice');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/home', 'HomeController@index')->name('home'); 
 

    Route::get('/addstudent', function () {
        return view('student.addstudent');
    });

    Route::get('/create', function () {
        return view('products.create');
    });
    Route::get('/student', 'StudentController@index')->name('student');
    Route::post('/addstudent', 'StudentController@store');
    Route::post('/editStudent', 'StudentController@update');
   

    Route::resource('/foodie', 'ProductController');
    Route::resource('/student', 'StudentController');
   
    Route::post('/import', 'StudentController@import')->name('import');
    Route::get('/students', 'StudentController@index')->name('student');
    
    // Route::get('/search', 'studentSearch@search')->name('search');
    Route::get('/foodie', 'ProductController@index')->name('foodie');
    Route::get('/studentSearch', 'StudentController@search')->name('search');
    Route::get('/choose_product/{student}', 'ProductController@order')->name('order');
    Route::post('store_order/{student}', 'OrderController@store')->name('store_order');
    Route::post('/add_product', 'ProductController@productstore')->name('store');
    Route::get('/createstock', 'StockController@stock_manage')->name('stock');
    Route::post('/createstock', 'StockController@store')->name('store');
    Route::resource('/stock', 'StockController');
    Route::get('/stock_details/{id}', 'StockController@detail')->name('detail');
    Route::post('/stock_details', 'StockController@update')->name('details_update');
    Route::get('/order_details', 'OrderController@index')->name('order_detail');
    Route::get('/view_order/{id}', 'OrderController@view_order')->name('view_order');

    // Route::get('/stock_details', 'StockController@edit')->name('edit');
    Route::get('/pdf',function(){
        return view('invoice');
     });
    
     Route::get('generate-invoice/{id}','OrderController@invoice_generate')->name('invoice_generate');

     Route::prefix('user-management')->group(function(){
         Route::resource('roles', 'RoleController')->except(['show', 'create']);
         Route::put('users/roles/{user}', 'UserController@updateRole')->name('users.roles.update');
         Route::resource('users', 'UserController');
     });
});

