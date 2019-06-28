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
                    <h4 class="page-title">Network</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Network</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Referrals</li>
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
                                    <a class="nav-link active" data-toggle="tab" href="#tabe-explorer">
                                        <span class="hidden-xs">Network Explorer</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabe-left">
                                        <span class="hidden-xs">Left team</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabe-right">
                                        <span class="hidden-xs">Right team</span>
                                    </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->

                            <div class="tab-content">
                                <div id="tabe-explorer" class="container tab-pane active">
                                    <div class="row"></div>
                                </div>
                                <div id="tabe-left" class="container tab-pane fade">
                                    <div class="row"></div>
                                </div>
                                <div id="tabe-right" class="container tab-pane fade">
                                    <div class="row"></div>
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
