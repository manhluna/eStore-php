<?php
Route::group(['prefix' => 'gian-hang'], function () {

    // đăng ký gian hàng
    Route::get('/resgiter', 'GianHangController@resgiterGH')->name('gh.resgiterGH');
    Route::post('/resgiter/add', 'GianHangController@regesterStore')->name('gh.regesterStore');

    // danh sách sản phẩm
    Route::get('/quan-ly-san-pham', 'GianHangController@qlsanpham')->name('gh.qlsanpham')->middleware('store');

    // thêm sản phẩm của gian hàng
    Route::get('/quan-ly-san-pham/add', 'GianHangController@tmsanpham')->name('gh.tmsanpham')->middleware('store');
    Route::post('/quan-ly-san-pham/add', 'GianHangController@tmsanphamStore')->name('gh.tmsanphamStore')->middleware('store');

    // sửa sản phẩm của gian hàng
    Route::get('/quan-ly-san-pham/edit/{id}', 'GianHangController@cnsanpham')->name('gh.cnsanpham')->middleware('store');
    Route::post('/quan-ly-san-pham/edit/{id}', 'GianHangController@cnsanphamStore')->name('gh.cnsanphamStore')->middleware('store');

    // cài đặt sản phẩm của gian hàng
    Route::get('/quan-ly-san-pham/cai-dat/{id}', 'GianHangController@caidatSanPham')->name('gh.caidatSanPham')->middleware('store');
    Route::post('/quan-ly-san-pham/cai-dat/{id}', 'GianHangController@caidatStore')->name('gh.caidatStore')->middleware('store');

    // xóa sản phẩm cảu gian hàng
    Route::get('/quan-ly-san-pham/destroy/{id}', 'GianHangController@xsanphamDestroy')->name('gh.xsanphamDestroy')->middleware('store');

    // profile gian hàng
    Route::get('/profile', 'GianHangController@profileGianHang')->name('gh.profileGianHang')->middleware('store');

    // xem san pham
    Route::get('/quan-ly-san-pham/chi-tiet/{id}', 'GianHangController@xemSanPham')->name('gh.xemSanPham');

    Route::get('/profile-edit', 'GianHangController@profileEdit')->name('gh.profileEdit');
    Route::post('/profile-edit', 'GianHangController@profileUpdate')->name('gh.profileUpdate');
});