@extends('layouts.home.index')

@section('content')
<div class="page-header zvn-page-header clearfix">
    <div class="zvn-page-header-title">
        <h3>Chi tiết đơn hàng</h3>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Chi tiết đơn hàng</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <form class="form-horizontal form-label-left">
                    <div class="form-group">
                        <label class="control-label col-md-1"></label>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left;">Tên khách hàng:</label>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left;">{{ $dh->nguoiDung->name }}</label>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-1"></label>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left;">Địa chỉ giao hàng:</label>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left;">{{ $dh->DiaChi }}</label>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-1"></label>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left;">Số điện thoại:</label>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left;">{{ $dh->SDT }}</label>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-1"></label>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left;">Ngày giao hàng:</label>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left;">{{ date('d/m/Y') }}</label>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-1"></label>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left;">Phương thức thanh toán:</label>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left;">
                            @if($dh->PTTT == 1)
                                Qua bưu điện
                            @elseif($dh->PTTT == 2)
                                Qua thẻ ATM
                            @else
                                Thanh toán khi nhận hàng
                            @endif
                        </label>
                    </div>

                    <table class="" style="width: 760px; margin-left: 80px;" border="1px solid black">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã SP</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $tong = 0; @endphp
                            @foreach($ctdh as $index => $chiTiet)
                                @php
                                    $thanhtien = $chiTiet->DonGiaMua * $chiTiet->SLMua;
                                    $tong += $thanhtien;
                                @endphp
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $chiTiet->MaSP }}</td>
                                    <td>{{ $chiTiet->sanPham->TenSP }}</td>
                                    <td>{{ $chiTiet->SLMua }}</td>
                                    <td>{{ number_format($chiTiet->DonGiaMua, 0, ",", ".") }} đ</td>
                                    <td>{{ number_format($thanhtien, 0, ",", ".") }} đ</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="6" class="text-right" style="padding: 5px; font-size: 18px;">
                                    Tổng tiền (chưa bao gồm thuế VAT): <span style="color: red;">{{ number_format($tong, 0, ",", ".") }} đ</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <a href="{{ route('admin.donhang') }}" class="btn btn-danger">Quay về</a>
                        <a href="{{ route('admin.inhd', ['id'=>$dh->MaDH]) }}" class="btn btn-success">In hóa đơn</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
