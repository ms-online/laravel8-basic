<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ChangePassword;
use App\Models\Multipic;
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
//请求前台home页
Route::get('/', function () {
    $abouts = DB::table('home_abouts')->first();
    $brands = DB::table('brands')->get();
    $images = Multipic::all();
    return view('home', compact('brands', 'abouts', 'images'));
});


// Route::get('/about', function () {
//     return view('about');
// });

//Laravel 6,7
// Route::get('/contact', 'ContactController@index');

//Laravel 8
// Route::get('/contact', [ContactController::class, 'index'])->name('con');

//Lravel 8 dashbord ——商品类型
Route::get('/category/all', [CategoryController::class, 'AllCat'])->name('all.category');
Route::post('/category/add', [CategoryController::class, 'AddCat'])->name('store.category');
Route::get('/category/edit/{id}', [CategoryController::class, 'Edit']);
Route::post('/category/update/{id}', [CategoryController::class, 'Update']);
Route::get('/softdelete/category/{id}', [CategoryController::class, 'SoftDelete']);
Route::get('/category/restore/{id}', [CategoryController::class, 'Restore']);
Route::get('/pdelete/category/{id}', [CategoryController::class, 'Pdelete']);

//Lravel 8 dashbord ——品牌形象
Route::get('/brand/all', [BrandController::class, 'AllBrand'])->name('all.brand');
Route::post('/brand/add', [BrandController::class, 'AddBrand'])->name('store.brand');
Route::get('/brand/edit/{id}', [BrandController::class, 'Edit']);
Route::post('/brand/update/{id}', [BrandController::class, 'Update']);
Route::get('/brand/delete/{id}', [BrandController::class, 'Delete']);
////Lravel 8 dashbord ——多图上传
Route::get('/multi/image', [BrandController::class, 'Multipic'])->name('multi.image');
Route::post('/multi/add', [BrandController::class, 'StoreImg'])->name('store.image');




//BootStrap后台主页——Admin dashbord
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    //Eloquent ORM
    // $users = User::all();

    //Query builder
    $users = DB::table('users')->get();
    return view('admin.index', compact('users'));
})->name('dashboard');


//Admin Route：hero
Route::get('/home/hero', [HomeController::class, 'HomeHero'])->name('home.hero');
Route::get('/add/hero', [HomeController::class, 'AddHero'])->name('add.hero');
Route::post('/store/hero', [HomeController::class, 'StoreHero'])->name('store.hero');

//Home页的About区域
Route::get('/home/about', [AboutController::class, 'HomeAbout'])->name('home.about');
Route::get('/add/about', [AboutController::class, 'AddAbout'])->name('add.about');
Route::post('/store/about', [AboutController::class, 'StoreAbout'])->name('store.about');
Route::get('/about/edit/{id}', [AboutController::class, 'EditAbout']);
Route::post('/update/homeabout/{id}', [AboutController::class, 'UpdateAbout']);
Route::get('/about/delete/{id}', [AboutController::class, 'DeleteAbout']);

//前台Portfolio 页面
Route::get('/portfolio', [AboutController::class, 'Portfolio'])->name('portfolio');

//后台contact 页面
Route::get('/admin/contact', [ContactController::class, 'AdminContact'])->name('admin.contact');
Route::get('/admin/add/contact', [ContactController::class, 'AdminAddContact'])->name('add.contact');
Route::post('/admin/store/contact', [ContactController::class, 'AdminStoreContact'])->name('store.contact');
Route::get('/admin/message', [ContactController::class, 'AdminMessage'])->name('admin.message');

//前台 Contact 页面
Route::get('/contact', [ContactController::class, 'Contact'])->name('contact');
Route::post('/contact/form', [ContactController::class, 'ContactForm'])->name('contact.form');

//更改用户密码路由
Route::get('/user/password', [ChangePassword::class, 'CPassword'])->name('change.password');
Route::post('/password/update', [ChangePassword::class, 'UpdatePassword'])->name('password.unpdate');

//退出登录
Route::get('/user/logout', [BrandController::class, 'UserLogout'])->name('user.logout');
