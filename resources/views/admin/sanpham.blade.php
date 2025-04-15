@extends('layouts.admin.index')
@section('content')
    <div class="page-header zvn-page-header clearfix">
        <div class="zvn-page-header-title">
            <h3>Danh sách Sản phẩm</h3>
        </div>
        <div class="zvn-add-new pull-right">
            <a href="{{ route('admin.themsp') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Thêm mới</a>
        </div>
    </div>
    <div class="row">

        <div class="row" style="min-height: 400px;">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Danh sách</h2>
                        {{-- <ul class="nav navbar-right panel_toolbox">
                            <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul> --}}
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="table-responsive">
                            <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                    <tr class="headings">
                                        <th class="column-title">STT</th>
                                        <th class="column-title">Tên SP</th>
                                        <th class="column-title">Hình ảnh</th>
                                        <th class="column-title">Loại SP</th>
                                        <th class="column-title">Hãng SX</th>
                                        <th class="column-title">Đơn giá</th>
                                        <th class="column-title">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach ($sanpham as $row)
                                        <tr class="even pointer">
                                            <td width="5%">{{ $i }}</td>
                                            <td width="15%">{{ $row->TenSP }}</td>
                                            <td width="8%"><img src="{{ asset('storage/admin/img/' . $row->HinhAnh) }}"
                                                    alt="SanPham" class="zvn-thumb"></td>
                                            <td width="10%">{{ $row->loaiSP->TenLoai }}</td>
                                            <td width="10%">{{ $row->hangSX->TenHSX }}</td>
                                            <td width="10%">{{ number_format($row->DonGia, 0) }} ₫</td>
                                            <td class="last" width="8%">
                                                <div class="zvn-box-btn-filter">
                                                    <a href="{{ route('admin.suasp', $row->MaSP) }}" type="button"
                                                        class="btn btn-icon btn-success" data-toggle="tooltip"
                                                        data-placement="top" data-original-title="Sửa">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a href="{{ route('admin.xoasp', $row->MaSP) }}" type="button"
                                                        class="btn btn-icon btn-danger btn-delete" data-toggle="tooltip"
                                                        data-placement="top" data-original-title="Xóa">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @php $i++; @endphp
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="col-md-6" align="center">
                                {{ $sanpham->links() }}
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
