<?php

Route::group(['prefix' => 'phan-cap-hoa-hong'], function () {
    Route::get('/', 'PhanCapHoaHongController@index')->name('pchh.index')->middleware('admin');
    Route::get('add', 'PhanCapHoaHongController@create')->name('pchh.create')->middleware('admin');
    Route::post('add', 'PhanCapHoaHongController@store')->name('pchh.store')->middleware('admin');
    Route::get('edit/{id}', 'PhanCapHoaHongController@edit')->name('pchh.edit')->middleware('admin');
    Route::post('edit/{id}', 'PhanCapHoaHongController@update')->name('pchh.update')->middleware('admin');
    Route::get('destroy/{id}', 'PhanCapHoaHongController@destroy')->name('pchh.destroy')->middleware('admin');
    Route::get('status/{id}', 'PhanCapHoaHongController@status')->name('pchh.status')->middleware('admin');
});

Route::group(['prefix' => 'lich-su-hoa-hong'], function () {
    Route::get('/', 'PhanCapHoaHongController@LichSuHH')->name('LichSuHH')->middleware('admin');
});
