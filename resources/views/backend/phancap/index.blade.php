@extends('adminlayouts.index')
@section('content')
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="btn-group pull-right">
                            <ol class="breadcrumb hide-phone p-0 m-0">
                                <li class="breadcrumb-item">Quản Lý Hoa Hồng</li>
                                <li class="breadcrumb-item active">danh sách phân cấp hoa hồng</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Quản Lý Hoa Hồng</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <a href="{{ route('pchh.create') }}" style="float: right"
                               class="btn btn-outline-primary waves-effect waves-light">Thêm mới</a>
                            <h4 class="mt-0 header-title">Danh Sách Phân Cấp Hoa Hồng</h4>
                            <table style="text-align: center" id="datatable" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Số Cấp</th>
                                    <th>Tỉ Lệ %</th>
                                    <th>Trạng Thái</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $val)
                                    <tr>
                                        <td>{{ $val->stt }}</td>
                                        <td>{{ $val->so_cap }}</td>
                                        <td>{{ $val->ti_le }} %</td>
                                        @if($val->status == 1)
                                            <td style="color: #00ca6d">Đang Mở</td>
                                        @else
                                            <td style="color: red">Đang Tắt</td>
                                        @endif
                                        <td>
                                            @if($val->status == 0)
                                                <a href="{{ route('pchh.status',$val->id) }}" class="btn btn-outline-dark waves-effect waves-light"
                                                   onclick="return confirm('Cảnh báo ! Bật phân cấp này thì phân cấp đang bật sẽ tắt !')">
                                                    <i class="mdi mdi-folder-lock-open"></i>Mở
                                                </a>
                                            @else
                                                <a disabled="" class="btn btn-secondary waves-effect waves-light"><i class="mdi mdi-folder-lock-open"></i>Mở</a>
                                            @endif
                                            <a href="{{ route('pchh.edit',$val->id) }}" class="btn btn-outline-primary waves-effect waves-light"
                                               onclick="return confirm('Bạn muốn cập nhật phân cấp hoa hồng này ?')">
                                                <i class="mdi mdi-tooltip-edit"></i>Sửa
                                            </a>
                                            <a href="{{ route('pchh.destroy',$val->id) }}" class="btn btn-outline-danger waves-effect waves-light"
                                               onclick="return confirm('Bạn có chắc chắn xóa phân cấp hoa hồng này ?')">
                                                <i class="mdi mdi-delete-sweep"></i> Xóa
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection