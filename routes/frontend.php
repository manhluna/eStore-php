<?php
// trang chủ


Route::get('/home', function () {
    if (empty(Auth::user())) {
        return redirect(route('user.index'));
    } else {
        if (Auth::user()->role == 0 && Auth::user()->active == 1) {
            return redirect(route('admin.index'));
        }
        if (Auth::user()->role == 1 && Auth::user()->active == 1) {
            return redirect(route('gh.qlsanpham'));
        }
        if (Auth::user()->role == 2 && Auth::user()->active == 1) {
            return redirect(route('user.index'));
        }
    }
    return view('userlayouts.500');
});
Route::get('/user', 'FrontEndController@trangchu')->name('user.index');

Route::get('/about', 'FrontEndController@about')->name('about');
Route::get('/services', 'FrontEndController@services')->name('services');
Route::get('/secret', 'FrontEndController@secret')->name('secret');

Route::get('/changepassword', 'FrontEndController@changePassword')->name('changePassword');

// trang đơm hàng
Route::post('/order', 'FrontEndController@order')->name('order');
Route::post('/orderStore', 'FrontEndController@orderStore')->name('orderStore');

// trang đang nhập
Route::get('/user/login', 'FrontEndController@danhmucsanphamLogin')->name('login');

//
Route::get('/user/san-pham/{id}', 'FrontEndController@sanphamdanhmuc')->name('sanphamdanhmuc');

Route::get('/san-pham/single/{id}', 'FrontEndController@singelproduct')->name('singelproduct');