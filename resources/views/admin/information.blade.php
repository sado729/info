@extends('admin.layouts.master')
@section('head')
    <style>
        .icon > .fas {
            display: inline-block !important;
        }
    </style>
@endsection
@section('body') skin-blue sidebar-mini @endsection
@section('content')
    @include('admin.layouts.include.header')
    @include('admin.layouts.include.sidebar')
    <div class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>
                Parametrləri dəyiş
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Ana Səhifə</a></li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            @include('admin.layouts.include.errors')
                            <form role="form" action="{{ route('information.admin.update') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="col-md-12">
                                    <div class="form-group col-md-4 mt-20">
                                        <label for="phone">
                                            Telefon
                                        </label>

                                        <input type="text" class="form-control" value="{{ $information->phone }}" id="phone" name="phone">
                                    </div>

                                    <div class="form-group col-md-4 mt-20">
                                        <label for="email">
                                            Email
                                        </label>

                                        <input type="email" class="form-control" value="{{ $information->email }}" id="email" name="email">
                                    </div>

                                    <div class="form-group col-md-4 mt-20">
                                        <label for="address">
                                            Ünvan
                                        </label>

                                        <input type="text" class="form-control" value="{{ $information->address }}" id="address" name="address">
                                    </div>


                                    <div class="form-group col-md-12">
                                        <label for="editor1">Mətn</label>
                                        <textarea name="about" id="editor1">{!! $information->about !!}</textarea>
                                    </div>

                                    <div class="form-group col-md-4 mt-20">
                                        <label for="image">
                                            Şəkil
                                        </label>

                                        <input type="file" class="form-control" accept="image/*" id="image" name="image">
                                    </div>

                                    <div class="form-group col-md-4 mt-20">
                                        <label for="facebook">
                                            Facebook
                                        </label>

                                        <input type="url" class="form-control" value="{{ $information->facebook }}" id="facebook" name="facebook">
                                    </div>

                                    <div class="form-group col-md-4 mt-20">
                                        <label for="twitter">
                                            Twitter
                                        </label>

                                        <input type="url" class="form-control" value="{{ $information->twitter }}" id="twitter" name="twitter">
                                    </div>

                                    <div class="form-group col-md-4 mt-20">
                                        <label for="youtube">
                                            Youtube
                                        </label>

                                        <input type="url" class="form-control" value="{{ $information->youtube }}" id="youtube" name="youtube">
                                    </div>

                                    <div class="form-group col-md-4 mt-20">
                                        <label for="google">
                                            Google
                                        </label>

                                        <input type="url" class="form-control" value="{{ $information->google }}" id="google" name="google">
                                    </div>

                                    <div class="form-group col-md-4 mt-20">
                                        <label for="linkedin">
                                            Linkedin
                                        </label>

                                        <input type="url" class="form-control" value="{{ $information->linkedin }}" id="linkedin" name="linkedin">
                                    </div>

                                    <div class="form-group col-md-4 mt-20">
                                        <label for="instagram">
                                            Instagram
                                        </label>

                                        <input type="url" class="form-control" value="{{ $information->instagram }}" id="instagram" name="instagram">
                                    </div>

                                    <div class="form-group col-md-4 mt-20">
                                        <label for="pinterest">
                                            Pinterest
                                        </label>

                                        <input type="url" class="form-control" value="{{ $information->pinterest }}" id="pinterest" name="pinterest">
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
    <script src="{{ asset('/admin/js/fastclick.js') }}"></script>
    <script src="{{ asset('/admin/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('/admin/js/jquery.slimscroll.min.js') }}"></script>
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