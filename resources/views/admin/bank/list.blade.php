@extends('admin.layouts.master')
@section('head')
    <style>
        #doadd{background-color: #3c8dbc;color: white;}
        #dodelete{background-color: red;color: white;}
        #doactive{background-color: green;color: white;}
        #dopassive{background-color: #1d1d1d;color: white;}
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
                        <h3 class="box-title">Banklar</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @if(!$bank)
                        <a class="btn btn-app" href="{{ route('bank.admin.create') }}" id="doadd">
                            <i class="fas fa-plus"></i> Əlavə et
                        </a>
                        <a class="btn btn-app" id="dodelete">
                            <i class="fas fa-trash"></i> Sil
                        </a>
                        <a class="btn btn-app" href="" id="doactive">
                            <i class="fas fa-eye"></i> Aktiv et
                        </a>
                        <a class="btn btn-app" href="" id="dopassive">
                            <i class="fas fa-eye-slash"></i> Passiv et
                        </a>
                        @endif
                        @if(is_array($list) && count($list)>0)
                        <div class="form-inline col-md-12 row mtb-10">
                            <form action="{{ route('bank.admin.index') }}" method="get" id="filterform">
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
                                    <table id="nestable" class="table table-responsive table-bordered table-striped table-hover" role="grid" data-url="{{ route('bank.admin.sort') }}">
                                        <thead>
                                            <tr role="row" class="even">
                                                <th></th>
                                                <th>Seç</th>
                                                <th>Nömrə</th>
                                                <th>Adı</th>
                                                <th>Link Adı</th>
                                                <th>Şəkli</th>
                                                <th>Status</th>
                                                <th width="120">Dəyiş</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(empty($bank))
                                                @foreach($list as $bank)
                                            <tr role="row" class="even tr" data-id="{{ $bank->id }}">
                                                <td class="handler" style="cursor: pointer;">
                                                    <i class="fas fa-arrows-alt"></i>
                                                </td>
                                                <td><input type="checkbox" name="check[]" value="{{ $bank->id }}"></td>
                                                <td>{{ $bank->id }}</td>
                                                <td>{{ $bank->name }}</td>
                                                <td>{{ $bank->slug }}</td>
                                                <td><img src="/uploads/bank/{{ $bank->id }}/large/{{ $bank->image }}" alt="{{ $bank->name }}" class="h50"></td>
                                                <td>
                                                    @if($bank->status=='1')
                                                        <i class="far fa-eye green"></i>
                                                    @else
                                                        <i class="far fa-eye-slash red"></i>
                                                    @endif
                                                </td>
                                                <td class="status">
                                                    <a href="{{ route('bank.admin.edit',$bank->id) }}">
                                                        <span class="glyphicon glyphicon-edit"></span>
                                                    </a>
                                                    <a href="{{ route('bank.admin.show',$bank->id) }}">
                                                        <span class="glyphicon glyphicon-eye-open"></span>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                                @else
                                                <tr role="row" class="even tr" data-id="{{ $bank->id }}">
                                                    <td class="handler" style="cursor: pointer;">
                                                        <i class="fas fa-arrows-alt"></i>
                                                    </td>
                                                    <td><input type="checkbox" name="check[]" value="{{ $bank->id }}"></td>
                                                    <td>{{ $bank->id }}</td>
                                                    <td>{{ $bank->name }}</td>
                                                    <td>{{ $bank->slug }}</td>
                                                    <td><img src="/uploads/bank/{{ $bank->id }}/large/{{ $bank->image }}" alt="{{ $bank->name }}" class="h50"></td>
                                                    <td>
                                                        @if($bank->status=='1')
                                                            <i class="far fa-eye green"></i>
                                                        @else
                                                            <i class="far fa-eye-slash red"></i>
                                                        @endif
                                                    </td>
                                                    <td class="status">
                                                        <a href="{{ route('bank.admin.edit',$bank->id) }}">
                                                            <span class="glyphicon glyphicon-edit"></span>
                                                        </a>
                                                        <a href="{{ route('bank.admin.show',$bank->id) }}">
                                                            <span class="glyphicon glyphicon-eye-open"></span>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @if(is_array($list) && count($list)>0)
                        <div class="form-inline col-md-12 row mtb-10">
                            <form action="{{ route('bank.admin.index') }}" method="get" id="filterform">
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
    <!-- FastClick -->
    <script src="/admin/js/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="/admin/js/adminlte.min.js"></script>
    <!-- SlimScroll -->
    <script src="/admin/js/jquery.slimscroll.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#checkall').click(function() {
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
            ckbox.on('click',function () {
                $(this).each( function () {
                    var fieldid = $(this).val();
                    doactive.click(function() {
                        $.ajax({
                            type: 'post',
                            url: '/admin/bank/doactive',
                            data: {
                                '_token': csrf,
                                'id': fieldid
                            },
                            dataType: 'json',
                            success: function(data) {
                                window.location.href = data.bank;
                            }
                        });
                    });
                    dopassive.click(function() {
                        $.ajax({
                            type: 'post',
                            url: '/admin/bank/dopassive',
                            data: {
                                '_token': csrf,
                                'id': fieldid
                            },
                            dataType: 'json',
                            success: function(data) {
                                window.location.href = data.bank;
                            }
                        });
                    });
                    dodelete.click(function() {
                        $.ajax({
                            type: 'delete',
                            url: '/admin/bank/delete',
                            data: {
                                '_token': csrf,
                                'id': fieldid
                            },
                            dataType: 'json',
                            success: function(data) {
                                window.location.href = data.bank;
                            }
                        });
                    });
                });
            });

        });
    </script>
@endsection