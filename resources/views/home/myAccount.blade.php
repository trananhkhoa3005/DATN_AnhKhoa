@extends('layouts.home.index')
@section('sanphamhot')
    @php
        $total = 0;
        $tongsp = 0;
        $stt = 1;
    @endphp
    <form action="{{ route('home.postmyaccount') }}" method="POST" class="form form-horizontal">
        @csrf
        <legend>Thông tinh tài khoản</legend>
        <div class="container-fluid">
            <label for="name">Tên</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ auth()->user()->name }}">
        </div>
        <div class="container-fluid" style="margin-top: 1%">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" disabled class="form-control"
                value="{{ auth()->user()->email }}">
        </div>
        <div class="container-fluid" style="margin-top: 1%">
            <label for="phone">SDT</label>
            <input type="text" id="phone" name="phone" class="form-control" value="{{ auth()->user()->SDT }}">
        </div>
        <div class="container-fluid" style="margin-top: 1%">
            <label for="address">Địa chỉ</label>
            <textarea type="text" id="address" name="address" class="form-control">{{ auth()->user()->DiaChi }}</textarea>
        </div>

        <div class="container-fluid" style="margin-top: 1%">
            <label for="password">Mật khẩu</label>
            <input type="password" id="password" name="password" class="form-control" value="">
        </div>
        <div class="container-fluid">
            <button type="submit" class="btn btn-default" style="margin-top: 1%">Lưu</button>
        </div>
    </form>
@endsection
