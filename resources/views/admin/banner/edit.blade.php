@extends('admin.layouts.master')
@section('head')
    <style>
        .mt-20{margin-top: 20px;}
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightcase/2.5.0/css/lightcase.min.css">
@endsection
@section('body') skin-blue sidebar-mini @endsection
@section('content')
    @include('admin.layouts.include.header')
    @include('admin.layouts.include.sidebar')
    <div class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>
                <strong>{{ $banner->name }}</strong> bannerını dəyiş
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Ana Səhifə</a></li>
                <li><a href="{{ route('banner.admin.index') }}">Ölkələr</a></li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form role="form" action="{{ route('banner.admin.update',['id' => $banner->id]) }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group col-md-4 mt-20">
                                    <label for="name">
                                        Ad
                                    </label>

                                    <input type="text" class="form-control" placeholder="Ad" id="name" name="name" value="{{ $banner['name'] }}">
                                </div>

                                <div class="form-group col-md-4 mt-20">
                                    <label for="url">
                                        Link
                                    </label>

                                    <input type="url" class="form-control" placeholder="Link" id="url" name="url" value="{{ $banner['url'] }}">
                                </div>

                                <div class="form-group col-md-4 mt-20">
                                    <label for="direction">
                                        İstiqamət seç
                                    </label>
                                    <select name="direction" id="direction" class="form-control">
                                        <option value="top" {{ $banner['description']=='top' ? 'selected' : '' }}>Yuxarı</option>
                                        <option value="left" {{ $banner['description']=='left' ? 'selected' : '' }}>Sol</option>
                                        <option value="right" {{ $banner['description']=='right' ? 'selected' : '' }}>Sağ</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-4 mt-20">
                                    <label for="image">
                                        Şəkil
                                    </label>

                                    <input type="file" class="form-control" accept="image/*" id="image" name="image">
                                </div>

                                <div class="box-footer col-md-12">
                                    <button type="submit" class="btn btn-primary">Dəyiş</button>
                                </div>

                            </form>
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