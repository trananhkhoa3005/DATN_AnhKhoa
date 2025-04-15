@extends('layouts.home.index')
@section('sanpham')
    <!-- Product main img -->
    <div class="col-md-5 col-md-push-2">
        <div id="product-main-img">
            <div class="product-preview">
                <img src="{{ asset('storage/admin/img/' . $sanpham->HinhAnh) }}" alt="">
            </div>
        </div>
    </div>
    <!-- /Product main img -->

    <!-- Product thumb imgs -->
    <div class="col-md-2  col-md-pull-5">
        <div id="product-imgs">
            <div class="product-preview">
                <img src="{{ asset('storage/admin/img/' . $sanpham->HinhAnh) }}" alt="">
            </div>
        </div>
    </div>
    <!-- /Product thumb imgs -->

    <!-- Product details -->
    <div class="col-md-5">
        <div class="product-details">
            <h2 class="product-name">{{ $sanpham->TenSP }}</h2>
            <div>
                <div class="product-rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <a class="review-link" href="#">10 Review(s) | Add your review</a>
            </div>
            <div>
                <h3 class="product-price">{{ number_format($sanpham->DonGia, 0) }} ₫

                </h3>
            </div>
            {{--  <p>{{ $sanpham->MoTa }}</p>  --}}
            <form method="post" action="{{ route('cart.themgh') }}">
                @csrf
                <input type="hidden" name="idsp" value="{{ $sanpham->MaSP }}">
                <input type="hidden" name="tensp" value="{{ $sanpham->TenSP }}" />
                <input type="hidden" name="price" value="{{ $sanpham->DonGia }}" />
                <input type="hidden" name="img" value="{{ $sanpham->HinhAnh }}" />
                <div class="add-to-cart">
                    <div class="qty-label">
                        Số lượng
                        <div class="input-number">
                            <input type="number" name="sl" min="1" value="1">
                        </div>
                    </div>
                    <button type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</button>
                </div>
            </form>

            <ul class="product-btns">
                <li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
                <li><a href="#"><i class="fa fa-exchange"></i> add to compare</a></li>
            </ul>

            <ul class="product-links">
                <li>Category:</li>
                <li><a href="#">Headphones</a></li>
                <li><a href="#">Accessories</a></li>
            </ul>

            <ul class="product-links">
                <li>Share:</li>
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-envelope"></i></a></li>
            </ul>

        </div>
    </div>
    <!-- /Product details -->

    <!-- Product tab -->
    <div class="col-md-12">
        <div id="product-tab">
            <!-- product tab nav -->
            <ul class="tab-nav">
                <li class="active"><a data-toggle="tab" href="#tab1">Mô tả</a></li>
                <li><a data-toggle="tab" href="#tab3">Reviews (3)</a></li>
            </ul>
            <!-- /product tab nav -->

            <!-- product tab content -->
            <div class="tab-content">
                <!-- tab1  -->
                <div id="tab1" class="tab-pane fade in active">
                    <div class="row">
                        <div class="col-md-12">
                            <p>{{ $sanpham->MoTa }}</p>
                        </div>
                    </div>
                </div>
                <!-- /tab1  -->

                <!-- tab3  -->
                <div id="tab3" class="tab-pane fade in">
                    <div class="row">
                        <!-- Rating -->
                        <div class="col-md-3">
                            <div id="rating">
                                <div class="rating-avg">
                                    <span>4.5</span>
                                    <div class="rating-stars">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                </div>
                                <ul class="rating">
                                    <li>
                                        <div class="rating-stars">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="rating-progress">
                                            <div style="width: 80%;"></div>
                                        </div>
                                        <span class="sum">3</span>
                                    </li>
                                    <li>
                                        <div class="rating-stars">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <div class="rating-progress">
                                            <div style="width: 60%;"></div>
                                        </div>
                                        <span class="sum">2</span>
                                    </li>
                                    <li>
                                        <div class="rating-stars">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <div class="rating-progress">
                                            <div></div>
                                        </div>
                                        <span class="sum">0</span>
                                    </li>
                                    <li>
                                        <div class="rating-stars">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <div class="rating-progress">
                                            <div></div>
                                        </div>
                                        <span class="sum">0</span>
                                    </li>
                                    <li>
                                        <div class="rating-stars">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <div class="rating-progress">
                                            <div></div>
                                        </div>
                                        <span class="sum">0</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /Rating -->

                        <!-- Reviews -->
                        <div class="col-md-6">
                            <div id="reviews">
                                <ul class="reviews">
                                    <li>
                                        <div class="review-heading">
                                            <h5 class="name">John</h5>
                                            <p class="date">27 DEC 2018, 8:0 PM</p>
                                            <div class="review-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o empty"></i>
                                            </div>
                                        </div>
                                        <div class="review-body">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="review-heading">
                                            <h5 class="name">John</h5>
                                            <p class="date">27 DEC 2018, 8:0 PM</p>
                                            <div class="review-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o empty"></i>
                                            </div>
                                        </div>
                                        <div class="review-body">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="review-heading">
                                            <h5 class="name">John</h5>
                                            <p class="date">27 DEC 2018, 8:0 PM</p>
                                            <div class="review-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o empty"></i>
                                            </div>
                                        </div>
                                        <div class="review-body">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua</p>
                                        </div>
                                    </li>
                                </ul>
                                <ul class="reviews-pagination">
                                    <li class="active">1</li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /Reviews -->

                        <!-- Review Form -->
                        <div class="col-md-3">
                            <div id="review-form">
                                <form class="review-form">
                                    <input class="input" type="text" placeholder="Your Name">
                                    <input class="input" type="email" placeholder="Your Email">
                                    <textarea class="input" placeholder="Your Review"></textarea>
                                    <div class="input-rating">
                                        <span>Your Rating: </span>
                                        <div class="stars">
                                            <input id="star5" name="rating" value="5" type="radio"><label
                                                for="star5"></label>
                                            <input id="star4" name="rating" value="4" type="radio"><label
                                                for="star4"></label>
                                            <input id="star3" name="rating" value="3" type="radio"><label
                                                for="star3"></label>
                                            <input id="star2" name="rating" value="2" type="radio"><label
                                                for="star2"></label>
                                            <input id="star1" name="rating" value="1" type="radio"><label
                                                for="star1"></label>
                                        </div>
                                    </div>
                                    <button class="primary-btn">Submit</button>
                                </form>
                            </div>
                        </div>
                        <!-- /Review Form -->
                    </div>
                </div>
                <!-- /tab3  -->
            </div>
            <!-- /product tab content  -->
        </div>
    </div>
    <!-- /product tab -->
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
