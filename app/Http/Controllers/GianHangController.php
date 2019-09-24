<?php

namespace App\Http\Controllers;

use App\DanhMucSanPhamModel;
use App\GianHangUserModel;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\SanPhamAddRequest;
use App\Http\Requests\SanPhamEditRequest;
use App\SanPhamGiaModel;
use App\SanPhamModel;
use App\User;
use App\UsersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GianHangController extends Controller
{
    // view đăng ký gian hàng
    public function resgiterGH()
    {
        $data = DanhMucSanPhamModel::all();
        return view('userlayouts.gianhang.resgiter', compact('data'));
    }

    // lưu đăng ký gian hàng
    public function regesterStore(RegisterRequest $request)
    {
        $pas = $request->get('password');
        $pasre = $request->get('repassword');
        if ($pas == $pasre) {
            $user = UsersModel::create([
                'phone' => $request->get('phone'),
                'password' => Hash::make($pas),
                'email' => $request->get('email'),
                'role' => 1,
                'code' => 'Không có',
            ]);
            GianHangUserModel::create([
                'user_id' => $user->id,
                'gh_ten' => $request->get('gh_ten'),
                'gh_dia_chi' => $request->get('gh_dia_chi'),
                'gh_tien_loi_nhuan' => 0,
            ]);
            return redirect('user/login')->with('success', 'Đăng ký thành công !');
        } else {
            return redirect('gian-hang/resgiter')->with('error', 'Nhập lại mật khẩu không chính xác !');
        }
    }

    // view danh sách sản phẩm của gian hàng
    public function qlsanpham(Request $req)
    {
        $data = SanPhamModel::leftjoin('san_pham_danh_muc', 'san_pham_danh_muc.id', '=', 'san_pham.id_danh_muc')
            ->leftjoin('san_pham_gia', 'san_pham_gia.id_sp', '=', 'san_pham.id')
            ->where('san_pham.id_gian_hang', '=', Auth::user()->id)
            ->orderby('san_pham.created_at', 'asc')
            ->select([
                'san_pham.id as id',
                'san_pham.sp_ten',
                'san_pham.sp_image',
                'san_pham.status',
                'san_pham.sp_thuong_hieu',
                'san_pham_danh_muc.dm_ten',
            ]);
        if ($req->has('q') && $req->get('q') != '')
            $data = $data->where(function ($q) use ($req) {
                return $q->where('sp_ten', 'like', '%' . $req->get('q') . '%');
            });
        if ($req->has('k') && $req->get('k') != '') {
            $data = $data->where('san_pham_danh_muc.id', $req->get('k'));
        }
        $data = $data->paginate(10);
        $count = count($data);
        for ($i = 0; $i < $count; $i++) {
            $data[$i]['stt'] = $i + 1;
        }
//        dd($data);
        return view('userlayouts.gianhang.qlsanpham', compact('data'));
    }

    // view thêm mới sản phẩm của gia hàng
    public function tmsanpham()
    {
        $danhmuc = DanhMucSanPhamModel::all();
        return view('userlayouts.gianhang.tmsanpham', compact('danhmuc'));
    }

    // dữ liệu của thêm mới
    public function tmsanphamStore(SanPhamAddRequest $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $new_file_name = time() . '.' . $file->getClientOriginalExtension();
            $file->move('upload', $new_file_name);
            $sp_image = $new_file_name;
        } else {
            $sp_image = "";
        }
        $sanpham = SanPhamModel::create([
            'id_gian_hang' => Auth::user()->id,
            'id_danh_muc' => $request->dm_ten,
            'sp_ten' => $request->get('sp_ten'),
            'sp_image' => $sp_image,
            'sp_thuong_hieu' => $request->get('sp_thuong_hieu'),
            'status' => 0,
        ]);
        SanPhamGiaModel::create([
            'id_sp' => $sanpham->id,
            'gia_goc' => 0,
            'gia_km' => 0,
        ]);
        return redirect('gian-hang/quan-ly-san-pham')->with('success', 'Thêm thành công !');
    }

    // sửa sản phẩm
    public function cnsanpham($id)
    {
        $danhmuc = DanhMucSanPhamModel::all();
        $data = SanPhamModel::join('san_pham_gia', 'san_pham_gia.id_sp', '=', 'san_pham.id')
            ->where('san_pham.id', '=', $id)
            ->where('san_pham.id_gian_hang', '=', Auth::user()->id)
            ->select([
                'san_pham.id as sp_id',
                'san_pham.id_gian_hang',
                'san_pham.id_danh_muc',
                'san_pham.sp_ten',
                'san_pham.sp_image',
                'san_pham_gia.id_sp',
                'san_pham_gia.gia_goc',
                'san_pham_gia.gia_km',
                'san_pham.sp_thuong_hieu',
            ])->get()->first();
//        dd($data);
        return view('userlayouts.gianhang.cnsanpham', compact('danhmuc', 'data'));
    }

    // dữ liệu cập nhật
    public function cnsanphamStore(SanPhamEditRequest $request, $id)
    {
        $sp_image_old = SanPhamModel::where('id', $id)->first()->sp_image;
        if ($request->hasFile('file')) {
            if ($sp_image_old != '' && file_exists(public_path('upload/' . $sp_image_old))) {
                unlink(public_path('upload/' . $sp_image_old));
            }
            $file = $request->file('file');
            $new_file_name = time() . '.' . $file->getClientOriginalExtension();
            $file->move('upload', $new_file_name);
            $sp_image = $new_file_name;
        } else {
            $sp_image = $sp_image_old;
        }
        SanPhamModel::where('id', $id)
            ->update([
                'id_danh_muc' => $request->dm_ten,
                'sp_ten' => $request->get('sp_ten'),
                'sp_thuong_hieu' => $request->get('sp_thuong_hieu'),
                'sp_image' => $sp_image,
            ]);
        return redirect('gian-hang/quan-ly-san-pham')->with('success', 'Cập nhật thành công !');
    }

    // cài đặt sản phẩm
    public function caidatSanPham($id)
    {
        $danhmuc = DanhMucSanPhamModel::all();
        $data = SanPhamModel::join('san_pham_gia', 'san_pham_gia.id_sp', '=', 'san_pham.id')
            ->where('san_pham.id', '=', $id)
            ->where('san_pham.id_gian_hang', '=', Auth::user()->id)
            ->select([
                'san_pham.id as sp_id',
                'san_pham.id_gian_hang',
                'san_pham.id_danh_muc',
                'san_pham.sp_ten',
                'san_pham.sp_image',
                'san_pham_gia.id_sp',
                'san_pham_gia.gia_goc',
                'san_pham_gia.gia_km',
                'san_pham_gia.sp_description',
            ])->get()->first();
//        dd($data);
        return view('userlayouts.gianhang.caidatsanpham', compact('danhmuc', 'data'));
    }

    public function caidatStore(Request $request, $id)
    {
        SanPhamModel::where('id', $id)
            ->update([
                'status' => 1,
            ]);
        SanPhamGiaModel::where('id_sp', $id)
            ->update([
                'gia_goc' => $request->get('gia_goc'),
                'gia_km' => $request->get('gia_km'),
                'sp_description' => $request->get('sp_description'),
            ]);
        return redirect('gian-hang/quan-ly-san-pham')->with('success', 'Cài đặt thành công !');
    }

    // xóa sản phẩm của gia hàng
    public function xsanphamDestroy($id)
    {
        SanPhamModel::where('id', $id)->update([
            'status' => 0,
        ]);
        SanPhamGiaModel::where('id_sp', $id)->update([
            'gia_goc' => 0,
            'gia_km' => 0,
        ]);
        return redirect('gian-hang/quan-ly-san-pham')->with('success', 'Sản phẩm không còn bán nữa !');
    }

    // xem thong tin sản phẩm
    public function xemSanPham($id)
    {
        $danhmuc = DanhMucSanPhamModel::all();
        $data = SanPhamModel::join('san_pham_gia', 'san_pham_gia.id_sp', '=', 'san_pham.id')
            ->where('san_pham.id', '=', $id)
            ->where('san_pham.id_gian_hang', '=', Auth::user()->id)
            ->select([
                'san_pham.id as sp_id',
                'san_pham.id_gian_hang',
                'san_pham.id_danh_muc',
                'san_pham.sp_ten',
                'san_pham.sp_thuong_hieu',
                'san_pham.sp_image',
                'san_pham_gia.id_sp',
                'san_pham_gia.gia_goc',
                'san_pham_gia.gia_km',
                'san_pham_gia.sp_description',
            ])->get()->first();
//        dd($data);
        return view('userlayouts.gianhang.xemsanpham', compact('danhmuc', 'data'));
    }

    // trang thông tin của gian hàng
    public function profileGianHang()
    {
        $data = User::join('users_gian_hang', 'users_gian_hang.user_id', '=', 'users.id')
            ->where('users.id', Auth::user()->id)
            ->select([
                'users.id',
                'users.phone',
                'users.email',
                'users_gian_hang.gh_ten',
                'users_gian_hang.gh_dia_chi',
                'users_gian_hang.gh_tien_loi_nhuan',
            ])
            ->get()
            ->first()
            ->toArray();
//        dd($data);
        return view('userlayouts.gianhang.profile', compact('data'));
    }

    public function profileEdit()
    {
        return view('userlayouts.gianhang.profileupdate');
    }

    public function profileUpdate(Request $request)
    {
//        dd($request->all());
        GianHangUserModel::where('user_id', '=', Auth::user()->id)
            ->update([
                'gh_ten' => $request->get('ten_gh'),
                'gh_dia_chi' => $request->get('dia_chi_gh'),
            ]);
        UsersModel::where('id', '=', Auth::user()->id)
            ->update([
                'phone' => $request->get('phone'),
                'email' => $request->get('email_gh'),
            ]);
        return redirect(route('logout'))->with('success', 'Vui lòng đăng nhập lại !');
    }
}
