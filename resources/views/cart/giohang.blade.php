@extends('layouts.home.index')
@section('sanpham')
    <div class="row" style="margin: 3px;">
        <h2 style="text-align: center;">CHI TIẾT GIỎ HÀNG</h2>
        <div class="table-responsive">
            <table class="table table-bordered" border="1px" style="border-collapse:collapse; border-color: green">
                <tr style="font-weight:bold; background-color: rgb(47, 151, 47)">
                    <th width="5%">STT</th>
                    <th width="30%">Tên sản phẩm</th>
                    <th width="17%">Số lượng</th>
                    <th width="17%">Giá</th>
                    <th width="15%">Tổng tiền</th>
                    <th width="25%">Action</th>
                </tr>
                @php
                    $total = 0;
                    $tongsp = 0;
                    $stt = 1;
                @endphp
                @if (count($cart) > 0)
                    @foreach ($cart as $idsp => $item)
                        <tr>
                            <td>{{ $stt++ }}</td>
                            <td style="text-align: center;">{{ $item['tensp'] }}</td>
                            <td style="text-align: center;">
                                <form method="post" action="{{ route('cart.update', $idsp) }}">
                                    @csrf
                                    <input type="number" name="sl" value="{{ $item['sl'] }}"
                                        style="width: 40px;border-style: none;text-align: center;">
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                </form>
                            </td>
                            <td style="text-align: center;">{{ number_format($item['price'], 0) }} ₫</td>
                            <td style="text-align: center;">{{ number_format($item['sl'] * $item['price'], 0) }} ₫</td>
                            <td style="text-align: center;">
                                <a href="{{ route('cart.delete', $idsp) }}"><button class="btn btn-primary"
                                        style="background-image: linear-gradient(90deg, #EEEEEE, #FF0000);color: black;">Xóa</button></a>
                            </td>
                        </tr>
                        @php
                            $total += $item['sl'] * $item['price'];
                            $tongsp += $item['sl'];
                        @endphp
                    @endforeach
                    <tr>
                        <td align="center" colspan="2" style="font-weight: bold;padding-right: 5px;">Tổng cộng</td>
                        <td align="center" colspan="2" style="font-weight: bold;padding-right: 5px;">{{ $tongsp }}
                        </td>
                        <td align="center" colspan="2" style="font-weight: bold;padding-right: 5px;">
                            {{ number_format($total, 0) }} ₫</td>
                    </tr>
                    <tr>
                        <td colspan="6" style="text-align: center;">
                            <a href="{{ url('/') }}"><button
                                    style="background-image: linear-gradient(90deg, #EEEEEE, #FF0000);color: black;"
                                    class="btn btn-primary">Mua tiếp</button></a>
                            <a href="{{ route('cart.checkout') }}"><button
                                    style="background-image: linear-gradient(90deg, #CCFFFF, #CC99FF);color: black;"
                                    class="btn btn-primary">Thanh toán</button></a>
                        </td>
                    </tr>
                @else
                    <span style="color: red; font-size:25px;">Giỏ hàng không có sản phẩm nào</span>
                @endif
            </table>
        </div>
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
