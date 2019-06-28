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
                    <h4 class="page-title">Zurou</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profile Edit</li>
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
                                    <div class="col-xl-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="currentPass">Current password<span class="requred"></span></label>
                                            <input type="password" class="form-control" id="currentPass">
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="emailAdress">E-mail adress<span class="requred">*</span></label>
                                            <input type="email" class="form-control" id="emailAdress" value="zurou@outlook.com" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="InputPass1">Password<span class="requred"></span></label>
                                            <input type="password" class="form-control" id="InputPass1">
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="InputPass2">Confirm password<span class="requred"></span></label>
                                            <input type="password" class="form-control" id="InputPass2">
                                        </div>
                                    </div>

                                    <div class="col-xl-12 col-lg-12">
                                        <div class="row d-flex">
                                            <div class="col-xl-12">
                                                <button type="submit" class="btn btn-light">Save</button>
                                            </div>
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
