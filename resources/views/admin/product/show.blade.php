@extends('admin.layouts.master')
@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightcase/2.5.0/css/lightcase.min.css">
    <style>
        .gal-item{float:left;margin-right: 10px;}
        .gal-item>figure>img{max-height: 150px;border-radius: 20px;border:1px solid #0d6aad;}
        #dodelete{background-color: red;color: white;}
        #doactive{background-color: green;color: white;}
    </style>
@endsection
@section('body') skin-blue sidebar-mini @endsection
@section('content')
    @include('admin.layouts.include.header')
    @include('admin.layouts.include.sidebar')
    {{ csrf_field() }}
    <div class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>
                <strong>{{ $product->name }}</strong>
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            <a class="btn btn-app" href="{{ route('product.admin.edit',$product->id) }}">
                                <i class="fas fa-edit fa-lg fa-fw"></i> Dəyiş
                            </a>
                            <a class="btn btn-app" href="{{ route('product.admin.index') }}">
                                <i class="fas fa-undo fa-lg fa-fw"></i> Geri Qayıt
                            </a>
                            <a class="btn btn-app" id="dodelete">
                                <i class="fas fa-trash"></i> Sil
                            </a>
                            @if($product->status=='0')
                            <a class="btn btn-app" href="" id="doactive" data-id="{{ $product->id }}">
                                <i class="fas fa-eye"></i> Təsdiqlə
                            </a>
                            @endif
                            <div id="example1_wrapper" class="form-inline dt-bootstrap">
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        @if(is_file(public_path('/uploads/product/'.$product->id.'/large/'.$product->image)))
                                            <div class="text-center mb-10">
                                                <img src="/uploads/product/{{ $product->id }}/large/{{ $product->image }}" alt="{{ $product->name }}" class="mw-100">
                                            </div><br>
                                        @endif
                                        <table class="table table-responsive table-bordered table-striped table-hover" role="grid">
                                            <tbody>
                                                <tr role="row" class="even">
                                                    <td>Nömrəsi</td>
                                                    <td>{{ $product->id }}</td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td>Ad</td>
                                                    <td>{{ $product->name }}</td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td>Bank</td>
                                                    <td>{{ $product->bank->name }}</td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td>Tip</td>
                                                    <td>
                                                        {{ ($product->type=='kredit') ? 'Kredit məhsulu' : 'Kampaniya' }}
                                                    </td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td>Bank</td>
                                                    <td>{!! $product->text !!}</td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td>Status</td>
                                                    <td>
                                                        @if($product->status=='1')
                                                            <i class="far fa-eye"></i>
                                                        @else
                                                            <i class="far fa-eye-slash"></i>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td>Paylaşılma vaxtı</td>
                                                    <td>{!! $product->created_at !!}</td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td>Dəyişilmə vaxtı</td>
                                                    <td>{!! $product->updated_at !!}</td>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightcase/2.5.0/js/lightcase.min.js"></script>
    <script>
        $(document).ready(function () {
            let csrf = $("input[name='_token']").val(),
                doactive = $("#doactive"),
                dodelete = $("#dodelete"),
                fieldid = doactive.data('id');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrf
                }
            });

            doactive.click(function() {
                $.ajax({
                    type: 'post',
                    url: '/admin/product/doactive',
                    data: {
                        'id': fieldid
                    },
                    dataType: 'json',
                    success: function(data) {
                        window.location.href = data.product;
                    }
                });
            });

            dodelete.click(function() {
                $.ajax({
                    type: 'delete',
                    url: '/admin/product/delete',
                    data: {
                        'id': fieldid
                    },
                    dataType: 'json',
                    success: function(data) {
                        window.location.href = data.product;
                    }
                });
            });
        });
    </script>
@endsection