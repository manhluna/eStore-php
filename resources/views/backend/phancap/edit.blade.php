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
                                <li class="breadcrumb-item active">Cập nhật phân cấp hoa hồng</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Quản Lý Hoa Hồng</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <form method="POST" action="{{ route('pchh.update',$pc->id) }}">
                                @csrf
                                <div class="form-group">
                                    <label>Số cấp</label>
                                    <input type="number" name="so_cap" value="{{ $pc->so_cap }}" class="form-control" required="" placeholder="Nhập số cấp hoa hồng"/>
                                </div>
                                <div class="form-group">
                                    <label>Tỉ lệ</label>
                                    <input type="number" name="ti_le" value="{{ $pc->ti_le }}" class="form-control" required="" placeholder="Tỉ lệ chia phần %"/>
                                </div>
                                <div class="form-group">
                                    <div>
                                        <button type="submit" class="btn btn-success waves-effect waves-light">Cập nhật</button>
                                        <a href="{{ url('phan-cap-hoa-hong') }}" class="btn btn-info waves-effect m-l-5">Quay lại</a>
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