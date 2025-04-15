<?php

use App\Http\Controllers\admin\adminController;
use App\Http\Controllers\cart\cartController;
use App\Http\Controllers\home\homeController;
use App\Http\Controllers\login\loginController;
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

//Route Login
Route::group(['middleware' => 'guest'], function () {
    Route::match(['get', 'post'], '/login', [loginController::class, 'login'])->name('login');
    Route::match(['get', 'post'], '/signup', [loginController::class, 'signup'])->name('signup');
});

// Route dành cho Admin đã đăng nhập
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/index', [adminController::class, 'index'])->name('admin.index');

    Route::get('/admin/loaisp', [adminController::class, 'LoaiSP'])->name('admin.loaisp');
    Route::get('/admin/loaisp/{id}', [adminController::class, 'LoaiSPedit'])->name('admin.loaispedit');
    Route::put('/admin/loaisp/{id}', [adminController::class, 'LoaiSPeput'])->name('admin.loaispput');

    Route::get('/admin/user', [adminController::class, 'User'])->name('admin.user');
    Route::get('/admin/user/{id}', [adminController::class, 'Useredit'])->name('admin.useredit');
    Route::put('/admin/user/{id}', [adminController::class, 'Userput'])->name('admin.userput');

    Route::get('/admin/hangsx', [adminController::class, 'HangSX'])->name('admin.hangsx');
    Route::get('/admin/hangsx/{id}', [adminController::class, 'HangSXedit'])->name('admin.hangsxedit');
    Route::put('/admin/hangsx/{id}', [adminController::class, 'HangSXput'])->name('admin.hangsxput');

//Sản phẩm
    Route::get('/admin/sanpham', [adminController::class, 'SanPham'])->name('admin.sanpham');
    Route::get('/admin/themsp', [adminController::class, 'ThemSP'])->name('admin.themsp');
    Route::post('/admin/XLThemSP', [adminController::class, 'XLThemSP'])->name('admin.XLThemSP');
    Route::get('/admin/suasp/{id}', [adminController::class, 'SuaSP'])->name('admin.suasp');
    Route::post('/admin/XLSuaSP/{id}', [adminController::class, 'XLSuaSP'])->name('admin.XLSuaSP');
    Route::get('/admin/xoasp/{id}', [adminController::class, 'XoaSP'])->name('admin.xoasp');
    Route::post('/admin/XLXoaSP/{id}', [adminController::class, 'XLXoaSP'])->name('admin.XLXoaSP');

//Đơn hàng
    Route::get('/admin/donhang', [adminController::class, 'DonHang'])->name('admin.donhang');
    Route::post('/admin/XNDH/{id}', [adminController::class, 'XNDH'])->name('admin.xndh');
    Route::get('admin/CTDH/{id}', [adminController::class, 'CTDH'])->name('admin.ctdh');
    Route::get('admin/InHD/{id}', [adminController::class, 'InHD'])->name('admin.inhd');
});

Route::group(['middleware' => 'auth'], function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/my-account', [homeController::class, 'myaccount'])->name('home.myaccount');
    Route::post('/my-account', [homeController::class, 'postmyaccount'])->name('home.postmyaccount');

    Route::get('/my-order', [homeController::class, 'myorder'])->name('home.myorder');
    Route::get('/my-order/{id}', [homeController::class, 'myordershow'])->name('home.myordershow');
    

});

Route::group(['middleware' => 'auth'], function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

//Route Home
Route::get('/', [homeController::class, 'index'])->name('home.index');
Route::get('/ctsp/{id}', [homeController::class, 'ctsp'])->name('home.ctsp');
// Route::get('/CTDH/{id}', [homeController::class, 'CTDH'])->name('home.ctdh');
//     Route::get('/InHD/{id}', [homeController::class, 'InHD'])->name('home.inhd');

//Route Cart
Route::get('/cart/index', [cartController::class, 'index'])->name('cart.index');
Route::post('/cart/themgh', [cartController::class, 'themGH'])->name('cart.themgh');
Route::post('/cart/update/{id}', [cartController::class, 'update'])->name('cart.update');
Route::get('/cart/delete/{id}', [cartController::class, 'delete'])->name('cart.delete');
Route::get('/cart/checkout', [cartController::class, 'checkout'])->name('cart.checkout');
Route::post('/cart/xltt', [cartController::class, 'xltt'])->name('cart.xltt');