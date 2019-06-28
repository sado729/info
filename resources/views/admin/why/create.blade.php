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
                    <h4 class="page-title">Add FAQ</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('faq.admin.index') }}">FAQ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add FAQ</li>
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
                                    <li class="nav-item">
                                        <a class="nav-link {{$code=='en' ? 'active' : ''}}" data-toggle="tab"
                                           href="#tab_{{$code}}">
                                            <img height="16" src="/admin/flags/4x3/{{$code=='en'?'gb':$code}}.svg"
                                                 alt="aze">
                                            <span class="hidden-xs">{{$props['native']}} </span></a>
                                    </li>
                                @endforeach
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                @foreach($locales as $code => $props)
                                    <div id="#tab_{{$code}}" class="container tab-pane {{$code=='en' ? 'active' : ''}}">
                                        <form role="form" action="{{ route('faq.admin.store') }}" method="post"
                                              enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="question" class="col-form-label">Sual</label>
                                                    <input type="text" class="form-control" placeholder="Sual"
                                                           id="question" name="question">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="editor1">Text</label>
                                                    <textarea name="reply" id="editor1"></textarea>
                                                </div>

                                                {{ csrf_field() }}
                                                <div class="form-footer col-md-12">
                                                    <a href="{{ route('faq.admin.index') }}" id="cancel" type="submit"
                                                       class="btn btn-danger"><i
                                                                class="fa fa-times"></i>Cancel</a>
                                                    <button id="save" type="submit" class="btn btn-success"><i
                                                                class="fa fa-check-square-o"></i> Save
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Row-->
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