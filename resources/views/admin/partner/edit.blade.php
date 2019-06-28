@extends('admin.layouts.master')
@section('head')
    <style>
        .nav-tabs-custom>.tab-content{padding: 0;}
        .mt-20{margin-top: 20px;}
    </style>
@endsection
@section('body') skin-blue sidebar-mini @endsection
@section('content')
    @include('admin.layouts.include.header')
    @include('admin.layouts.include.sidebar')
    <div class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>
                <strong>{{ $partner->name }}</strong> partnerini dəyiş
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Ana Səhifə</a></li>
                <li><a href="{{ route('partner.admin.index') }}">Partner</a></li>
                <li class="active"><strong>{{ $partner->name }}</strong> partnerini dəyiş</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            @include('admin.layouts.include.errors')
                            <form role="form" action="{{ route('partner.admin.update',['id' => $partner->id]) }}" method="post" enctype="multipart/form-data">

                                <div class="col-md-12">

                                    <div class="form-group col-md-4 mt-20">
                                        <label for="name">
                                            Ad
                                        </label>

                                        <input type="text" class="form-control" value="{{ $partner->name }}" id="name" name="name">
                                    </div>

                                    <div class="form-group col-md-4 mt-20">
                                        <label for="url">
                                            Link
                                        </label>
                                        <input type="text" class="form-control" value="{{ $partner->url }}" id="url" name="url">
                                    </div>

                                    <div class="form-group col-md-4 mt-20">
                                        <label for="image">
                                            Şəkil
                                        </label>

                                        <input type="file" class="form-control" accept="image/*" id="image" name="image">
                                    </div>

                                    {{ csrf_field() }}

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
    <!-- FastClick -->
    <script src="/admin/js/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="/admin/js/adminlte.min.js"></script>
    <!-- SlimScroll -->
    <script src="/admin/js/jquery.slimscroll.min.js"></script>
@endsection