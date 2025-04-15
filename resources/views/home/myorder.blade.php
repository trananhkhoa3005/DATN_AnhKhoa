@extends('layouts.home.index')
@section('sanphamhot')
    @php
        $total = 0;
        $tongsp = 0;
    @endphp
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="5%">STT</th>
                <th width="30%">Tên người dùng</th>
                <th width="30%">Ngày đặt</th>
                <th width="30%">Trạng thái</th>
                {{--  <th width="25%">Action</th>  --}}
            </tr>
        </thead>
        <style>
            .table {
    text-align: center;
}

.table th, .table td {
    text-align: center;
    vertical-align: middle;
}

        </style>
        <tbody>
            @foreach ($orders as $key => $order)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td style="text-align: center;">{{ $order->TenND == '' ? $order->nguoiDung->name : $order->TenND }}</td>
                    <td style="text-align: center;">{{ $order->NgayDH }}</td>
                    <td style="text-align: center;">{{ $order->showStatus->ten_status }}</td>
                     {{-- <td>
                        <a href="{{ route('/InHD/{id}', $order->MaDH) }}"><button
                                style="background-image: linear-gradient(90deg, #CCFFFF, #CC99FF);color: black;"
                                class="btn btn-primary">Chi tiết</button></a> --}}
                    </td> 
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
