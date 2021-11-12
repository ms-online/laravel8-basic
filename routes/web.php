<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\AboutController;
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

    $brands = DB::table('brands')->get();
    return view('home', compact('brands'));
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
Route::post('/category/add', [CategoryController::class, 'AddCat'])->name('store.category');
Route::get('/category/edit/{id}', [CategoryController::class, 'Edit']);
Route::post('/category/update/{id}', [CategoryController::class, 'Update']);
Route::get('/softdelete/category/{id}', [CategoryController::class, 'SoftDelete']);
Route::get('/category/restore/{id}', [CategoryController::class, 'Restore']);
Route::get('/pdelete/category/{id}', [CategoryController::class, 'Pdelete']);

//品牌形象
Route::get('/brand/all', [BrandController::class, 'AllBrand'])->name('all.brand');
Route::post('/brand/add', [BrandController::class, 'AddBrand'])->name('store.brand');
Route::get('/brand/edit/{id}', [BrandController::class, 'Edit']);
Route::post('/brand/update/{id}', [BrandController::class, 'Update']);
Route::get('/brand/delete/{id}', [BrandController::class, 'Delete']);
//多图上传
Route::get('/multi/image', [BrandController::class, 'Multipic'])->name('multi.image');
Route::post('/multi/add', [BrandController::class, 'StoreImg'])->name('store.image');






//后台主页
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    //Eloquent ORM
    // $users = User::all();

    //Query builder
    $users = DB::table('users')->get();
    return view('admin.index', compact('users'));
})->name('dashboard');


//Admin Route
Route::get('/home/hero', [HomeController::class, 'HomeHero'])->name('home.hero');
Route::get('/add/hero', [HomeController::class, 'AddHero'])->name('add.hero');
Route::post('/store/hero', [HomeController::class, 'StoreHero'])->name('store.hero');

//home About
Route::get('/home/about', [AboutController::class, 'HomeAbout'])->name('home.about');

//退出登录
Route::get('/user/logout', [BrandController::class, 'UserLogout'])->name('user.logout');
