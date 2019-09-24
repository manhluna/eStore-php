<?php

Route::get('/', function () {
    return redirect(route('user.index'));
});

Route::get('/logout', 'HomeController@logout')->name('admin.logout');

@include('backend.php');
@include('frontend.php');
@include('gianhang.php');
@include('nguoidung.php');
@include('danhmuc.php');
@include('hoahong.php');
@include('hoadon.php');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
