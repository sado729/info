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
                    <h4 class="page-title">{{ $menu->name }}</h4>
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
                            <div class="pt-2 pb-4">
                                <a href="{{ route('menu.admin.edit',$menu->id) }}"
                                   class="btn btn-primary btn-square waves-effect waves-light m-1">
                                    <i class="fa fa-edit"></i>
                                    <span>Update</span>
                                </a>
                                <a id="dodelete" class="sil btn btn-danger btn-square waves-effect waves-light m-1">
                                    <i class="zmdi zmdi-delete"></i>
                                    <span>Delete</span>
                                </a>
                                <a href="{{ route('menu.admin.index') }}" class="btn btn-warning btn-square waves-effect waves-light m-1">
                                    <i class="icon-action-undo"></i>
                                    <span>Previous </span>
                                </a>

                                <a class="btn btn-excel  btn-square waves-effect waves-light m-1" type="button"
                                   id="doexcel" onclick="$('.table').tblToExcel();">
                                    <i class="fa fa-file-excel-o"></i>
                                    <span>Excel</span>
                                </a>
                            </div>
                            <div class="col-md-8 offset-md-2 text-center">
                                <table class="table table-lg table-responsive-md table-bordered table-striped table-hover text-center" role="grid">
                                 <tbody>
                                    <tr role="row" class="even">
                                            <td>Nömrəsi</td>
                                            <td>{{ $menu->id }}</td>
                                        </tr>
                                        <tr role="row" class="even">
                                            <td>Adı</td>
                                            <td>{{ $menu->name }}</td>
                                        </tr>
                                        <tr role="row" class="even">
                                            <td>Link adı</td>
                                            <td>{{ $menu->slug }}</td>
                                        </tr>
                                        <tr role="row" class="even">
                                            <td>Icon</td>
                                            <td><img src="/uploads/menu/{{ $menu->id }}/{{ $menu->image }}" alt="{{ $menu->name }}"></td>
                                        </tr>
                                        <tr role="row" class="even">
                                            <td>Mətn</td>
                                            <td>{!! $menu->text !!}</td>
                                        </tr>
                                        <tr role="row" class="even">
                                            <td>Status</td>
                                            <td>
                                                @if($menu->status=='1')
                                                    <i class="zmdi zmdi-eye"></i>
                                                @else
                                                    <i class="zmdi zmdi-eye-off"></i>
                                                @endif
                                            </td>
                                        </tbody>
                                    </table>
                                <h3>SEO</h3>
                                <table class="table table-lg table-responsive-md table-bordered table-striped table-hover text-center" role="grid">
                                    <tr role="row" class="even">
                                        <td>Title</td>
                                        <td>{{ $menu->title }}</td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td>Keywords</td>
                                        <td>{{ $menu->keywords }}</td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td>Description</td>
                                        <td>{{ $menu->description }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Row-->

        </div>
    </div>
@endsection
@section('scripts')
    <script src="/admin/js/jquery.tableToExcel.js"></script>
@endsection