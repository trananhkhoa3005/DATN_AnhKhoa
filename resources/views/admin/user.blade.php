@extends('layouts.admin.index')
@section('content')
    <div class="page-header zvn-page-header clearfix">
        <div class="zvn-page-header-title">
            <h3>Danh sách User</h3>
        </div>
        <div class="zvn-add-new pull-right">
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
                                        <th class="column-title">Mã ND</th>
                                        <th class="column-title">Tên ND</th>
                                        <th class="column-title">DiaChi</th>
                                        <th class="column-title">Email</th>
                                        <th class="column-title">SDT</th>
                                        <th class="column-title">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach ($user as $row)
                                        <tr class="even pointer">
                                            <td width="5%">{{ $i }}</td>
                                            <td width="15%">{{ $row->MaND }}</td>
                                            <td>{{ $row->name }}</td>
                                            <td width="15%">{{ $row->DiaChi }}</td>
                                            <td width="10%">{{ $row->email }}</td>
                                            <td width="10%">{{ $row->SDT }}</td>
                                            <td class="last" width="8%">
                                                <div class="zvn-box-btn-filter">
                                                    <a href="{{ route('admin.useredit', $row->MaND) }}" type="button"
                                                        class="btn btn-icon btn-success" data-toggle="tooltip"
                                                        data-placement="top" data-original-title="Sửa">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a href="#" type="button"
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
                                {{ $user->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
