<?php

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
    return view('welcome');
});

//Chức năng
    //Logingit
    Route::get('/login',function (){
        return view('back-end.user.login');
    })->name('userlogin');
    //Trang chủ
    Route::get('/dashboard',function (){
        return view('back-end.index');
    })->name('home');
    //Trang danh sách khách hàng
    Route::get('/user-list',function (){
        return view('back-end.user.list');
    })->name('userlist');
    //Trang chi tiết khách hàng
    Route::get('/user-detail',function (){
        return view('back-end.user.detail');
    })->name('userdetail');
    //Trang thêm mới khách hàng
    Route::get('/user-create',function (){
        return view('back-end.user.create');
    })->name('usercreate');

//Trang demo chức năng
    //Slide ảnh khách hàng
Route::get('/user-profile',function (){
    return view('back-end.user.profile');
})->name('userprofile');
