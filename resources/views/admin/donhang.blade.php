@extends('layouts.admin.index')
@section('content')
    <div class="page-header zvn-page-header clearfix">
        <div class="zvn-page-header-title">
            <h3>Danh sách Đơn hàng</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Danh sách</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                            <thead>
                                <tr class="headings">
                                    <th class="column-title">STT</th>
                                    <th class="column-title">Mã ĐH</th>
                                    <th class="column-title">Tên khách hàng</th>
                                    <th class="column-title">Địa Chỉ</th>
                                    <th class="column-title">Điện Thoại</th>
                                    <th class="column-title">Email</th>
                                    <th class="column-title">Trạng thái</th>
                                    <th class="column-title">Xác nhận</th>
                                    <th class="column-title">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($donhang as $item)
                                    <tr class="even pointer">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->MaDH }}</td>
                                        <td>{{ $item->nguoiDung->name }}</td>
                                        <td>{{ $item->DiaChi }}</td>
                                        <td>{{ $item->SDT }}</td>
                                        <td>{{ $item->Email }}</td>
                                        <form method="post" action="{{ route('admin.xndh', ['id' => $item->MaDH]) }}">
                                            @csrf
                                            <td>
                                                <select name="trangthai">
                                                    @foreach ($status as $row)
                                                        <option value="{{ $row->id }}"
                                                            {{ $item->TrangThai == $row->id ? 'selected' : '' }}>
                                                            {{ $row->ten_status }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <button type="submit" style="float:left;">Xác nhận</button>
                                            </td>
                                        </form>
                                        <td class="last">
                                            <a href="{{ route('admin.ctdh', ['id' => $item->MaDH]) }}" style="float:left;">Chi tiết</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Phân trang -->
                        <div class="col-md-6" align="center">
                            {{ $donhang->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
