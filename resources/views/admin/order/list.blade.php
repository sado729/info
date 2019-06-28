@extends('admin.layouts.master')
@section('head')
    <link rel="stylesheet" href="/admin/css/sortable-theme-bootstrap.min.css">
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <style>
        #dodelete{background-color: red;color: white;}
        #doactive{background-color: green;color: white;}
        #dopassive{background-color: #1d1d1d;color: white;}
        #doexcel{background-color: #1A7343;color: white;}
        .none{display: none !important;}
        .mtb-10{margin:10px 0px;}
        .fr{float: right;}
        .form-inline .form-control{margin: 0px 10px;}
        .pagination{margin: 0px;}
        .h50{height: 50px;}
    </style>
@endsection
@section('body') skin-blue sidebar-mini @endsection
@section('content')
    @include('admin.layouts.include.header')
    @include('admin.layouts.include.sidebar')
    <div class="content-wrapper" style="min-height: 960px;">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Sifarişlər</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <a class="btn btn-app" id="dodelete">
                            <i class="fas fa-trash"></i> Sil
                        </a>
                        <a class="btn btn-app" href="" id="doactive">
                            <i class="fas fa-eye"></i> Aktiv et
                        </a>
                        <a class="btn btn-app" href="" id="dopassive">
                            <i class="fas fa-eye-slash"></i> Passiv et
                        </a>
                        <a class="btn btn-app" type="button" id="doexcel" onclick="$('.table').tblToExcel();">
                        <i class="fas fa-file-excel"></i> Excel
                        </a>
                        @if(count($list)>0)
                        <div class="form-inline col-md-12 row mtb-10">
                            <form action="{{ route('order.admin.index') }}" method="get" id="filterform">
                                <div class="col-md-4">
                                    <label>
                                        Göstər <select name="length" aria-controls="example1" class="form-control input-sm" onchange="this.form.submit()">
                                            <option value="0">0</option>
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select> element
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    {{ $list->appends('search',old('search'))->appends('length',old('length'))->links() }}
                                </div>
                                <div class="col-md-4">
                                    <div id="example1_filter" class="dataTables_filter fr">
                                        <label>
                                            Axtarış:<input type="search" id="search" class="form-control input-sm" placeholder="Axtar..." onchange="this.form.submit()" name="search" value="{{ old('search') }}">
                                        </label>
                                    </div>
                                </div>
                                <input type="submit" class="none">
                            </form>
                        </div>
                        @endif
                        {{ csrf_field() }}
                        
                        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                          <div class="row">
                                <div class="col-sm-12">
                                    <table id="nestable my-table" class="table table-responsive table-bordered table-striped table-hover sortable-theme-bootstrap" role="grid">
                                        <thead>
                                            <tr role="row" class="even">
                                                <th>Seç</th>
                                                <th>Ad Soyad</th>
                                                <th>Nömrə</th>
                                                <th>Email</th>
                                                @if(!$admin->isbank)<th>Müraciət etdiyi banklar</th>@endif
                                                <th>Tarix</th>
                                                @if($admin->isbank)<th>Status</th>@endif
                                                <th width="120">Sifarişə Bax</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($list as $order)
                                            <tr role="row" class="even tr" data-id="{{ $order->id }}">
                                                <td><input type="checkbox" name="check[]" value="{{ $order->id }}"></td>
                                                <td>{{ $order->name.' '.$order->surname }}</td>
                                                <td>{{ $order->phone }}</td>
                                                <td>{{ $order->email }}</td>
                                                @if(!$admin->isbank)
                                                <td>{{ implode(' , ',array_pluck($list[0]->banks,'name')) }}</td>
                                                @endif
                                                <td>{{ $order->created_at }}</td>
                                                @if($admin->isbank)
                                                <td>
                                                    @if($order->details[0]['status']=='accept')
                                                        <i class="fas fa-eye green"></i>
                                                    @elseif($order->details[0]['status']=='reject')
                                                        <i class="fas fa-eye-slash red"></i>
                                                    @else
                                                        <i class="far fa-clipboard yellow"></i>
                                                    @endif
                                                </td>
                                                @endif
                                                <td class="status">
                                                    <a href="{{ route('order.admin.show',$order->id) }}">
                                                        <span class="glyphicon glyphicon-eye-open"></span>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        @if(count($list)>0)
                        <div class="form-inline col-md-12 row mtb-10">
                            <form action="{{ route('order.admin.index') }}" method="get" id="filterform">
                                <div class="col-md-4">
                                    <label>
                                        Göstər <select name="length" aria-controls="example1" class="form-control input-sm" onchange="this.form.submit()">
                                            <option value="0">0</option>
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select> element
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    {{ $list->appends('search',old('search'))->appends('length',old('length'))->links() }}
                                </div>
                                <div class="col-md-4">
                                    <div id="example1_filter" class="dataTables_filter fr">
                                        <label>
                                            Axtarış:<input type="search" id="search" class="form-control input-sm" placeholder="Axtar..." onchange="this.form.submit()" name="search" value="{{ old('search') }}">
                                        </label>
                                    </div>
                                </div>
                                <input type="submit" class="none">
                            </form>
                        </div>
                        @endif
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
    <script src="/admin/js/fastclick.js"></script>
    <script src="/admin/js/adminlte.min.js"></script>
    <script src="/admin/js/jquery.slimscroll.min.js"></script>
    <script src="/admin/js/jquery.tableToExcel.js"></script>

    <script>
        $(document).ready(function () {
            let ckbox = $("input[name='check[]']"),
                csrf = $("input[name='_token']").val(),
                doactive = $("#doactive"),
                dopassive = $("#dopassive"),
                dodelete = $("#dodelete"),
                checkall = $('#checkall');

            checkall.click(function() {
                if ($(this).is(':checked')) {
                    $('.even td input').attr('checked', true);
                } else {
                    $('.even td input').attr('checked', false);
                }
            });
            

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrf
                }
            });
            ckbox.on('click',function () {
                $(this).each( function () {
                    let fieldid = $(this).val();
                    doactive.click(function() {
                        $.ajax({
                            type: 'post',
                            url: '/admin/order/doactive',
                            data: {
                                '_token': csrf,
                                'id': fieldid
                            },
                            dataType: 'json',
                            success: function(data) {
                                window.location.href = data.order;
                            }
                        });
                    });
                    dopassive.click(function() {
                        $.ajax({
                            type: 'post',
                            url: '/admin/order/dopassive',
                            data: {
                                '_token': csrf,
                                'id': fieldid
                            },
                            dataType: 'json',
                            success: function(data) {
                                window.location.href = data.order;
                            }
                        });
                    });
                    dodelete.click(function() {
                        $.ajax({
                            type: 'delete',
                            url: '/admin/order/delete',
                            data: {
                                '_token': csrf,
                                'id': fieldid
                            },
                            dataType: 'json',
                            success: function(data) {
                                window.location.href = data.order;
                            }
                        });
                    });
                });
            });

        });
    </script>
 
@endsection