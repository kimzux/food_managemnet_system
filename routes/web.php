<?php

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

Auth::routes();

Route::get('/login2', function () {
    return view('log');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/addstudent', function () {
        return view('student.addstudent');
    });

    Route::get('/create', function () {
        return view('products.create');
    });
    Route::get('/student', 'StudentController@index')->name('student');
    Route::post('/addstudent', 'StudentController@store');
    Route::post('/editStudent', 'StudentController@update');
    Route::get('/home', 'HomeController@total_student')->name('dashboard');
    Route::resource('/foodie', 'ProductController');
    Route::resource('/student', 'StudentController');
   
    Route::post('/import', 'StudentController@import')->name('import');
    
    // Route::get('/search', 'studentSearch@search')->name('search');
    Route::get('/studentSearch', 'StudentController@search')->name('search');
    Route::get('/choose_product/{student}', 'ProductController@order')->name('order');
    Route::post('store_order/{student}', 'OrderController@store')->name('store_order');
    Route::post('/add_product', 'ProductController@productstore')->name('store');
    Route::get('/createstock', 'StockController@stock_manage')->name('stock');
    Route::post('/createstock', 'StockController@store')->name('store');
    Route::resource('/stock', 'StockController');
    Route::get('/stock_details/{id}', 'StockController@detail')->name('detail');
    Route::post('/stock_details', 'StockController@update')->name('update');
    // Route::get('/stock_details', 'StockController@edit')->name('edit');
    
});

