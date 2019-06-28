@extends('admin.layouts.master')
@section('head')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <style>
        .nav-tabs-custom>.tab-content{padding: 0;}
        .mt-20{margin-top: 20px;}
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #3c8dbc;
            border: 1px solid #3c8dbc;
        }
        #emuraciet{float: left;}
    </style>
@endsection
@section('body') skin-blue sidebar-mini @endsection
@section('content')
    @include('admin.layouts.include.header')
    @include('admin.layouts.include.sidebar')
    <div class="content-wrapper" style="min-height: 990px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Istifadəçi əlavə et
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Ana Səhifə</a></li>
                <li><a href="{{ route('user.admin.index') }}">Istifadəçi</a></li>
                <li class="active">Istifadəçi əlavə et</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- right column -->
                <div class="col-md-12">

                    <!-- general form elements disabled -->
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            @include('admin.layouts.include.errors')
                            <form role="form" action="{{ route('user.admin.store') }}" method="post" enctype="multipart/form-data">

                                <div class="col-md-12">

                                    <div class="form-group col-md-4 mt-20">
                                        <label for="name">
                                            Ad
                                        </label>

                                        <input type="text" class="form-control" placeholder="Ad" id="name" name="name">
                                    </div>

                                    <div class="form-group col-md-4 mt-20">
                                        <label for="email">
                                            Email
                                        </label>

                                        <input type="email" class="form-control" placeholder="Email" id="email" name="email">
                                    </div>

                                    <div class="form-group col-md-4 mt-20">
                                        <label for="password">
                                            Şifrə
                                        </label>

                                        <input type="password" class="form-control" placeholder="Şifrə" id="password" name="password">
                                    </div>

                                    <div class="form-group col-md-4 mt-20">
                                        <label for="role">
                                            Vəzifə seç
                                        </label>
                                        <select name="role_id" id="role" class="form-control">
                                            @foreach($roles as $role)
                                                @if($role->id=='1' || $role->id=='4') @continue @endif
                                                <option value="{{ $role->id }}">
                                                    {{ $role->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4 mt-20">
                                        <label for="bank_id">
                                            Bank seç
                                        </label>
                                        <select name="bank_id" id="bank_id" class="form-control">
                                            <option value="">Bank işçisi deyil</option>
                                            @foreach($banks as $bank)
                                                <option value="{{ $bank->id }}">
                                                    {{ $bank->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4 mt-20">
                                        <label for="status">
                                            Status seç
                                        </label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="1" selected="selected">
                                                aktiv
                                            </option>
                                            <option value="0">
                                                passiv
                                            </option>
                                        </select>
                                    </div>

                                    {{ csrf_field() }}

                                    <div class="box-footer col-md-12">
                                        <button type="submit" class="btn btn-primary">Əlavə et</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#district').select2({
                placeholder : 'Rayon seçin',
                tags: true
            });
            $('#emuraciet').hide();
            $("#role").change(function () {
                $("#role option:selected").each(function () {
                    if ($(this).val() == 5) {
                        $('#emuraciet').show();
                    }else{
                        $('#emuraciet').hide();
                    }
                });
            }).trigger("change");
        });
    </script>
@endsection