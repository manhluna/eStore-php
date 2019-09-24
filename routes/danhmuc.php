<?php

Route::group(['prefix' => 'danh-muc-san-pham'], function () {
    Route::get('/', 'DanhMucSanPhamController@index')->name('dm.index')->middleware('admin');
    Route::get('add', 'DanhMucSanPhamController@create')->name('dm.create')->middleware('admin');
    Route::post('add', 'DanhMucSanPhamController@store')->name('dm.store')->middleware('admin');
    Route::get('edit/{id}', 'DanhMucSanPhamController@edit')->name('dm.edit')->middleware('admin');
    Route::post('edit/{id}', 'DanhMucSanPhamController@update')->name('dm.update')->middleware('admin');
    Route::get('destroy/{id}', 'DanhMucSanPhamController@destroy')->name('dm.destroy')->middleware('admin');
});