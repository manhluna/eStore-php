<div class="agileits_header">
    <div class="w3l_offers">
        <a href="{{ url('user') }}">Hãy đến với chúng tôi !</a>
    </div>
    <div class="w3l_search">
        {!! Form::open(['method'=>'GET','class'=>'form-inline']) !!}
        <input type="text" name="q"
               value="{{\Illuminate\Support\Facades\Input::get('q','')}}"
               placeholder="Tìm kiếm sản phẩm...">
        <input type="submit" value=" ">
        {!! Form::close() !!}
    </div>
    <div class="product_list_header">
        <fieldset>
            <input type="submit" name="submit" value="Xem giỏ hàng" class="button" id="submitOrder"/>
        </fieldset>
        <script>
            $("#submitOrder").click(function () {
                GioHang();
            });
        </script>
    </div>
    <div class="w3l_header_right">
        <ul>
            <li class="dropdown profile_details_drop">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    @if(!empty(Auth::user()))
                        {{ Auth::user()->phone }}
                    @else
                    @endif<i class="fa fa-user" aria-hidden="true"></i>
                    <span class="caret"></span>
                </a>
                <div class="mega-dropdown-menu">
                    <div class="w3ls_vegetables">
                        <ul class="dropdown-menu drp-mnu">
                            @if(!empty(Auth::user()))
                                <li>
                                    <a href="{{ route('gh.profileGianHang') }}">
                                        <i class="fa fa-phone"></i>
                                        {{ Auth::user()->phone }}
                                    </a>
                                </li>
                                @if(Auth::user()->role == 1)
                                    <li>
                                        <a href="{{ route('gh.profileGianHang') }}">
                                            <i class="fa fa-user"></i> Profile
                                        </a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ route('profileCaNhan') }}">
                                            <i class="fa fa-user"></i> Profile
                                        </a>
                                    </li>
                                @endif
                                <li>
                                    <a href="{{ route('logout') }}"><i class="fa fa-sign-out"></i> Đăng xuất</a>
                                </li>
                            @else
                                <li><a href="{{ url('user/login') }}"><i class="fa fa-user"></i> Đăng nhập</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div class="w3l_header_right1">
        <h2><a href="{{ url('user/login') }}">Đăng ký ngay !</a></h2>
    </div>
    <div class="clearfix"></div>
</div>
<script>
    $(document).ready(function () {
        var navoffeset = $(".agileits_header").offset().top;
        $(window).scroll(function () {
            var scrollpos = $(window).scrollTop();
            if (scrollpos >= navoffeset) {
                $(".agileits_header").addClass("fixed");
            } else {
                $(".agileits_header").removeClass("fixed");
            }
        });
    });
</script>
@include('userlayouts.modal');
<div class="logo_products">
    <div class="container">
        <div class="w3ls_logo_products_left">
            <h1><a href="{{ url('user') }}"><span>Shop</span> LVTN</a></h1>
        </div>
        <div class="w3ls_logo_products_left1">
            <ul class="special_items">
                @if(!empty(Auth::user()) && (Auth::user()->role == 1))
                    <li>
                        <a href="{{ route('gh.qlsanpham') }}">Quản lý sản phẩm</a><i>/</i>
                    </li>
                @else
                @endif
                <li><a href="{{ route('about') }}">Về chúng tôi</a><i>/</i></li>
                <li><a href="{{ route('services') }}">Dịch vụ</a></li>
            </ul>
        </div>
        <div class="w3ls_logo_products_left1">
            <ul class="phone_email">
                <li><i class="fa fa-phone" aria-hidden="true"></i>(+84) 972 705 703</li>
                <li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:nqkhanh@gmail.com">nqkhanh@gmail.com</a>
                <li><i class="fa fa-facebook" aria-hidden="true"></i><a href="https://www.facebook.com/khanh1996ct">https://www.facebook.com/khanh1996ct</a>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
