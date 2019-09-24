<?php

namespace App\Http\Controllers;

use App\DanhMucSanPhamModel;
use App\HoaDonChiTietModel;
use App\HoaDonModel;
use App\PhanCapHoaHongModel;
use App\SanPhamGiaModel;
use App\SanPhamModel;
use App\SoDiaChiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class FrontEndController extends Controller
{
    public function data()
    {
        $data = DanhMucSanPhamModel::all();
        return $data;
    }

    public function trangchu(Request $req)
    {
        $data = $this->data();
        $sanpham = SanPhamModel::join('san_pham_gia', 'san_pham_gia.id_sp', '=', 'san_pham.id')
            ->join('san_pham_danh_muc', 'san_pham_danh_muc.id', '=', 'san_pham.id_danh_muc')
            ->join('users', 'users.id', '=', 'san_pham.id_gian_hang')
            ->join('users_gian_hang', 'users.id', '=', 'users_gian_hang.user_id')
            ->where('san_pham.status', '<>', 0)
            ->where('users.active', '=', 1)
            ->orderByRaw('san_pham.created_at desc')
            ->select([
                'san_pham.id as id_sp',
                'san_pham.sp_ten as ten_sp',
                'san_pham.sp_thuong_hieu as sp_thuong_hieu',
                'san_pham.sp_image as image_sp',
                'san_pham_gia.gia_goc as gia_goc_sp',
                'san_pham_gia.gia_km as gia_km_sp',
                'san_pham_danh_muc.dm_ten as dm_sp',
                'users_gian_hang.gh_ten as gh_sp',
                'users_gian_hang.user_id as gh_id',
            ]);
//        dd($sanpham);
        if ($req->has('q') && $req->get('q') != '')
            $sanpham = $sanpham->where(function ($q) use ($req) {
                return $q->where('san_pham.sp_ten', 'like', '%' . $req->get('q') . '%')
                    ->orwhere('san_pham.sp_thuong_hieu', 'like', '%' . $req->get('q') . '%')
                    ->orwhere('users_gian_hang.gh_ten', 'like', '%' . $req->get('q') . '%');
            });
        $sanpham = $sanpham->paginate(8);
        return view('userlayouts.index', compact('data', 'sanpham'));
    }

    public function danhmucsanphamLogin()
    {
        $data = $this->data();
        return view('login', compact('data'));
    }

    // trang giỏ hàng
    public function order(Request $request)
    {
//        dd($request->all());

        if ($request->id != null) {
            $order = [];
            foreach ($request->id as $key => $value) {
                $order[$key] = [
                    'id' => $request->id[$key],
                    'name' => $request->name[$key],
                    'gia' => $request->gia[$key],
                    'soluong' => $request->soluong[$key],
                ];
            }
        } else {
            $order = [];
        }
        $data = $this->data();
        if (empty(Auth::user())) {
            $dia_chi = [];
        } else {
            $dia_chi = SoDiaChiModel::leftjoin('tinhthanh', 'tinhthanh.id', 'so_dia_chi.id_tinhthanh')
                ->leftjoin('quanhuyen', 'quanhuyen.id', 'so_dia_chi.id_quanhuyen')
                ->leftjoin('phuongxa', 'phuongxa.id', 'so_dia_chi.id_phuongxa')
                ->where('so_dia_chi.id_kh', '=', Auth::user()->id)
                ->select([
                    'so_dia_chi.id as iddiachi',
                    'so_dia_chi.ho_ten as hotenkh',
                    'so_dia_chi.sdt_kh as sdtkh',
                    'so_dia_chi.dia_chi as dia_chi',
                    'tinhthanh.tinhthanh as tinhthanh',
                    'quanhuyen.quanhuyen as quanhuyen',
                    'phuongxa.phuongxa as phuongxa',
                ])
                ->get();
        }
        return view('userlayouts.sanpham.order', compact('data', 'order', 'dia_chi'));
    }

    // du lieu gio hang
    public function orderStore(Request $request)
    {
//        dd($request->soluong);
        if ($request->soluong == null) {
            return redirect('user')->with('error', 'Giỏ hàng của bạn trống !');
        } else {
            if (Auth::user() != null && Auth::user()->role == 2) {
                $phan_cap = PhanCapHoaHongModel::where('status', '=', 1)->get()->first()->id;

                if ($request->get('so_dia_chi') == null) {
                    $hoadon = HoaDonModel::create([
                        'id_kh' => Auth::user()->id,
                        'tong_tien' => 0,
                        'phan_cap' => $phan_cap,
                        'status' => 0,
                        'ma_hoa_don' => time(),
                        'ho_ten' => $request->get('ho_ten'),
                        'sdt_kh' => $request->get('sdt_kh'),
                        'dia_chi_giao' => $request->get('dia_chi_giao'),
                    ]);
                } else {
                    $so_dia_chi = SoDiaChiModel::leftjoin('tinhthanh', 'tinhthanh.id', 'so_dia_chi.id_tinhthanh')
                        ->leftjoin('quanhuyen', 'quanhuyen.id', 'so_dia_chi.id_quanhuyen')
                        ->leftjoin('phuongxa', 'phuongxa.id', 'so_dia_chi.id_phuongxa')
                        ->where('so_dia_chi.id', '=', $request->get('so_dia_chi'))
                        ->select([
                            'so_dia_chi.id as iddiachi',
                            'so_dia_chi.ho_ten as hotenkh',
                            'so_dia_chi.sdt_kh as sdtkh',
                            'so_dia_chi.dia_chi as dia_chi',
                            'tinhthanh.tinhthanh as tinhthanh',
                            'quanhuyen.quanhuyen as quanhuyen',
                            'phuongxa.phuongxa as phuongxa',
                        ])->first();
//                    dd($so_dia_chi);
                    $hoadon = HoaDonModel::create([
                        'id_kh' => Auth::user()->id,
                        'tong_tien' => 0,
                        'phan_cap' => $phan_cap,
                        'status' => 0,
                        'ma_hoa_don' => time(),
                        'ho_ten' => $so_dia_chi->hotenkh,
                        'sdt_kh' => $so_dia_chi->sdtkh,
                        'dia_chi_giao' => $so_dia_chi->dia_chi . ',' . $so_dia_chi->phuongxa . ',' . $so_dia_chi->quanhuyen . ',' . $so_dia_chi->tinhthanh,
                    ]);
                }
                foreach ($request->soluong as $sp => $sl) {
                    $gia = SanPhamGiaModel::where('id_sp', '=', $sp)->get()->first();
                    if ($gia->gia_km > 0) {
                        $gia_sp = $gia->gia_km;
                        $thanh_tien = ($gia_sp * $sl);
                    } else {
                        $gia_sp = $gia->gia_goc;
                        $thanh_tien = ($gia_sp * $sl);
                    }
                    HoaDonChiTietModel::create([
                        'id_hoa_don' => $hoadon->id,
                        'id_sp' => $sp,
                        'sl_mua' => $sl,
                        'gia_sp' => $gia_sp,
                        'thanh_tien' => $thanh_tien,
                    ]);
                }
                $hoadon->tong_tien = HoaDonChiTietModel::where('id_hoa_don', $hoadon->id)->sum('thanh_tien');
                $hoadon->save();
                Session::flash('clear_session', 1);
                return redirect(route('XemDH'))->with('success', 'Đặt hàng thành công !');

            } else {
                return redirect('user/login')->with('error', 'Vui lòng đăng nhập trước khi đặt hàng !');
            }
        }
    }

    // trang sản phẩm theo danh mục
    public function sanphamdanhmuc($id)
    {
        $data = DanhMucSanPhamModel::all();
        $sanpham = SanPhamModel::join('san_pham_gia', 'san_pham_gia.id_sp', '=', 'san_pham.id')
            ->join('san_pham_danh_muc', 'san_pham_danh_muc.id', '=', 'san_pham.id_danh_muc')
            ->join('users', 'users.id', '=', 'san_pham.id_gian_hang')
            ->join('users_gian_hang', 'users.id', '=', 'users_gian_hang.user_id')
            ->where('san_pham_danh_muc.id', '=', $id)
            ->where('san_pham.status', '<>', 0)
            ->select([
                'san_pham.id as id_sp',
                'san_pham.sp_ten as ten_sp',
                'san_pham.sp_image as image_sp',
                'san_pham_gia.gia_goc as gia_goc_sp',
                'san_pham_gia.gia_km as gia_km_sp',
                'san_pham_danh_muc.dm_ten as dm_sp',
                'users_gian_hang.gh_ten as gh_sp',
            ]);
        $sanpham = $sanpham->paginate(8);
        $danhmuc = DanhMucSanPhamModel::where('id', $id)->first()->dm_ten;
//        dd($danhmuc);
//        dd($sanpham);
        return view('userlayouts.sanpham.typeproduct', compact('danhmuc', 'sanpham', 'data'));
    }

    public function singelproduct($id)
    {
        $data = DanhMucSanPhamModel::all();
        $sanphamsigle = SanPhamModel::join('san_pham_gia', 'san_pham_gia.id_sp', '=', 'san_pham.id')
            ->join('san_pham_danh_muc', 'san_pham_danh_muc.id', '=', 'san_pham.id_danh_muc')
            ->join('users', 'users.id', '=', 'san_pham.id_gian_hang')
            ->join('users_gian_hang', 'users.id', '=', 'users_gian_hang.user_id')
            ->where('san_pham.id', '=', $id)
            ->where('san_pham.status', '<>', 0)
            ->select([
                'san_pham.id as id_sp',
                'san_pham.id_danh_muc as id_danh_muc_sp',
                'san_pham.sp_ten as ten_sp',
                'san_pham.sp_thuong_hieu as sp_thuong_hieu',
                'san_pham.sp_image as image_sp',
                'san_pham_gia.sp_description as description_sp',
                'san_pham_gia.gia_goc as gia_goc_sp',
                'san_pham_gia.gia_km as gia_km_sp',
                'san_pham_danh_muc.dm_ten as dm_sp',
                'users_gian_hang.gh_ten as gh_sp',
                'users_gian_hang.user_id as gh_id',
            ])->first()->toArray();
        $sanpham = SanPhamModel::join('san_pham_gia', 'san_pham_gia.id_sp', '=', 'san_pham.id')
            ->join('san_pham_danh_muc', 'san_pham_danh_muc.id', '=', 'san_pham.id_danh_muc')
            ->join('users', 'users.id', '=', 'san_pham.id_gian_hang')
            ->join('users_gian_hang', 'users.id', '=', 'users_gian_hang.user_id')
            ->where('san_pham.id_danh_muc', '=', $sanphamsigle['id_danh_muc_sp'])
            ->where('san_pham.id', '<>', $id)
            ->where('san_pham.status', '<>', 0)
            ->where('users.active', '=', 1)
            ->select([
                'san_pham.id as id_sp',
                'san_pham.sp_ten as ten_sp',
                'san_pham.sp_image as image_sp',
                'san_pham_gia.gia_goc as gia_goc_sp',
                'san_pham_gia.gia_km as gia_km_sp',
                'san_pham_danh_muc.dm_ten as dm_sp',
                'users_gian_hang.gh_ten as gh_sp',
            ]);
        $sanpham = $sanpham->paginate(4);
        return view('userlayouts.sanpham.singleproduct', compact('sanpham', 'danhmuc', 'sanphamsigle', 'data'));
    }

    // về chúng tôi
    public function about()
    {
        $data = DanhMucSanPhamModel::all();
        return view('userlayouts.about', compact('data'));
    }

    // services.blade.php
    public function services()
    {
        $data = DanhMucSanPhamModel::all();
        return view('userlayouts.services', compact('data'));
    }

    // secret
    public function secret()
    {
        return view('userlayouts.secret', compact('data'));
    }

    // đổi mật khẩu
    public function changePassword()
    {
        return view('userlayouts.changepassword');
    }
}
