<?php

namespace App\Http\Controllers;

use App\HoaDonModel;
use App\HoaHongKhachHangLogModel;
use App\HoaHongKhachHangModel;
use App\UsersModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BackEndController extends Controller
{
    // trang admin
    public function index()
    {
        $order = count(HoaDonModel::all());
        $tongtien = HoaDonModel::select('tong_tien')->get();
        $tongtien = $tongtien->sum('tong_tien');
        $khachhang = UsersModel::join('users_profile', 'users_profile.user_id', '=', 'users.id')
            ->join('hoa_hong_khach_hang', 'hoa_hong_khach_hang.user_id', '=', 'users.id')
            ->where('users.role', '=', 2)
            ->orderBy('users.created_at', 'asc')
            ->select([
                'users.id as id',
                'phone',
                'email',
                'code',
                'kh_ten',
                'active',
                'kh_gioi_tinh',
                'kh_ngay_sinh',
                'kh_dia_chi',
                'kh_cmnd',
                'kh_ngay_cap',
                'kh_image',
                'ma_code_cha',
                'tien_hoa_hong',
            ])->get();
        $count = count($khachhang);
        for ($i = 0; $i < $count; $i++) {
            $khachhang[$i]['stt'] = $i + 1;
        }
        $nguoidung = count(UsersModel::all());
        $nguoidungthuong = count(UsersModel::where('role', '=', 2)->get());
        $gianhang = count(UsersModel::where('role', '=', 1)->get());
        $gianhangkinhdoanh = count(UsersModel::where('role', '=', 1)->where('active', '=', 1)->get());
        $hh = HoaHongKhachHangLogModel::select(['so_tien_da_lanh'])->get();
        $tong_hoa_hong = $hh->sum('so_tien_da_lanh');
        $hhh = HoaHongKhachHangModel::select('tien_hoa_hong')->get();
        $hoa_hong = $hhh->sum('tien_hoa_hong');
        return view('adminlayouts.home', compact('hoa_hong', 'tong_hoa_hong', 'gianhangkinhdoanh', 'gianhang', 'khachhang', 'nguoidungthuong', 'order', 'tongtien', 'nguoidung'));
    }

    // khóa tài khoản
    public function KhoaTK($id)
    {
        UsersModel::where('id', $id)->update([
            'active' => 0,
        ]);
        return redirect(route('admin.index'))->with('success', 'Bạn đã khoản tài khoản này !');
    }

    // thanh toán tiền hoa hồng
    public function ThanhToanHH($id)
    {
        $tienhh = HoaHongKhachHangModel::where('user_id', $id)->get()->first()->tien_hoa_hong;
        HoaHongKhachHangLogModel::create([
            'user_id' => $id,
            'so_tien_da_lanh' => $tienhh,
            'ngay_lanh' => date('d-m-Y H:i:s'),
        ]);
        HoaHongKhachHangModel::where('user_id', $id)->update([
            'tien_hoa_hong' => 0,
        ]);
        return redirect(route('admin.index'))->with('success', 'Bạn đã thanh toán thành công !');
    }

    // danh sách gian hàng ở backend
    public function indexHG()
    {
        $data = UsersModel::join('users_gian_hang', 'users_gian_hang.user_id', '=', 'users.id')
            ->where('users.role', '=', 1)
            ->select([
                'users.id',
                'users.phone',
                'users.email',
                'users.active',
                'users_gian_hang.gh_ten',
                'users_gian_hang.gh_dia_chi',
                'users_gian_hang.gh_tien_loi_nhuan',
            ])->get();
        $count = count($data);
        for ($i = 0; $i < $count; $i++) {
            $data[$i]['stt'] = $i + 1;
        }
        return view('backend.gianhang.index', compact('data'));
    }

    public function KhoaTKGH($id)
    {
        UsersModel::where('id', $id)->update([
            'active' => 0,
        ]);
        return redirect(route('indexHG'))->with('success', 'Bạn đã khoản tài khoản này !');
    }

    public function XemChiTietKH(Request $request)
    {
        $data = UsersModel::join('users_profile', 'users_profile.user_id', '=', 'users.id')
            ->where('users.role', '=', 2)
            ->where('users.id', $request->id)
            ->first();
        $gioithieu = HoaHongKhachHangModel::leftjoin('users_profile', 'users_profile.user_id', '=', 'hoa_hong_khach_hang.ma_code_cha')
            ->where('hoa_hong_khach_hang.user_id', $request->id)
            ->first();
        return ['status' => 'success', 'data' => $data, 'gioithieu' => $gioithieu];
    }
}
