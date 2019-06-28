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
                <div class="col-sm-9">
                    <h4 class="page-title">FAQ</h4>
                </div>
            </div>
            <!-- End Breadcrumb-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="pt-2 pb-4">
                                <a href="{{ route('faq.admin.create') }}" id="doadd"
                                   class="btn btn-primary btn-square waves-effect waves-light m-1">
                                    <i class="zmdi zmdi-plus"></i>
                                    <span>Add</span>
                                </a>
                                <a id="dodelete" class="sil btn btn-danger btn-square waves-effect waves-light m-1">
                                    <i class="zmdi zmdi-delete"></i>
                                    <span>Delete</span>
                                </a>
                                <a id="doactive" class="aktiv btn btn-success btn-square waves-effect waves-light m-1">
                                    <i class="zmdi zmdi-eye"></i>
                                    <span>Active </span>
                                </a>
                                <a id="dopassive" class="passiv btn btn-dark btn-square waves-effect waves-light m-1">
                                    <i class="zmdi zmdi-eye-off"></i>
                                    <span>Passive </span>
                                </a>
                                <a class="btn btn-excel  btn-square waves-effect waves-light m-1" type="button"
                                   id="doexcel" onclick="$('.table').tblToExcel();">
                                    <i class="fa fa-file-excel-o"></i>
                                    <span>Excel</span>
                                </a>
                            </div>
                            @if(count($list)==0)
                                <div class="alert alert-warning mb-0" role="alert">
                                    <div class="alert-icon">
                                        <i class="fa fa-exclamation-triangle"></i>
                                    </div>
                                    <div class="alert-message">
                                        <span><strong>Diqqət!</strong>  Burada hər hansı bir Faq mövcud deyil! Faq əlavə etmək üçün <a
                                                    href="{{ route('faq.admin.create') }}"
                                                    class="text-muted font-weight-bold">klik edin.</a></span>
                                    </div>
                                </div>
                            @endif
                        </div>
                        @if(count($list)>0)
                            <div class="col-md-12 my-2">
                                <form class="form-inline" action="{{ route('faq.admin.index') }}" method="get"
                                      id="filterform">
                                    {{ csrf_field() }}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label> Show
                                                <select name="length" aria-controls="example1"
                                                        class="form-control input-sm  mx-sm-3"
                                                        onchange="this.form.submit()">
                                                    <option value="0">0</option>
                                                    <option value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select> element
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {{ $list->appends('search',old('search'))->appends('length',old('length'))->links() }}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group float-right">
                                            <div id="example1_filter">
                                                <label>
                                                    Search:<input type="search" id="search"
                                                                  class="form-control input-sm  mx-sm-3 "
                                                                  placeholder="Search..." onchange="this.form.submit()"
                                                                  name="search" value="{{ old('search') }}">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" class="d-none">
                                </form>
                            </div>
                            <div class="table-responsive-sm bt-switch col-md-12 container my-2">
                                <table class="table table-sm table-bordered table-hover table-striped text-center"
                                       id="nestable" data-url="{{ route('faq.admin.sort') }}">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>Seç</th>
                                        <th>Nömrə</th>
                                        <th>Sual</th>
                                        <th>Cavab</th>
                                        <th>Status</th>
                                        <th>Dəyiş</th>
                                    </tr>
                                    </thead>
                                    <tbody class="sortable">
                                    @foreach($list as $faq)
                                        <tr role="row" class="even tr" data-id="{{ $faq->id }}">
                                            <td class="handler"><i class="fa fa-arrows-alt"></i></td>
                                            <td>
                                                <div class="icheck-material-primary icheck-inline">
                                                    <input type="checkbox" id="{{ $faq->id }}" name="check[]"
                                                           value="{{ $faq->id }}"/>
                                                    <label for="{{ $faq->id }}"></label>
                                                </div>
                                            </td>
                                            <td>{{ $faq->id }}</td>
                                            <td>{{ $faq->question }}</td>
                                            <td>{!! $faq->reply !!}</td>
                                            <td>
                                                @if($faq->status=='1')
                                                    <input class="my_check" type="checkbox" checked
                                                           data-on-color="success"
                                                           data-off-color="default" data-size="small"
                                                           data-on-text="<i class='zmdi zmdi-eye'></i>"
                                                           data-off-text="<i class='zmdi zmdi-eye-off'></i>">

                                                @else
                                                    <input class="my_check" type="checkbox" data-on-color="success"
                                                           data-off-color="default" data-size="small"
                                                           data-on-text="<i class='zmdi zmdi-eye'></i>"
                                                           data-off-text="<i class='zmdi zmdi-eye-off'></i>">

                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('faq.admin.edit',$faq->id) }}" class="mx-2"
                                                   title="edit"><i class="zmdi zmdi-edit"></i></a>
                                                <a href="{{ route('faq.admin.show',$faq->id) }}" class="mx-2"
                                                   title="show"><i class="fa fa-eye"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12 my-2">
                                <form class="form-inline" action="{{ route('faq.admin.index') }}" method="get"
                                      id="filterform">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>
                                                Show <select name="length" aria-controls="example1"
                                                             class="form-control input-sm  mx-sm-3 "
                                                             onchange="this.form.submit()">
                                                    <option value="0">0</option>
                                                    <option value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select> element
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {{ $list->appends('search',old('search'))->appends('length',old('length'))->links() }}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group float-right">
                                            <div id="example1_filter">
                                                <label>
                                                    Search:<input type="search" id="search"
                                                                  class="form-control input-sm  mx-sm-3 "
                                                                  placeholder="Search..." onchange="this.form.submit()"
                                                                  name="search" value="{{ old('search') }}">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" class="d-none">
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @include('admin.include.footer')
    </div>
@endsection
@section('scripts')
    <script src="/admin/js/jquery.tableToExcel.js"></script>

    <script>
        $(document).ready(function () {
            $('#checkall').click(function () {
                if ($(this).is(':checked')) {
                    $('.even td input').attr('checked', true);
                } else {
                    $('.even td input').attr('checked', false);
                }
            });

            var ckbox = $("input[name='check[]']");
            var csrf = $("input[name='_token']").val();
            var doactive = $("#doactive");
            var dopassive = $("#dopassive");
            var dodelete = $("#dodelete");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrf
                }
            });
            ckbox.on('click', function () {
                $(this).each(function () {
                    var fieldid = $(this).val();
                    doactive.click(function () {
                        $.ajax({
                            type: 'post',
                            url: '/admin/faq/doactive',
                            data: {
                                '_token': csrf,
                                'id': fieldid
                            },
                            dataType: 'json',
                            success: function (data) {
                                window.location.href = data.faq;
                            }
                        });
                    });


                    dopassive.click(function () {
                        $.ajax({
                            type: 'post',
                            url: '/admin/faq/dopassive',
                            data: {
                                '_token': csrf,
                                'id': fieldid
                            },
                            dataType: 'json',
                            success: function (data) {
                                window.location.href = data.faq;
                            }
                        });
                    });
                    dodelete.click(function () {
                        $.ajax({
                            type: 'delete',
                            url: '/admin/faq/delete',
                            data: {
                                '_token': csrf,
                                'id': fieldid
                            },
                            dataType: 'json',
                            success: function (data) {
                                window.location.href = data.faq;
                            }
                        });
                    });
                });
            });

        });
    </script>
@endsection