@extends('admin.layouts.master')
@section('head')
    <style>
        .nav-tabs-custom>.tab-content{padding: 0;}
        .mt-20{margin-top: 20px;}
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" />
@endsection
@section('body') skin-blue sidebar-mini @endsection
@section('content')
    @include('admin.layouts.include.header')
    @include('admin.layouts.include.sidebar')
    <div class="content-wrapper" style="min-height: 990px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Qalereya əlavə et
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Ana Səhifə</a></li>
                <li><a href="{{ route('gallery.admin.index') }}">Qalereya</a></li>
                <li class="active">Qalereya əlavə et</li>
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
                            <form role="form" action="{{ route('gallery.admin.store') }}" method="post" enctype="multipart/form-data">

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

                                                {{ csrf_field() }}
                                            </div>
                                            @endforeach


                                        </div>
                                        <!-- /.tab-content -->
                                    </div>
                                    <div class="clearfix"></div>

                                    <div class="form-group col-md-4 mt-20">
                                        <label for="created_at">
                                            Paylaşılma vaxtı
                                        </label>
                                        <div class="input-group date">
                                            <input type="datetime-local" class="form-control pull-right" id="datepicker"  placeholder="Paylaşılma vaxtı" name="created_at" value="{{ \Carbon\Carbon::parse(now())->format('Y-m-d\TH:i:s') }}">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4 mt-20">
                                        <label for="gallery">
                                            Ana qalereyasını seç
                                        </label>
                                        <select name="gallery_id" id="gallery" class="form-control">
                                            <option value="0">
                                                yoxdur
                                            </option>

                                            @foreach($gallery_all as $gallery)
                                                <option value="{{ $gallery->id }}">
                                                    {{ $gallery->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4 mt-20">
                                        <label for="file">
                                            Şəkil
                                        </label>

                                        <input type="file" class="form-control" accept="image/*" id="file" name="file">
                                    </div>

                                    <div class="form-group col-md-4 mt-20">
                                        <label for="filegallery">
                                            Qalereya Şəkilləri <i>[CTRL basılı saxlayıb bir neçəsini seçə bilərsiniz]</i>
                                        </label>

                                        <input type="file" class="form-control" accept="image/*" id="filegallery" name="filegallery[]" multiple>
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
        var editor = $('textarea#editor1');
        editor.ckeditor(options);
    </script>
@endsection