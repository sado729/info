@extends('admin.layouts.master')
@section('head')
    <link rel="stylesheet" href="/admin/css/bootstrap-tagsinput.css">
    <style>
        .mt-20{margin-top: 20px;}
        .bootstrap-tagsinput{
            box-shadow: none;
            border-radius: 0;
            display: block;
            line-height: 24px;
        }
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
                <strong>{{ $bank->name }}</strong> bankını dəyiş
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Ana Səhifə</a></li>
                <li><a href="{{ route('bank.admin.index') }}">Banklar</a></li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form role="form" action="{{ route('bank.admin.update',['id' => $bank->id]) }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="col-md-12">
                                    <div class="form-group col-md-4 mt-20">
                                        <label for="name">
                                            Ad
                                        </label>

                                        <input type="text" class="form-control" placeholder="Ad" id="name" name="name" value="{{ $bank['name'] }}">
                                    </div>

                                    <div class="form-group col-md-4 mt-20">
                                        <label for="slug">
                                            Link adı
                                        </label>

                                        <input type="text" class="form-control" placeholder="Link adı" id="slug" name="slug" value="{{ $bank['slug'] }}">
                                    </div>

                                    <div class="form-group col-md-4 mt-20">
                                        <label for="image">
                                            Şəkil
                                        </label>

                                        <input type="file" class="form-control" accept="image/*" id="image" name="image">
                                    </div>

                                    <div class="form-group col-md-4 mt-20">
                                        <label for="title">
                                            Title
                                        </label>

                                        <input type="text" class="form-control" placeholder="Title" id="title" name="title" value="{{ $bank['title'] }}" maxlength="60">
                                    </div>

                                    <div class="form-group col-md-4 mt-20">
                                        <label for="keywords">
                                            Keywords
                                        </label>

                                        <input type="text" class="form-control" placeholder="Keywords" id="keywords" name="keywords" value="{{ $bank['keywords'] }}" maxlength="150" data-role="tagsinput">
                                    </div>

                                    <div class="form-group col-md-4 mt-20">
                                        <label for="name">
                                            Description
                                        </label>

                                        <input type="text" class="form-control" placeholder="Description" id="description" name="description" value="{{ $bank['description'] }}" maxlength="160">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="editor1">Mətn</label>
                                        <textarea name="text" id="editor1">{{ $bank['text'] }}</textarea>
                                    </div>

                                    <div class="box-footer col-md-12">
                                        <button type="submit" class="btn btn-primary">Dəyiş</button>
                                    </div>
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
    <script src="/admin/js/bootstrap-tagsinput.min.js"></script>
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