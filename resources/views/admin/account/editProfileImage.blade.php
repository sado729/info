@extends('layouts.admin.master')
@section('head')
    <style>

        .region .form-save {
            margin-top: 55px;
        }


    </style>
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
                    <h4 class="page-title">Edit Profile Image profile for zurou</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Network</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profile Image Edit</li>
                    </ol>
                </div>
            </div>
            <!-- End Breadcrumb-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs nav-tabs-info nav-justified">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tabe-view">
                                        <span class="hidden-xs">View</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabe-edit">
                                        <span class="hidden-xs">Edit</span>
                                    </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->

                            <div class="tab-content">
                                <div id="tabe-view" class="tab-pane active">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="region region-content">
                                                <div id="block-system-main" class="block block-system clearfix">


                                                    <div class="entity entity-profile2 profile2-profile-image clearfix">


                                                        <div class="content">
                                                            <div class="field field-name-field-member-profile-image field-type-imagefield-crop field-label-above">
                                                                <div class="field-label">Profile Image:&nbsp;</div>
                                                                <div class="field-items">
                                                                    <div class="field-item even">
                                                                        <img src="/admin/img/avatars/avatar-2.png"
                                                                             alt="profile image">
                                                                        <div class="mt-3 col-md-12">
                                                                            <button type="submit" class="btn btn-danger text-white" alt="remove" title="Remove">Remove</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div> <!-- /.block -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="tabe-edit" class="tab-pane fade">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="region region-content">
                                                <div id="block-system-main" class="clearfix">
                                                    <form enctype="multipart/form-data"
                                                          action="/profile-profile_image/33/edit" method="post"
                                                          id="profile2-edit-profile-image-form" accept-charset="UTF-8">
                                                        <div class="form-group col-md-4 mt-2 "> <label for="file"> Profile Image </label>
                                                            <input type="file" class="form-control " accept="image/*" id="file">
                                                        </div>
                                                        <div class="box-footer col-md-12">
                                                            <button type="submit" class="btn btn-primary" alt="Upload" title="Upload">Upload</button>
                                                        </div>
                                                        <div class="form-save col-md-12">
                                                            <button type="submit" class="btn btn-primary" alt="Save" title="Save">Save</button>
                                                        </div>
                                                    </form>
                                                </div> <!-- /.block -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.include.footer')
    </div>
@endsection
