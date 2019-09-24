<?php

namespace App\Http\Controllers;

use App\DanhMucSanPhamModel;
use App\HoaDonModel;
use App\HoaHongKhachHangLogModel;
use App\HoaHongKhachHangModel;
use App\Http\Requests\SoDiaChiRequest;
use App\Http\Requests\UserAddRequest;
use App\NguoiDungModel;
use App\PhuongXaModel;
use App\QuanHuyenModel;
use App\SanPhamModel;
use App\SoDiaChiModel;
use App\TinhThanhModel;
use App\TongTienHoaHongModel;
use App\UsersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // dữ liệu lưu thông tin người dùng
    public function registerNDstore(UserAddRequest $request)
    {
//        dd($request->all());
        $pas = $request->get('password');
        $pasre = $request->get('repassword');
        $code = strtoupper(uniqid());
        $macode = strtoupper($request->get('ma_code_cha'));
        $ma_code_cha = UsersModel::where('code', $macode)->first();
//        dd($ma_code_cha);
        if ($ma_code_cha == null) {
            $macodecha = 0;
        } else {
            $macodecha = $ma_code_cha->id;
        }
        if ($pas == $pasre) {
            $user = UsersModel::create([
                'phone' => $request->get('phone'),
                'password' => Hash::make($pas),
                'email' => $request->get('email'),
                'role' => 2,
                'code' => $code,
            ]);
            NguoiDungModel::create([
                'user_id' => $user->id,
                'kh_ten' => $request->get('kh_ten'),
                'kh_gioi_tinh' => $request->get('kh_gioi_tinh'),
                'kh_ngay_sinh' => $request->get('kh_ngay_sinh'),
            ]);
            HoaHongKhachHangModel::create([
                'user_id' => $user->id,
                'ma_code_cha' => $macodecha,
                'tien_hoa_hong' => 0,
            ]);
            TongTienHoaHongModel::create([
                'id_khachhang' => $user->id,
                'tien_da_lanh' => 0,
            ]);
            if ($macodecha == 0) {
                return redirect('user/login')->with('success', 'Đăng ký thành công !')
                    ->with('error', 'Mã người giới thiệu không tồn tại, vui lòng cập nhật lại trong thông tin cá nhân !');
            } else {
                return redirect('user/login')->with('success', 'Đăng ký thành công !');
            }
        } else {
            return redirect('user/login')->with('error', 'Nhập lại mật khẩu không chính xác !');
        }
    }

    // trang cá nhân người dùng
    public function profileCaNhan()
    {
        $user = UsersModel::join('users_profile', 'users_profile.user_id', '=', 'users.id')
            ->join('hoa_hong_khach_hang', 'hoa_hong_khach_hang.user_id', '=', 'users.id')
            ->where('users.role', '=', 2)
            ->where('users.id', '=', Auth::user()->id)
            ->select([
                'users.id as id',
                'users.phone as phone',
                'users.email as email',
                'users.code as code',
                'users_profile.kh_ten as ten',
                'users_profile.kh_gioi_tinh as gioitinh',
                'users_profile.kh_ngay_sinh as ngaysinh',
                'users_profile.kh_dia_chi as diachi',
                'users_profile.kh_cmnd as cmnd',
                'users_profile.kh_ngay_cap as ngaycap',
                'users_profile.kh_image as image',
                'hoa_hong_khach_hang.ma_code_cha as codecha',
                'hoa_hong_khach_hang.tien_hoa_hong as tienhoahong',
            ])->get()->first()->toArray();
        return view('userlayouts.nguoidung.profilecanhan', compact('user'));
    }

    // trang sổ địa chỉ
    public function SoDiaChi()
    {
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
        $count = count($dia_chi);
        for ($i = 0; $i < $count; $i++) {
            $dia_chi[$i]['stt'] = $i + 1;
        }
//        dd($dia_chi->toArray());
        return view('userlayouts.nguoidung.sodiachi', compact('dia_chi'));
    }

    // thêm sổ địa chỉ
    public function themSoDiaChi()
    {
        $tinhthanh = TinhThanhModel::all();
        return view('userlayouts.nguoidung.themsodiachi', compact('tinhthanh', 'quanhuyen'));
    }

    // ajax quan huỵen
    public function ajaxQuanHuyen(Request $request)
    {
        $id_tinhthanh = $request->get('id');
        $quan_huyen = QuanHuyenModel::where('id_tinhthanh', $id_tinhthanh)->get();
        return $quan_huyen;
    }

    // ajax quan huỵen
    public function ajaxPhuongXa(Request $request)
    {
        $id_quanhuyen = $request->get('id');
        $phuong_xa = PhuongXaModel::where('id_quanhuyen', $id_quanhuyen)->get();
        return $phuong_xa;
    }

    public function ThemDiaChiStore(SoDiaChiRequest $request)
    {
//        dd($request->all());
        SoDiaChiModel::create([
            'id_kh' => Auth::user()->id,
            'ho_ten' => $request->get('ten_kh'),
            'sdt_kh' => $request->get('sdt_kh'),
            'dia_chi' => $request->get('dia_chi'),
            'id_tinhthanh' => $request->get('tinhthanh'),
            'id_quanhuyen' => $request->get('quanhuyen'),
            'id_phuongxa' => $request->get('phuongxa'),
        ]);
        return redirect(route('SoDiaChi'));
    }

    public function ThemDiaChiEdit($id)
    {
        $dia_chi = SoDiaChiModel::leftjoin('tinhthanh', 'tinhthanh.id', 'so_dia_chi.id_tinhthanh')
            ->leftjoin('quanhuyen', 'quanhuyen.id', 'so_dia_chi.id_quanhuyen')
            ->leftjoin('phuongxa', 'phuongxa.id', 'so_dia_chi.id_phuongxa')
            ->where('so_dia_chi.id', '=', $id)
            ->select([
                'so_dia_chi.id as iddiachi',
                'so_dia_chi.ho_ten as hotenkh',
                'so_dia_chi.sdt_kh as sdtkh',
                'so_dia_chi.dia_chi as dia_chi',
                'so_dia_chi.id_tinhthanh',
                'so_dia_chi.id_quanhuyen',
                'so_dia_chi.id_phuongxa',
                'tinhthanh.tinhthanh as tinhthanh',
                'quanhuyen.quanhuyen as quanhuyen',
                'phuongxa.phuongxa as phuongxa',
            ])
            ->get()->first();
//        dd($dia_chi);
        $tinhthanh = TinhThanhModel::all();
        $quanhuyen = QuanHuyenModel::all();
        $phuongxa = PhuongXaModel::all();
        return view('userlayouts.nguoidung.sodiachiedit', compact('dia_chi', 'tinhthanh', 'quanhuyen', 'phuongxa'));
    }

    public function ThemDiaChiUpdate(SoDiaChiRequest $request, $id)
    {
        SoDiaChiModel::where('so_dia_chi.id', '=', $id)
            ->update([
                'ho_ten' => $request->get('ten_kh'),
                'sdt_kh' => $request->get('sdt_kh'),
                'dia_chi' => $request->get('dia_chi'),
                'id_tinhthanh' => $request->get('tinhthanh'),
                'id_quanhuyen' => $request->get('quanhuyen'),
                'id_phuongxa' => $request->get('phuongxa'),
            ]);
        return redirect(route('SoDiaChi'));
    }

    public function XemDH()
    {
        $order_cd = HoaDonModel::join('users', 'users.id', '=', 'hoa_don.id_kh')
            ->join('users_profile', 'users_profile.user_id', '=', 'hoa_don.id_kh')
            ->where('hoa_don.status', '=', 0)
            ->where('users.id', '=', Auth::user()->id)
            ->select([
                'hoa_don.id as idhoadon',
                'hoa_don.ma_hoa_don as mahoadon',
                'hoa_don.ho_ten as tennguoinhan',
                'hoa_don.sdt_kh as sdtnguoinhan',
                'hoa_don.tong_tien as tongtien',
                'hoa_don.dia_chi_giao as diachigiao',
                'users_profile.kh_ten as tennguoidat',
            ])
            ->get();
        $count = count($order_cd);
        for ($i = 0; $i < $count; $i++) {
            $order_cd[$i]['stt'] = $i + 1;
        }
        $sl_order_cd = count($order_cd);

        // hoa don van chuyen
        $order_vc = HoaDonModel::join('users', 'users.id', '=', 'hoa_don.id_kh')
            ->join('users_profile', 'users_profile.user_id', '=', 'hoa_don.id_kh')
            ->where('hoa_don.status', '=', 1)
            ->where('users.id', '=', Auth::user()->id)
            ->select([
                'hoa_don.id as idhoadon',
                'hoa_don.ma_hoa_don as mahoadon',
                'hoa_don.ho_ten as tennguoinhan',
                'hoa_don.sdt_kh as sdtnguoinhan',
                'hoa_don.tong_tien as tongtien',
                'hoa_don.dia_chi_giao as diachigiao',
                'users_profile.kh_ten as tennguoidat',
            ])
            ->get();
        $count = count($order_vc);
        for ($i = 0; $i < $count; $i++) {
            $order_vc[$i]['stt'] = $i + 1;
        }

        // hoa don hon thành
        $order_ht = HoaDonModel::join('users', 'users.id', '=', 'hoa_don.id_kh')
            ->join('users_profile', 'users_profile.user_id', '=', 'hoa_don.id_kh')
            ->where('hoa_don.status', '=', 2)
            ->where('users.id', '=', Auth::user()->id)
            ->select([
                'hoa_don.id as idhoadon',
                'hoa_don.ma_hoa_don as mahoadon',
                'hoa_don.ho_ten as tennguoinhan',
                'hoa_don.sdt_kh as sdtnguoinhan',
                'hoa_don.tong_tien as tongtien',
                'hoa_don.dia_chi_giao as diachigiao',
                'users_profile.kh_ten as tennguoidat',
            ])
            ->get();
        $count = count($order_ht);
        for ($i = 0; $i < $count; $i++) {
            $order_ht[$i]['stt'] = $i + 1;
        }
        // hoa don da huy
        $order_h = HoaDonModel::join('users', 'users.id', '=', 'hoa_don.id_kh')
            ->join('users_profile', 'users_profile.user_id', '=', 'hoa_don.id_kh')
            ->where('hoa_don.status', '=', 3)
            ->where('users.id', '=', Auth::user()->id)
            ->select([
                'hoa_don.id as idhoadon',
                'hoa_don.ma_hoa_don as mahoadon',
                'hoa_don.ho_ten as tennguoinhan',
                'hoa_don.sdt_kh as sdtnguoinhan',
                'hoa_don.tong_tien as tongtien',
                'hoa_don.dia_chi_giao as diachigiao',
                'users_profile.kh_ten as tennguoidat',
            ])
            ->get();
        $count = count($order_h);
        for ($i = 0; $i < $count; $i++) {
            $order_h[$i]['stt'] = $i + 1;
        }
        return view('userlayouts.nguoidung.thongtindonhang', compact('order_cd', 'order_ht', 'sl_order_cd', 'order_vc', 'order_h'));
    }

    // huy hoa don
    public function HuyHDND($id)
    {
        HoaDonModel::where('id', $id)->update([
            'status' => 3
        ]);
        return redirect(route('XemDH'));

    }

    // cập nhật thông tin các nhân
    public function profileEdit()
    {
        return view('userlayouts.nguoidung.profileupdate');
    }

    // cập nhật thông tin khách hàng
    public function profileUppdate(Request $request)
    {
//        dd($request->all());
        $cha = $request->get('ma_code_cha');
        if (empty($cha)) {
            $id_cha = HoaHongKhachHangModel::where('user_id', '=', Auth::user()->id)->first()->ma_code_cha;
            HoaHongKhachHangModel::where('user_id', '=', Auth::user()->id)
                ->update([
                    'ma_code_cha' => $id_cha,
                ]);
        } else {

            $id_cha2 = UsersModel::where('code', '=', $cha)->first()->id;
            $id_cua_minh = UsersModel::where('id', '=', Auth::user()->id)->first()->id;
            if ($id_cha2 == $id_cua_minh) {
                HoaHongKhachHangModel::where('user_id', '=', Auth::user()->id)
                    ->update([
                        'ma_code_cha' => 0,
                    ]);
            } else {
                HoaHongKhachHangModel::where('user_id', '=', Auth::user()->id)
                    ->update([
                        'ma_code_cha' => $id_cha2,
                    ]);
            }
        }
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $new_file_name = time() . '.' . $file->getClientOriginalExtension();
            $file->move('imageKH', $new_file_name);
            $image_kh = $new_file_name;
        } else {
            $image_kh = NguoiDungModel::where('user_id', '=', Auth::user()->id)->first()->kh_image;
        }
        NguoiDungModel::where('user_id', '=', Auth::user()->id)
            ->update([
                'kh_ten' => $request->get('ten_kh'),
                'kh_gioi_tinh' => $request->get('gioi_tinh_kh'),
                'kh_ngay_sinh' => $request->get('ngay_sinh_kh'),
                'kh_dia_chi' => $request->get('dia_chi_kh'),
                'kh_cmnd' => $request->get('cmnd_kh'),
                'kh_ngay_cap' => $request->get('ngay_cap_kh'),
                'kh_image' => $image_kh,
            ]);
        UsersModel::where('id', '=', Auth::user()->id)
            ->update([
                'phone' => $request->get('phone'),
                'email' => $request->get('email_kh'),
            ]);
        return redirect(route('logout'))->with('success', 'Vui lòng đăng nhập lại !');
    }

    public function LichSu()
    {
        $tienhoahong = HoaHongKhachHangLogModel::where('user_id', '=', Auth::user()->id)->get();
        $count = count($tienhoahong);
        for ($i = 0; $i < $count; $i++) {
            $tienhoahong[$i]['stt'] = $i + 1;
        }
        return view('userlayouts.nguoidung.lichsu', compact('tienhoahong'));
    }
}
