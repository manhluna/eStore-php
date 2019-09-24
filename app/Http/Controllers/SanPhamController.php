<?php

namespace App\Http\Controllers;

use App\DanhMucSanPhamModel;
use App\SanPhamModel;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    // danh sách sản phẩm bach end
    public function index()
    {
        return view('backend.sanpham.index');
    }
}
