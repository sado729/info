@extends('layouts.admin.master')
@section('head')
@endsection
@section('content')
    @include('admin.include.sidebar')
    @include('admin.include.header')

    <!--Start content-wrapper-->
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumb-->
            <div class="row pt-2 pb-2">
                <div class="col-md-12">
                    <h4 class="page-title">Add Service</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('service.admin.index') }}">Service</a></li>
                    </ol>
                </div>
            </div>
            <!-- End Breadcrumb-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs nav-tabs-info nav-justified">
                                @foreach($locales as $code => $props)
                                    <li  class="nav-item">
                                        <a  class="nav-link {{$code=='en' ? 'active' : ''}}" data-toggle="tab" href="#tab_{{$code}}">
                                            <img height="16" src="/admin/flags/4x3/{{$code=='en'?'gb':$code}}.svg"  alt="aze">
                                            <span class="hidden-xs">{{$props['native']}} </span></a>
                                    </li>
                                @endforeach
                            </ul>
                            <form role="form" action="{{ route('service.admin.store') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="tab-content">
                                    @foreach($locales as $code => $props)
                                        <div id="tabe_{{ $code }}" class="tab-pane{{ ($code=='az') ? ' active' : ''}}">
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="name-{{ $code }}" class="col-form-label">Name</label>
                                                    <input type="text" class="form-control" placeholder="Ad" id="name-{{ $code }}" name="name:{{ $code }}" maxlength="100">
                                                </div>
                                                <div class="form-group col-md-4 ">
                                                    <label for="slug-{{ $code }}" class="col-form-label">Slug</label>
                                                    <input type="text" class="form-control" placeholder="Slug" id="slug-{{ $code }}" name="slug:{{ $code }}">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="editor1">Text</label>
                                                    <textarea name="text:{{ $code }}" id="editor1"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="file">
                                                    Xidmətin Şəkilləri <i>[CTRL basılı saxlayıb bir neçəsini seçə bilərsiniz]</i>
                                                </label>

                                                <input type="file" class="form-control" accept="image/*" id="file" name="image" multiple>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="file">
                                                    Xidmətin Şəkilləri 2<i>[CTRL basılı saxlayıb bir neçəsini seçə bilərsiniz]</i>
                                                </label>

                                                <input type="file" class="form-control" accept="image/*" id="image" name="file[]" multiple>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="created_at">
                                                    Paylaşılma vaxtı
                                                </label>
                                                <div class="input-group date">
                                                    <input type="datetime-local" class="form-control pull-right" id="datepicker"  placeholder="Paylaşılma vaxtı" name="created_at" value="{{ \Carbon\Carbon::parse(now())->format('Y-m-d\TH:i:s') }}">
                                                </div>
                                            </div>
                                            <div class="form-footer col-md-12 mt-2 text-center">
                                                <a href="{{ route('news.admin.index') }}" id="cancel" type="submit" class="btn btn-danger">
                                                    <i class="fa fa-times"></i>Cancel</a>
                                                <button id="save" type="submit" class="btn btn-success">
                                                    <i class="fa fa-check-square-o"></i> Save
                                                </button>
                                            </div>
                                        </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.include.footer')
    </div>
@endsection
@section('scripts')
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