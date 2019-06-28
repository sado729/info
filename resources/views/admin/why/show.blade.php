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
                    <h4 class="page-title">FAQ show</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('faq.admin.index') }}">FAQ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Show</li>
                    </ol>
                </div>
            </div>
            <!-- End Breadcrumb-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="pt-2 pb-4">
                                <a href="{{ route('faq.admin.edit',$faq->id) }}"
                                   class="btn btn-primary btn-square waves-effect waves-light m-1">
                                    <i class="fa fa-edit"></i>
                                    <span>Update</span>
                                </a>
                                <a id="dodelete" class="sil btn btn-danger btn-square waves-effect waves-light m-1">
                                    <i class="zmdi zmdi-delete"></i>
                                    <span>Delete</span>
                                </a>
                                <a href="{{ route('faq.admin.index') }}" class="btn btn-warning btn-square waves-effect waves-light m-1">
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
                                     <tr>
                                            <td>Nömrəsi</td>
                                            <td>{{ $faq->id }}</td>
                                        </tr>
                                        <tr>
                                            <td>Sual</td>
                                            <td>{{ $faq->question }}</td>
                                        </tr>
                                        <tr>
                                            <td>Cavab</td>
                                            <td>{!! $faq->reply !!}</td>
                                        </tr>

                                        <tr >
                                            <td>Status</td>
                                            <td>
                                                @if($faq->status=='1')
                                                    <i class="zmdi zmdi-eye"></i>
                                                @else
                                                    <i class="zmdi zmdi-eye-off"></i>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr >
                                            <td>Paylaşılma vaxtı</td>
                                            <td>{!! $faq->created_at !!}</td>
                                        </tr>
                                        <tr >
                                            <td>Dəyişilmə vaxtı</td>
                                            <td>{!! $faq->updated_at !!}</td>
                                        </tr>
                                    </tbody>
                                </table>
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
    <script src="/admin/js/jquery.tableToExcel.js"></script>
@endsection