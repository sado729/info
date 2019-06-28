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
                    <h4 class="page-title">Menu edit</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('menu.admin.index') }}">Menu</a></li>
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
                            <form role="form" action="{{ route('menu.admin.update',['id' => $menu->id]) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <!-- Tab panes -->
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
                                                <div class="form-group col-md-4 ">
                                                    <label for="title-{{ $code }}" class="col-form-label">Title</label>
                                                    <input type="text" class="form-control" placeholder="Title" id="title-{{ $code }}" name="title:{{ $code }}" value="{{ old('title') }}" maxlength="60">
                                                </div>
                                                <div class="form-group col-md-4 ">
                                                    <label for="keywords-{{ $code }}" class="col-form-label">Keywords</label>
                                                    <input type="text" class="form-control" placeholder="Keywords" id="keywords-{{ $code }}" name="keywords:{{ $code }}" value="{{ old('keywords') }}" maxlength="150">
                                                </div>
                                                <div class="form-group col-md-4 ">
                                                    <label for="description-{{ $code }}" class="col-form-label">Description</label>
                                                    <input type="text" class="form-control" placeholder="Description" id="description-{{ $code }}" name="description:{{ $code }}" value="{{ old('description') }}" maxlength="160">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="editor1">Text</label>
                                                    <textarea name="text:{{ $code }}" id="editor1"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="row">
                                        <div class="form-group col-md-4 mt-20">
                                            <label for="menu">
                                                Ana menyusunu seç
                                            </label>
                                            <select name="menu_id" id="menu" class="form-control">
                                                <option value="0">
                                                    yoxdur
                                                </option>

                                                @foreach($menus as $menu)
                                                    <option value="{{ $menu->id }}">
                                                        @if($menu->menu_id != 0) └ @endif
                                                        {{ $menu->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-4 mt-20">
                                            <label for="image">
                                                Şəkil <i>[Menyunun icon şəkili]</i>
                                            </label>

                                            <input type="file" class="form-control" accept="image/*" id="image" name="image">
                                        </div>

                                        <div class="form-footer col-md-12 mt-20 text-center">
                                            <a href="{{ route('menu.admin.index') }}" id="cancel" type="submit" class="btn btn-danger">
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