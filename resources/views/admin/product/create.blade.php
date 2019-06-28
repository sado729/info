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
                Bank Məhsulu əlavə et
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Ana Səhifə</a></li>
                <li><a href="{{ route('product.admin.index') }}">Bank Məhsulları</a></li>
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
                            <form role="form" action="{{ route('product.admin.store') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="form-group col-md-3 mt-20">
                                    <label for="name">Ad</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>

                                <div class="form-group col-md-3 mt-20">
                                    <label for="type">
                                        Tip seç
                                    </label>
                                    <select name="type" id="type" class="form-control">
                                        <option value="kredit">Kredit məhsulları</option>
                                        <option value="kampaniya">Kampaniyalar</option>
                                    </select>
                                </div>

                                @if(!$bank)
                                    <div class="form-group col-md-3 mt-20">
                                        <label for="bank_id">
                                            Bank seç
                                        </label>
                                        <select name="bank_id" id="bank_id" class="form-control">
                                            @foreach($banks as $bank)
                                                <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @else
                                    <input type="hidden" name="bank_id" value="{{ $bank->id }}">
                                @endif

                                <div class="form-group col-md-3 mt-20">
                                    <label for="image">
                                        Şəkil
                                    </label>

                                    <input type="file" class="form-control" accept="image/*" id="image" name="image">
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="editor1">Mətn</label>
                                    <textarea name="text" id="editor1"></textarea>
                                </div>

                                <div class="box-footer col-md-12">
                                    <button type="submit" class="btn btn-primary">Əlavə et</button>
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
    <script src="https://cdn.ckeditor.com/4.7.0/full-all/ckeditor.js"></script>
    <script src="/admin/js/adapter.js"></script>
    <script>
        let options = {
                language: 'az',
                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
            },
            editor = $('#editor1');
        editor.ckeditor(options);
    </script>
@endsection