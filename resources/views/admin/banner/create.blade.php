@extends('admin.layouts.master')
@section('head')
    <style>
        .nav-tabs-custom>.tab-content{padding: 0;}
        .mt-20{margin-top: 20px;}
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
                Banner əlavə et
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Ana Səhifə</a></li>
                <li><a href="{{ route('banner.admin.index') }}">Banner</a></li>
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
                            <form role="form" action="{{ route('banner.admin.store') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="col-md-12">
                                    <div class="form-group col-md-4 mt-20">
                                        <label for="name">
                                            Ad
                                        </label>

                                        <input type="text" class="form-control" placeholder="Ad" id="name" name="name" value="{{ old('name') }}">
                                    </div>

                                    <div class="form-group col-md-4 mt-20">
                                        <label for="url">
                                            Link
                                        </label>

                                        <input type="url" class="form-control" placeholder="Link" id="url" name="url" value="{{ old('url') }}">
                                    </div>

                                    <div class="form-group col-md-4 mt-20">
                                        <label for="direction">
                                            İstiqamət seç
                                        </label>
                                        <select name="direction" id="direction" class="form-control">
                                            <option value="top">Yuxarı</option>
                                            <option value="left">Sol</option>
                                            <option value="right">Sağ</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4 mt-20">
                                        <label for="image">
                                            Şəkil
                                        </label>

                                        <input type="file" class="form-control" accept="image/*" id="image" name="image">
                                    </div>

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
    <script src="/admin/js/fastclick.js"></script>
    <script src="/admin/js/adminlte.min.js"></script>
    <script src="/admin/js/jquery.slimscroll.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.7.0/full-all/ckeditor.js"></script>
    <script src="/admin/js/adapter.js"></script>
    <script>
        let options = {
            language: 'az',
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };

        $('textarea#editor1').ckeditor(options);
    </script>
@endsection