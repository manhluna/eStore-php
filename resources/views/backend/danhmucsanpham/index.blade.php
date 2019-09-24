@extends('adminlayouts.index')
@section('content')
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="btn-group pull-right">
                            <ol class="breadcrumb hide-phone p-0 m-0">
                                <li class="breadcrumb-item">Quản Lý Danh Mục</li>
                                <li class="breadcrumb-item active">danh sách</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Quản Lý Danh Mục</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <a href="{{ route('dm.create') }}" style="float: right" class="btn btn-outline-primary waves-effect waves-light">Thêm mới</a>
                            <h4 class="mt-0 header-title">Danh Sách Danh Mục</h4>
                            <table style="text-align: center" class="table table-hover">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên Danh Mục Sản Phẩm</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $val)
                                    <tr>
                                        <td>{{ $val->stt }}</td>
                                        <td>{{ $val->dm_ten }}</td>
                                        <td>
                                            <a href="{{ route('dm.edit',$val->id) }}" class="btn btn-outline-primary waves-effect waves-light"
                                               onclick="return confirm('Bạn muốn cập nhật danh mục sản phẩm này ?')">
                                                <i class="mdi mdi-tooltip-edit"></i>Sửa
                                            </a>
                                            {{--<a href="{{ route('dm.destroy',$val->id) }}" class="btn btn-outline-danger waves-effect waves-light"--}}
                                               {{--onclick="return confirm('Bạn có chắc chắn xóa danh mục sản phẩm này ?')">--}}
                                                {{--<i class="mdi mdi-delete-sweep"></i> Xóa--}}
                                            {{--</a>--}}
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