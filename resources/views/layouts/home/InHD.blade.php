@extends('layouts.home.index')

@section('content')
    <!DOCTYPE html
        PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Hóa Đơn Mua Hàng</title>
    </head>

    <body onLoad="window.print()">
        <div class="row" style="margin: 5px auto; width:750px;">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_content" style="width:750px; border:1px solid #000; margin: 15px 0;">
                    <table width="100%" style="margin-left: 20px; margin-top: 20px">
                        <tr>
                            <td width="100px" height="100px">
                                <img src="{{ asset('img/akshop.png') }}" width="100px" height="100px">
                            </td>
                            <td>
                                <table>
                                    <tr>
                                        <td style="min-width: 13px;"></td>
                                        <td>Tên đơn vị: AKShop</td>
                                    </tr>
                                    <tr>
                                        <td style="min-width: 13px;"></td>
                                        <td>ĐC: 05 Lạc Long Quân</td>
                                    </tr>
                                    <tr>
                                        <td style="min-width: 13px;"></td>
                                        <td>ĐT: 0876760783</td>
                                        <td style="min-width: 13px;"></td>
                                        <td>MST: 0876760783</td>
                                    </tr>
                                    <tr>
                                        <td style="min-width: 13px;"></td>
                                        <td>Email: trananhkhoa3005@gmail.com</td>
                                        <td style="min-width: 13px;"></td>
                                        <td>Website: AKShop.com</td> 
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <table width="100%">
                        <tr>
                            <td colspan="3" height="25" valign="top" align="center">
                                <strong>
                                    <font color="#FF0000" size="+2">HOÁ ĐƠN BÁN HÀNG</font>
                                </strong>
                            </td>
                        </tr>
                        <tr>
                            <td width="30%">&nbsp;</td>
                            <td height="25" align="center" width="40%">
                                <i>Ngày: {{ $currentDate }}</i>
                            </td>
                            <td align="left" width="30%">Số HD: {{ $dh->MaDH }}</td>
                        </tr>
                    </table>

                    <table width="100%" style="margin-left: 20px">
                        <tr>
                            <td>Khách hàng: {{ $dh->nguoiDung->name }}</td>
                            <td>MST: </td>
                        </tr>
                        <tr>
                            <td>Địa chỉ: {{ $dh->DiaChi }}</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Điện thoại: {{ $dh->SDT }}</td>
                            <td>Email: {{ $dh->Email }}</td>
                        </tr>
                        <tr>
                            <td>Ngày giao hàng: {{ $currentDate }}</td>
                            <td>
                                Phương thức thanh toán:
                                @if ($dh->PTTT == 1)
                                    Qua bưu điện
                                @elseif ($dh->PTTT == 2)
                                    Qua thẻ ATM
                                @else
                                    Thanh toán khi nhận hàng
                                @endif
                            </td>
                        </tr>
                    </table>
                    <table width="95%" style="border-collapse:collapse; margin-left: 20px; margin-right: 20px;">
                        <tr>
                            <td width="5%" bgcolor="#CCCCCC" align="left" style="border:1px solid #000;">
                                <div align="center"><b>STT</b></div>
                            </td>
                            <td width="5%" bgcolor="#CCCCCC" align="left" style="border:1px solid #000;">
                                <div align="center"><b>Mã SP</b></div>
                            </td>
                            <td width="25%" bgcolor="#CCCCCC" align="left" style="border:1px solid #000;">
                                <div align="center"><b>Tên sản phẩm</b></div>
                            </td>
                            <td width="5%" bgcolor="#CCCCCC" align="left" style="border:1px solid #000;">
                                <div align="center"><b>ĐVT</b></div>
                            </td>
                            <td width="5%" bgcolor="#CCCCCC" align="left" style="border:1px solid #000;">
                                <div align="center"><b>SL</b></div>
                            </td>
                            <td width="20%" bgcolor="#CCCCCC" align="left" style="border:1px solid #000;">
                                <div align="center"><b>Đơn giá VNĐ</b></div>
                            </td>
                            <td width="20%" align="right" bgcolor="#CCCCCC" align="left"
                                style="border:1px solid #000;">
                                <div align="center"><b>Thành tiền</b></div>
                            </td>
                        </tr>

                        @php
                            $stt = 1;
                            $tong = 0;
                            $vat = 0;
                            $tongcong = 0;
                        @endphp

                        @foreach ($ctdh as $row)
                            @php
                                $thanhtien = $row->DonGiaMua * $row->SLMua;
                                $tong += $thanhtien;
                            @endphp
                            <tr>
                                <td align="center" style="border:1px solid #000;">{{ $stt++ }}</td>
                                <td align="center" style="border:1px solid #000;">{{ $row->MaSP }}</td>
                                <td align="left" style="border:1px solid #000;">{{ $row->sanPham->TenSP }}</td>
                                <td align="center" style="border:1px solid #000;">Cái</td>
                                <td align="center" align="left" style="border:1px solid #000;">{{ $row->SLMua }}</td>
                                <td align="right" align="left" style="border:1px solid #000;">
                                    {{ number_format($row->DonGiaMua, 0, ',', '.') }} đ
                                </td>
                                <td align="right" align="left" style="border:1px solid #000;">
                                    {{ number_format($thanhtien, 0, ',', '.') }} đ
                                </td>
                            </tr>
                        @endforeach

                        @php
                            $vat = $tong / 10;
                            $tongcong = $tong + $vat;
                            $tongcong_chu = ucfirst(convert_number_to_words($tongcong));
                        @endphp

                        <tr style="border:1px solid #000;">
                            <td colspan="6" align="right" width="5%" style="border:1px solid #000;"><b>Tổng tiền hàng</b></td>
                            <td align="right"><b>{{ number_format($tong, 0, ',', '.') }}</b> đ </td>
                        </tr>
                        <tr style="border:1px solid #000;">
                            <td colspan="6" align="right" width="5%" style="border:1px solid #000;"><b>Thuế VAT 10%</b></td>
                            <td align="right"><b>{{ number_format($vat, 0, ',', '.') }}</b> đ </td>
                        </tr>
                        <tr style="border:1px solid #000;">
                            <td colspan="6" align="right" width="5%" style="border:1px solid #000;"><b>Tổng giá trị đơn hàng</b></td>
                            <td align="right"><b>{{ number_format($tongcong, 0, ',', '.') }}</b> đ </td>
                        </tr>
                        <tr style="border:1px solid #000;">
                            <td colspan="7" align="right" width="5%" style="border:1px solid #000;"><b>Bằng chữ:</b>
                                <i>{{ $tongcong_chu }}</i>
                            </td>
                        </tr>
                    </table>
                    <table width="95%" style="border-collapse:collapse; margin: 20px;">
                        <tr>
                            <td align="center" width="20%"><b>Khách hàng</b></td>
                            <td align="center" width="20%"><b>Người nhận</b></td>
                            <td align="center" width="20%"><b>Thủ kho</b></td>
                            <td align="center" width="20%"><b>Kế toán</b></td>
                            <td align="center" width="20%"><b>Giám đốc</b></td>
                        </tr>
                        <tr>
                            <td align="center" width="20%"><i>
                                    <font size="-1">(Ký, ghi rõ họ tên)</font>
                                </i></td>
                            <td align="center" width="20%"><i>
                                    <font size="-1">(Ký, ghi rõ họ tên)</font>
                                </i></td>
                            <td align="center" width="20%"><i>
                                    <font size="-1">(Ký, ghi rõ họ tên)</font>
                                </i></td>
                            <td align="center" width="20%"><i>
                                    <font size="-1">(Ký, ghi rõ họ tên)</font>
                                </i></td>
                            <td align="center" width="20%"><i>
                                    <font size="-1">(Ký, ghi rõ họ tên)</font>
                                </i></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </body>

    </html>
@endsection
