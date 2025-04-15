@extends('layouts.admin.index')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Thêm mới Sản phẩm</h2>
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
                    {{-- <div class="alert alert-danger alert-dismissible fade in zvn-alert  " role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">×</span>
                        </button>
                        <strong><i class="fa fa-exclamation-triangle"></i> Xảy ra lỗi!</strong>
                        <p><strong>- Tên :</strong> không được rỗng</p>
                        <p><strong>- Username:</strong> không có dấu</p>
                        <p><strong>- Password:</strong> phải có ký tự đặc biệt</p>
                    </div> --}}
                    <form method="post" action="{{ route('admin.XLSuaSP', $sanpham->MaSP) }}" enctype="multipart/form-data" id="demo-form2"
                        data-parsley-validate class="form-horizontal form-label-left">
                        @csrf
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tên sản phẩm<span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input name="txt_tensp" value="{{ $sanpham->TenSP }}" type="text" id="name"
                                    required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Loại sản phẩm
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="loaisp" class="form-control col-md-7 col-xs-12">
                                    <option>==Chọn loại sản phẩm==</option>
                                    @foreach ($loaisp as $row)
                                        @if ($row->MaLoai == $sanpham->MaLoai)
                                            <option value="{{ $row->MaLoai }}" selected>{{ $row->TenLoai }}</option>
                                        @else
                                            <option value="{{ $row->MaLoai }}">{{ $row->TenLoai }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Hãng sản xuất</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="hangsx" class="form-control col-md-7 col-xs-12">
                                    <option style="width: 200px; height: 30px;">==Chọn hãng sản xuất==</option>
                                    @foreach ($hsx as $row)
                                        @if ($row->MaHSX == $sanpham->MaHSX)
                                            <option value="{{ $row->MaHSX }}" selected>{{ $row->TenHSX }}</option>
                                        @else
                                            <option value="{{ $row->MaHSX }}">{{ $row->TenHSX }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="avatar">Hình ảnh <span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input name="anhdaidien" type="file" id="avatar" required="required"
                                    class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Mô tả <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input name="mota" value="{{ $sanpham->MoTa }}" type="text" id="name"
                                    required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Đơn giá <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input name="dongia" value="{{ $sanpham->DonGia }}" type="text" id="name"
                                    required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Ghi chú <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea name="ghichu" value="{{ $sanpham->GhiChu }}" id="description"></textarea>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-success">Sửa</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
