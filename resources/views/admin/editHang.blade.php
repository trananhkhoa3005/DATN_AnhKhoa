@extends('layouts.admin.index')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Sửa Hãng</h2>
                    <a href="{{ route('admin.hangsx') }}"><button class="btn btn-danger" type="button"
                            style="float: right;">Quay về</button></a>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form method="post" action="{{ route('admin.hangsxput', $cate->MaHSX) }}" id="demo-form2"
                        data-parsley-validate class="form-horizontal form-label-left">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tên hãng<span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input name="name" value="{{ $cate->TenHSX }}" type="text" id="name"
                                    required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Mô tả <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input name="mota" value="{{ $cate->MoTa }}" type="text" id="name"
                                    required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
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
