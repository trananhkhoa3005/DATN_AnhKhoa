@extends('layouts.home.index')

@section('sanpham')
    <script language="javascript">
        function kiemtra() {
            const form = document.forms["a"];
            const hoten = form.hoten.value.trim();
            const dienthoai = form.dienthoai.value.trim();
            const diachi = form.diachi.value.trim();

            if (hoten === "") {
                alert("Bạn chưa điền tên");
                form.hoten.focus();
                return false;
            }
            if (dienthoai === "") {
                alert("Bạn chưa điền SĐT. Hãy điền số điện thoại để chúng tôi liên lạc lại với bạn.");
                form.dienthoai.focus();
                return false;
            }
            if (diachi === "") {
                alert("Bạn chưa điền địa chỉ");
                form.diachi.focus();
                return false;
            }
            form.submit();
        }
    </script>

    <div class="col-md-9" align="center">
        <h3>Thông tin thanh toán</h3>
        <form action="{{ route('cart.xltt') }}" method="POST" id="a" onsubmit="return kiemtra();">
            @csrf
            <table>
                <tr>
                    <td class="tieude">Tên khách hàng</td>
                    <td><input type="text" name="hoten" value="{{ $user->name }}" /></td>
                </tr>
                <tr>
                    <td class="tieude">Địa chỉ giao hàng</td>
                    <td><input type="text" name="diachi" value="{{ $user->DiaChi }}" /></td>
                </tr>
                <tr>
                    <td class="tieude">Số điện thoại</td>
                    <td><input type="text" name="dienthoai" value="{{ $user->SDT }}" /></td>
                </tr>
                <tr>
                    <td class="tieude">Email</td>
                    <td><input type="text" name="email" value="{{ $user->email }}" /></td>
                </tr>
                <tr>
                    <td class="tieude">Phương thức: </td>
                    <td>
                        <select name="phuongthuc">
                            <option value="0">Chọn phương thức thanh toán</option>
                            <option value="1">Qua bưu điện</option>
                            <option value="2">Qua thẻ ATM</option>
                            <option value="3">Thanh toán khi nhận hàng</option>
                        </select>
                    </td>
                </tr> 
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="2" class="submit">
                        <center><input type="submit" value="Đặt hàng" width="120px" /></center>
                    </td>
                </tr>
            </table>
        </form>
    </div>
@endsection

@section('XemNhanhGH')
    @php
        $total = 0;
        $tongsp = 0;
    @endphp

    @if (session()->has('cart') && !empty(session('cart')))
        @foreach (session('cart') as $idsp)
            <div class="product-widget">
                <div class="product-img">
                    <img src="{{ asset('storage/admin/img/' . $idsp['img']) }}">
                </div>
                <div class="product-body">
                    <h3 class="product-name"><a href="#">{{ $idsp['tensp'] }}</a></h3>
                    <h4 class="product-price"><span class="qty">{{ $idsp['sl'] }}x</span>
                        {{ number_format($idsp['price'], 0) }} ₫
                    </h4>
                </div>
                <!-- Nút Xóa -->
                <a href="{{ route('cart.delete', ['id' => $idsp['idsp']]) }}"><button class="delete"><i
                    class="fa fa-close"></i></button></a>
            </div>
            @php
                $total += $idsp['sl'] * $idsp['price'];
                $tongsp += $idsp['sl'];
            @endphp
        @endforeach
    @else
        <span style="color: red; font-size: 18px;">Giỏ hàng không có sản phẩm nào</span>
    @endif
@endsection
