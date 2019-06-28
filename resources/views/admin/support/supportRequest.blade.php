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
                    <h4 class="page-title">Support</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Support Request</li>
                    </ol>
                </div>
            </div>
            <!-- End Breadcrumb-->
            <div class="row">
                <div class="col-lg-8 mx-auto">
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
                            <form class="contact-form">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="SupportTitle">Title<span class="requred">*</span></label>
                                            <input type="text" class="form-control" id="SupportTitle" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="InputCountry">Priority<span class="requred">*</span></label>
                                            <select class="form-control" id="InputCountry" class="form-control">
                                                <option value="highest">Highest</option>
                                                <option value="high">High</option>
                                                <option value="medium">Medium</option>
                                                <option value="low">Low</option>
                                                <option value="lowest">Lowest</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="editor1">Text</label>
                                        <textarea name="text:{{ $code }}" id="editor1"></textarea>
                                    </div>

                                  <div class="form-group col-md-12" id="attachment">
                                     <div id="attch1">
                                         <label for="file">
                                             Attachment #1
                                         </label>

                                         <div class="input-group ">
                                             <input type="file" class="form-control" accept="image/*" id="file" name="image">
                                             <div class="input-group-append">
                                                 <button class="btn btn-light text-white" type="button">Upload</button>
                                             </div>
                                         </div>
                                     </div>
                                  </div>

                                    <div class=" col-md-12  ">
                                        <button id="addFile" type="button" class="btn btn-primary">
                                            <i class="fa fa-plus-square"></i> Add New File
                                        </button>
                                        <button  id="removeFile" type="button" class="btn btn-danger">
                                            <i class="fa fa-times"></i>Remove File
                                        </button>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <button class="btn btn-light text-white" type="submit">Submit</button>
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