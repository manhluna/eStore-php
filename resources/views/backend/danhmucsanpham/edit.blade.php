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
                                <li class="breadcrumb-item active">Cập nhật danh mục sản phẩm</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Quản Lý Danh Mục</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <form method="POST" action="{{ route('dm.update',$data->id) }}">
                                @csrf
                                <div class="form-group">
                                    <label>Tên Danh Mục</label>
                                    <input type="text" name="dm_ten" value="{{ $data->dm_ten }}" class="form-control" required="" placeholder="Nhập tên danh mục sản phẩm"/>
                                </div>
                                <div class="form-group">
                                    <div>
                                        <button type="submit" class="btn btn-success waves-effect waves-light">Cập nhật
                                        </button>
                                        <a href="{{ route('dm.index') }}" class="btn btn-info waves-effect m-l-5">Quay lại</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-3"></div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('form').parsley();
        });
    </script>
@endsection