@include('userlayouts.modal');
<script>
    function getCart(id, name, gia_km, gia_goc) {
        var item = $('#item');
        var sp = sessionStorage.getItem('list_order');
        sp = JSON.parse(sp);
        if (sp != undefined && sp != []) {
            html = '';
            sp.forEach(function (element) {
                html = html +
                    '<div id="item' + element.id + '"> ' +
                    '<div class="row">' +
                    '<div class="col-sm-12" style="font-size: 14px">' +
                    '<div class="col-sm-7">' +
                    '<p style="font-weight: bold" >' + element.name + '</p>\n' +
                    '<p style="font-weight: 300;color: #999"> Đơn giá: đ:' + Number(element.gia).toLocaleString('en') + '</p>\n' +
                    '</div>' +
                    '<div class="col-sm-2">' +
                    '<input style="padding: 0px;width: 60px;border-radius: 36px;padding-left: 22px;"name=soluong[] id="sl_' + element.id + '" class="form-control" type="number" placeholder="nhập số lượng" value="' + element.soluong + '">\n' +
                    '</div>' +
                    '<div class="col-sm-2">' +
                    '<p id="tt_' + element.id + '">đ:' + Number(element.thanhtien).toLocaleString('en') + '</p>' +
                    '</div>' +
                    '<div class="col-sm-1">' +
                    '<button  id="del_' + element.id + '" onclick="deleteItem(' + element.id + ')" type="button" style="color: white;background-color: red" class="minicart-remove">x</button>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<input type="hidden" name=id[] value="' + element.id + '"> ' +
                    '<input type="hidden" name=name[] value="' + element.name + '"> ' +
                    '<input type="hidden" name=gia[] value="' + element.gia + '"> ' +
                    '<hr>' +
                    '</div> ';
                item.html(html);
            });
            sp.forEach(function (element) {
                $('#sl_' + element.id).on('input', function () {
                    var tongtien = $('#sl_' + element.id).val() * element.gia;
                    // var newtongtien= tongtien.toLocaleString('en');
                    $('#tt_' + element.id).html('đ:' + tongtien);
                    sp.find(function (element2) {
                        if (element2.id == id) {
                            element2.soluong = $('#sl_' + element.id).val();
                            element2.thanhtien = $('#sl_' + element.id).val() * element.gia;
                        }
                    });
                    sessionStorage.setItem('list_order', JSON.stringify(sp));
                });
            });
        }
        else {
            sp = [];
        }
        var gia = gia_km == 0 ? gia_goc : gia_km;
        if ($('#sl_' + id).val() != undefined) {
            var temp = $('#sl_' + id).val();
            temp++;
            $('#sl_' + id).val(temp);
            var tongtien = $('#sl_' + id).val() * gia;
            // var newtongtien = tongtien.toLocaleString('en');
            $('#tt_' + id).html('đ:' + tongtien);
            sp.find(function (element) {
                if (element.id == id) {
                    Number(element.soluong++);
                    element.thanhtien = element.soluong * element.gia;
                }
            });
            sessionStorage.setItem('list_order', JSON.stringify(sp));
        }
        else {
            html = "";
            html =
                '<div id="item' + id + '"> ' +
                '<div class="row">' +
                '<div class="col-sm-12" style="font-size: 14px">' +
                '<div class="col-sm-7">' +
                '<p style="font-weight: bold" > ' + name + '</p>\n' +
                '<p style="font-weight: 300;color: #999"> Đơn giá:đ:' + Number(gia).toLocaleString('en') + '</p>\n' +
                '</div>' +
                '<div class="col-sm-2">' +
                '<input style="padding: 0px;width: 60px;border-radius: 36px;padding-left: 22px;"name=soluong[] id="sl_' + id + '" class="form-control" type="number" placeholder="nhập số lượng" value="1">\n' +
                '</div>' +
                '<div class="col-sm-2">' +
                '<p id="tt_' + id + '">đ:' + Number(gia).toLocaleString('en') + '</p>' +
                '</div>' +
                '<div class="col-sm-1">' +
                '<button id="del_' + id + '" onclick="deleteItem(' + id + ')" type="button" style="color: white;background-color: red" class="minicart-remove">x</button>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<input type="hidden" name=id[] value="' + id + '"> ' +
                '<input type="hidden" name=name[] value="' + name + '"> ' +
                '<input type="hidden" name=gia[] value="' + gia + '"> ' +
                '<hr>' +
                '</div> ';
            item.append(html);

            $('#sl_' + id).on('input', function () {
                var tongtien = $('#sl_' + id).val() * gia;
                // var newtongtien = tongtien.toLocaleString('en');
                $('#tt_' + id).html('đ:' + tongtien);
                sp.find(function (element) {
                    if (element.id == id) {
                        element.soluong = $('#sl_' + id).val();
                        element.thanhtien = $('#sl_' + id).val() * gia;
                    }
                });
                sessionStorage.setItem('list_order', JSON.stringify(sp));
            });
            sp.push({
                id: id,
                name: name,
                soluong: 1,
                gia: gia,
                thanhtien: gia
            });
            sessionStorage.setItem('list_order', JSON.stringify(sp));

        }
        $('#orderModal').modal('show');

    }

    function deleteItem(id) {
        var sp = sessionStorage.getItem('list_order');
        sp = JSON.parse(sp);
        if (sp != [] && sp != undefined) {
            //Xoa mang
            var index = sp.map(x => {
                return x.id;
            }).indexOf(id);
            sp.splice(index, 1);
            sessionStorage.setItem('list_order', JSON.stringify(sp));
            //Xoa giao dien
            $('#item' + id).remove();
        }
    }
