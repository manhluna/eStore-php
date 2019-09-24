{{--
    - Danh Mục Sản Phẩm
--}}
<div class="w3l_banner_nav_left">
    <nav class="navbar nav_bottom">
        <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
            <ul class="nav navbar-nav nav_1">
                <li><a style="color: red"><b>Danh Mục Sản Phẩm</b></a></li>
                @foreach($data as $val)
                    <li>
                        <a href="{{ route('sanphamdanhmuc',$val->id) }}">{{ $val->dm_ten }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </nav>
</div>