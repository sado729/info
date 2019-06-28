@extends('admin.layouts.master')
@section('body') skin-blue sidebar-mini @endsection
@section('content')
    @include('admin.layouts.include.header')
    @include('admin.layouts.include.sidebar')
    <div class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>
                <strong>{{ $category->name }}</strong> kateqoriyasi
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Ana Səhifə</a></li>
                <li><a href="{{ route('category.admin.index') }}">Kateqoriyalar</a></li>
                <li class="active"><strong>{{ $category->name }}</strong> kateqoriyası</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            <a class="btn btn-app" href="{{ route('category.admin.edit',$category->id) }}">
                                <i class="fas fa-edit fa-lg fa-fw"></i> Dəyiş
                            </a>
                            <a class="btn btn-app" href="{{ route('category.admin.index') }}">
                                <i class="fas fa-undo fa-lg fa-fw"></i> Geri Qayıt
                            </a>
                            <div id="example1_wrapper" class="form-inline dt-bootstrap">
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <table class="table table-responsive table-bordered table-striped table-hover" role="grid">
                                            <tbody>
                                                <tr role="row" class="even">
                                                    <td>Nömrəsi</td>
                                                    <td>{{ $category->id }}</td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td>Adı</td>
                                                    <td>{{ $category->name }}</td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td>Link adı</td>
                                                    <td>{{ $category->slug }}</td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td>Ikon</td>
                                                    @if(!empty($category->icon))
                                                    <td><img src="/uploads/category/{{ $category->icon }}" alt="{{ $category->name }}"></td>
                                                    @else
                                                    <td>Yoxdur</td>
                                                    @endif
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td>Status</td>
                                                    <td>
                                                        @if($category->status=='1')
                                                            <i class="far fa-eye"></i>
                                                        @else
                                                            <i class="far fa-eye-slash"></i>
                                                        @endif
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
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