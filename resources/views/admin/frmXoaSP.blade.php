@extends('layouts.admin.index')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Xóa Sản phẩm</h2>
                    {{-- <ul class="nav navbar-right panel_toolbox">
                    <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul> --}}
                    <a href="{{ route('admin.sanpham') }}"><button class="btn btn-danger" type="button"
                            style="float: right;">Quay về</button></a>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <div class="row"><p style="color: red; font-size: 25px; margin-left: 180px;">Bạn có chắc muốn xóa sản phẩm này?</p></div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-9" style="border: 2px solid #968c8c; padding: 5px;">
                            <div class="row col-md-4">
                                <img src="{{ asset('storage/admin/img/' . $sanpham->HinhAnh) }}" alt="SanPham"
                                    class="zvn-thumb">
                            </div>
                            <div class="row col-md-7 " style="margin: 5px;">
                                <p style="color: rgb(57, 52, 131); font-size: 25px;">Sản phẩm: {{ $sanpham->TenSP }}</p>
                                <p style="color: rgb(57, 52, 131); font-size: 25px;">Đơn giá: {{ $sanpham->DonGia }} đ</p>
                                <p style="color: rgb(57, 52, 131); font-size: 25px;">Mô tả: {{ $sanpham->TMoTa }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin: 10px 0px 10px 60px;">
                        <div class="col-md-4"></div>
                        <form method="post" action="{{ route('admin.XLXoaSP', $sanpham->MaSP) }}" enctype="multipart/form-data" id="demo-form2"
                            data-parsley-validate class="form-horizontal form-label-left">
                            @csrf
                        <button class="btn btn-primary">Xóa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
