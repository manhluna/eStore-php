<?php

Route::group(['prefix' => 'hoa-don'], function () {
    Route::get('/', 'HoaDonController@index')->name('hoadon.index')->middleware('admin');

    Route::get('/van-chuyen/{id}', 'HoaDonController@VanChuyen')->name('VanChuyen')->middleware('admin');

    Route::get('/huy/{id}', 'HoaDonController@HuyHD')->name('HuyHD')->middleware('admin');

    Route::get('/duyet/{id}', 'HoaDonController@commission')->name('commission')->middleware('admin');

    Route::get('xem', 'HoaDonController@XemChiTiet')->name('XemChiTiet');
});