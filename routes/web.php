<?php

use App\Models\Category;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// If you don't want any user to create an account then you can add this code in the Auth method:['register'=>false]
Auth::routes(['register'=>false]);

// Route::get('/home', 'HomeController@index');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//middleware('auth') is for restricting unauthenticated users. So you have to be logged in to access these controllers pages
Route::resource('category','CategoryController')->middleware('auth');
Route::resource('food','FoodController')->middleware('auth');

//Main Dashboard
Route::get('/', 'FoodController@listFood');

//to view details
Route::get('/foods/{id}', 'FoodController@view')->name('food.view');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
