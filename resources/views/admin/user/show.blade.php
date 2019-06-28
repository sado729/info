@extends('admin.layouts.master')
@section('head')
    <style>
        .mb-10{margin-bottom:10px;}
        #dodelete{background-color: red;color: white;}
        #doactive{background-color: green;color: white;}
    </style>
@endsection
@section('body') skin-blue sidebar-mini @endsection
@section('content')
    @include('admin.layouts.include.header')
    @include('admin.layouts.include.sidebar')
    <div class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>
                <strong>{{ $user->name }}</strong> istifadəçi
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Ana Səhifə</a></li>
                <li><a href="{{ route('user.admin.index') }}">İstifadəçi</a></li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            <a class="btn btn-app" href="{{ route('user.admin.edit',$user->id) }}">
                                <i class="fas fa-edit fa-lg fa-fw"></i> Dəyiş
                            </a>
                            <a class="btn btn-app" href="{{ route('user.admin.index') }}">
                                <i class="fas fa-undo fa-lg fa-fw"></i> Geri Qayıt
                            </a>
                            <a class="btn btn-app" id="dodelete">
                                <i class="fas fa-trash"></i> Sil
                            </a>
                            @if($user->status=='0')
                                <a class="btn btn-app" href="" id="doactive" data-id="{{ $user->id }}">
                                    <i class="fas fa-eye"></i> Təsdiqlə
                                </a>
                            @endif
                            {{ csrf_field() }}
                            <div id="example1_wrapper" class="form-inline dt-bootstrap">
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <table class="table table-responsive table-bordered table-striped table-hover" role="grid">
                                            <tbody>

                                                <tr role="row" class="even">
                                                    <td>Nömrəsi</td>
                                                    <td>{{ $user->id }}</td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td>Ad</td>
                                                    <td>{{ $user->name }}</td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td>Email</td>
                                                    <td>{{ $user->email }}</td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td>Vəzifəsi</td>
                                                    <td>{{ ucfirst($user->roles->first()['name']) }}</td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td>Bank</td>
                                                    <td>{{ $user->isbank ? $user->bank->name : 'Bank işçisi deyil' }}</td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td>Status</td>
                                                    <td>
                                                        @if($user->status=='1')
                                                            <i class="far fa-eye"></i>
                                                        @else
                                                            <i class="far fa-eye-slash"></i>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td>Paylaşılma vaxtı</td>
                                                    <td>{!! $user->created_at !!}</td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td>Dəyişilmə vaxtı</td>
                                                    <td>{!! $user->updated_at !!}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include('admin.layouts.include.footer')
@endsection
@section('scripts')
    <!-- FastClick -->
    <script src="/admin/js/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="/admin/js/adminlte.min.js"></script>
    <!-- SlimScroll -->
    <script src="/admin/js/jquery.slimscroll.min.js"></script>
    <script>
        $(document).ready(function () {
            let csrf = $("input[name='_token']").val(),
                doactive = $("#doactive"),
                dodelete = $("#dodelete"),
                fieldid = doactive.data('id');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrf
                }
            });

            doactive.click(function() {
                $.ajax({
                    type: 'post',
                    url: '/admin/user/doactive',
                    data: {
                        'id': fieldid
                    },
                    dataType: 'json',
                    success: function(data) {
                        window.location.href = data.user;
                    }
                });
            });

            dodelete.click(function() {
                $.ajax({
                    type: 'delete',
                    url: '/admin/user/delete',
                    data: {
                        'id': fieldid
                    },
                    dataType: 'json',
                    success: function(data) {
                        window.location.href = data.user;
                    }
                });
            });
        });
    </script>
@endsection