</script>
<script>
    function GioHang() {
        $('#item').html('');
        var item = $('#item');
        var sp = sessionStorage.getItem('list_order');
        sp = JSON.parse(sp);
        if (sp != undefined && sp != []) {
            html = '';
            sp.forEach(function (element) {
                console.log(element);
                html = html +
                    '<div id="item' + element.id + '"> ' +
                    '<div class="row">' +
                    '<div class="col-sm-12" style="font-size: 14px">' +
                    '<div class="col-sm-7">' +
                    '<p style="font-weight: bold" >' + element.name + '</p>\n' +
                    '<p style="font-weight: 300;color: #999"> Đơn giá: đ:' + Number(element.gia).toLocaleString('en') + '</p>\n' +
                    '</div>' +
                    '<div class="col-sm-2">' +
                    '<input style="padding: 0px;width: 60px;border-radius: 36px;padding-left: 22px;" name=soluong[] id="sl_' + element.id + '" class="form-control" type="number" placeholder="nhập số lượng" value="' + element.soluong + '">\n' +
                    '</div>' +
                    '<div class="col-sm-2">' +
                    // '<p id="tt_' + element.id + '">đ:' + Number(element.thanhtien).toLocaleString('en') + '</p>' +
                    '<p id="tt_' + element.id + '">đ:' + element.thanhtien + '</p>' +
                    '</div>' +
                    '<div class="col-sm-1">' +
                    '<button  id="del_' + element.id + '" onclick="deleteItem(' + element.id + ')" type="button" style="color: white;background-color: red" class="minicart-remove">x</button>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<input type="hidden" name=id[] value="' + element.id + '"> ' +
                    '<input type="hidden" name=name[] value="' + element.name + '"> ' +
                    '<input type="hidden" name=gia[] value="' + element.gia + '"> ' +
                    '<hr>' +
                    '</div> ';
                item.html(html);
            });
            sp.forEach(function (element) {
                $('#sl_' + element.id).on('input', function () {
                    var tongtien = $('#sl_' + element.id).val() * element.gia;
                    // var newtongtien= tongtien.toLocaleString('en');
                    $('#tt_' + element.id).html('đ:' + Number(tongtien));
                    sp.find(function (element2) {
                        if (element2.id == id) {
                            element2.soluong = Number($('#sl_' + element.id).val());
                            element2.thanhtien = Number($('#sl_' + element.id).val() * element.gia).toLocaleString('en');
                        }
                    });
                    sessionStorage.setItem('list_order', JSON.stringify(sp));
                });
            });
        }
        else {
            sp = [];
        }
        $('#orderModal').modal('show');
    }

    function deleteItem(id) {
        var sp = sessionStorage.getItem('list_order');
        sp = JSON.parse(sp);
        if (sp != [] && sp != undefined) {
            //Xoa mang
            var index = sp.map(x => {
                return x.id;
            }).indexOf(id);
            sp.splice(index, 1);
            sessionStorage.setItem('list_order', JSON.stringify(sp));
            //Xoa giao dien
            $('#item' + id).remove();
        }
    }
</script>