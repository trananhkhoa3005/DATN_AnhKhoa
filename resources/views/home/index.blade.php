@extends('layouts.home.index')
@section('sanpham')
    @php $sp = $sanpham; @endphp
    @include('layouts.home.sanpham')
@endsection
@section('sanphamhot')
    @php $sp = $sanphamhot; @endphp
    <div class="col-md-12">
        <div class="section-title">
            <h3 class="title" style="color: brown;">Sản phẩm hot</h3>
        </div>
    </div>

    <div class="col-md-12">
        <div class="row">
            <div class="products-tabs">
                <!-- tab -->
                <div id="tab2" class="tab-pane fade in active">
                    <div class="products-slick" data-nav="#slick-nav-2">
                        @include('layouts.home.sanpham')
                    </div>
                    <div id="slick-nav-2" class="products-slick-nav"></div>
                </div>
                <!-- /tab -->
            </div>
        </div>
    </div>
    <div class="col-md-12" style="min-height: 30px; border-bottom: 2px solid red; margin: 20px 0px;">
    </div>
@endsection
@section('XemNhanhGH')
    @php
    $total = 0;
    $tongsp = 0;
    @endphp

    @if(session()->has('cart') && !empty(session('cart')))
        @foreach(session('cart') as $idsp)
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
