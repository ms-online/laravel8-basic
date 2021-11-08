<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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

Route::get('/home', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

//Laravel 6,7
// Route::get('/contact', 'ContactController@index');

//Laravel 8
Route::get('/contact', [ContactController::class, 'index'])->name('con');

//商品类型
Route::get('/category/all', [CategoryController::class, 'AllCat'])->name('all.category');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    //Eloquent ORM
    // $users = User::all();

    //Query builder
    $users = DB::table('users')->get();
    return view('dashboard', compact('users'));
})->name('dashboard');
