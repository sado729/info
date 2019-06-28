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
                        <li class="breadcrumb-item active" aria-current="page">My Support Requests & Resolutions</li>
                    </ol>
                </div>
            </div>
            <!-- End Breadcrumb-->
            <div class="row">
                <div class="col-lg-12 mx-auto">
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
                                        <div class="form-group col-md-3 mt-1">
                                            <label for="MySupportTitle">Title<span class="requred">*</span></label>
                                            <input type="text" class="form-control" id="MySupportTitle" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="InputCountry">Priority<span class="requred">*</span></label>
                                            <select class="form-control" id="InputCountry">
                                                <option value="highest">Highest</option>
                                                <option value="high">High</option>
                                                <option value="medium">Medium</option>
                                                <option value="low">Low</option>
                                                <option value="lowest">Lowest</option>
                                            </select>
                                      </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="InputCountry">Status<span class="requred">*</span></label>
                                            <select id="edit-status" name="status" class="form-select form-control">
                                                <option value="All" selected="selected">- Any -</option>
                                                <option value="1">Open</option>
                                                <option value="2">On Hold</option>
                                                <option value="3">Escalated</option>
                                                <option value="4">Pending</option>
                                                <option value="5">Waiting on Customer Reply</option>
                                                <option value="6">Waiting on Third Party</option>
                                                <option value="7">Customer Reply</option>
                                                <option value="8">Completed</option>
                                                <option value="9">Closed</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-3">
                                        <div class="form-group supb">
                                            <input type="submit" class="btn btn-light text-white form-control" value="Submit">
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card pb-5">
                        <div class="card-bdoy">
                            <p class="page-title p-4">Operations</p>

                            <div class="form-group col-md-3">
                                <select id="edit-operation" name="operation" class="form-select form-control">
                                    <option value="0">- Choose an operation -</option>
                                    <option value="action::afl_general_support_closed">Mark as closed</option>
                                </select>
                            </div>
                            <div class="input-group col-md-12">
                                <input type="text" class="form-control" disabled value="No Records.  ">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-refresh fa-spin"></i></span>
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
@section('scripts')

@endsection