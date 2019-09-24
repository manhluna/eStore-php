<?php

namespace App\Http\Controllers;

use App\DanhMucSanPhamModel;
use App\Http\Requests\DanhMucSanPhamRequest;
use phpDocumentor\Reflection\Types\This;
use App\QuanHuyenModel;
use App\TinhThanhModel;

class DanhMucSanPhamController extends Controller
{
    public function data()
    {
        $data = DanhMucSanPhamModel::all();
        return $data;
    }

    public function index()
    {
        $data = $this->data();
        $count = count($data);
        for ($i = 0; $i < $count; $i++) {
            $data[$i]['stt'] = $i + 1;
        }
        return view('backend.danhmucsanpham.index', compact('data'));
    }

    public function create()
    {
        $tinhthanh = TinhThanhModel::all();
        $quanhuyen = QuanHuyenModel::all();
        return view('backend.danhmucsanpham.create',compact('tinhthanh','quanhuyen'));
    }

    public function store(DanhMucSanPhamRequest $req)
    {
        $data = new DanhMucSanPhamModel();
        $data->dm_ten = $req->get('dm_ten');
        $data->save();
        return redirect(route('dm.index'))->with('success', 'Thêm thành công !');
    }

    public function edit($id)
    {
        $data = DanhMucSanPhamModel::where('id', $id)->first();
        return view('backend.danhmucsanpham.edit', compact('data'));
    }

    public function update(DanhMucSanPhamRequest $req, $id)
    {
        $data = DanhMucSanPhamModel::find($id);
        $data->dm_ten = $req->get('dm_ten');
        $data->save();
        return redirect(route('dm.index'))->with('success', 'Cập nhật thành công !');
    }

    public function destroy($id)
    {
        DanhMucSanPhamModel::find($id)->delete();
        return redirect(route('dm.index'))->with('success', 'Xóa thành công !');
    }

}
