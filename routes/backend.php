<?php

Route::get('/admin', 'BackEndController@index')->name('admin.index')->middleware('admin');

// khóa tài khoản
Route::get('/khoa-tai-khoan-nguoi-dung/{id}', 'BackEndController@KhoaTK')->name('KhoaTK')->middleware('admin');

Route::get('/khoa-tai-khoan-gian-hang/{id}', 'BackEndController@KhoaTKGH')->name('KhoaTKGH')->middleware('admin');

// thanh toán hoa hồng
Route::get('/thanh-toan-hoa-hong/{id}', 'BackEndController@ThanhToanHH')->name('ThanhToanHH')->middleware('admin');

// danh sách ở backend
Route::get('/admin/gian-hang', 'BackEndController@indexHG')->name('indexHG')->middleware('admin');

Route::get('/detail', 'BackEndController@XemChiTietKH')->name('detail');