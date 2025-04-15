@foreach ($sp as $row)
    <div class="col-md-3" style="margin-bottom: 40px;">
        <div class="product">
            <div class="product-img">
                <img src="{{ asset('storage/admin/img/' . $row->HinhAnh) }}" alt="" height="220px">
                <div class="product-label">
                    <span class="sale">-30%</span>
                    <span class="new">NEW</span>
                </div>
            </div>
            <div class="product-body">
                <p class="product-category">AKShop</p>
                <h3 class="product-name"><a href="{{ route('home.ctsp', ['id'=> $row->MaSP ]) }}">
                        {{ $row->TenSP }}
                    </a></h3>
                <h3 class="product-price">
                    {{ number_format($row->DonGia, 0) }} ₫
                </h3>
                <div class="product-rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <!-- <div class="product-btns">
                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Yêu
                            thích</span></button>
                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Xem chi tiết</span></button>
                </div> -->
            </div>
            <form method="post" action="{{ route('cart.themgh') }}">
                @csrf
                <input type="hidden" name="idsp" value="{{ $row->MaSP }}">
                <input type="hidden" name="tensp" value="{{ $row->TenSP }}" />
                <input type="hidden" name="price" value="{{ $row->DonGia }}" />
                <input type="hidden" name="img" value="{{ $row->HinhAnh }}" />
                <input type="hidden" name="sl" value="1"
                    style="width:50px; font-size: 12px; margin-left: 10px;">
                <a href="">
                    <div class="add-to-cart">
                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</button>
                    </div>
                </a>
            </form>
        </div>
    </div>
@endforeach
