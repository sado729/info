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
                Kateqoriya əlavə et
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Ana Səhifə</a></li>
                <li><a href="{{ route('category.admin.index') }}">Kateqoriyalar</a></li>
                <li class="active">Kateqoriya əlavə et</li>
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
                            <form role="form" action="{{ route('category.admin.store') }}" method="post" enctype="multipart/form-data">
                                <div class="col-md-12">
                                    <!-- Custom Tabs -->
                                    <div class="nav-tabs-custom">
                                        <ul class="nav nav-tabs">
                                            @foreach($locales as $code => $props)
                                                <li @if ($code=='az') class="active" @endif ><a href="#tab_{{ $code }}" data-toggle="tab" aria-expanded="true">{{ $props['native'] }}</a></li>
                                            @endforeach
                                        </ul>
                                        <div class="tab-content">
                                            @foreach($locales as $code => $props)
                                                <div class="tab-pane @if ($code=='az') active @endif" id="tab_{{ $code }}">
                                                    <div class="form-group col-md-4 mt-20">
                                                        <label for="name-{{ $code }}">
                                                            Ad
                                                        </label>

                                                        <input type="text" class="form-control" placeholder="Ad" id="name-{{ $code }}" name="name:{{ $code }}">
                                                    </div>

                                                    <div class="form-group col-md-4 mt-20">
                                                        <label for="slug-{{ $code }}">
                                                            Link adı
                                                        </label>
                                                        <input type="text" class="form-control" placeholder="Link adı" id="slug-{{ $code }}" name="slug:{{ $code }}">
                                                    </div>

                                                </div>
                                            @endforeach
                                        </div>
                                        <!-- /.tab-content -->
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="category">
                                            Ana Kateqoriyasunu seç
                                        </label>
                                        <select name="category_id" id="category" class="form-control">
                                            <option value="0">
                                                yoxdur
                                            </option>

                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ ($category->id==6) ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>

                                                @if(isset($category->categories))
                                                    @foreach($category->categories as $category)
                                                        <option value="{{ $category->id }}"> └ {{ $category->name }}</option>

                                                        @if(isset($category->categories))
                                                            @foreach($category->categories as $category)
                                                                <option value="{{ $category->id }}">   └ {{ $category->name }}</option>
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="file">
                                            Şəkil
                                        </label>
                                        <input type="file" class="form-control" placeholder="Şəkil" id="file" name="file">
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
    <script src="https://cdn.ckeditor.com/4.7.0/full-all/ckeditor.js"></script>
    <script src="/admin/js/adapter.js"></script>
    <script>
        var options = {
            language: 'az',
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };

        $('textarea#editor1').ckeditor(options);
    </script>
@endsection