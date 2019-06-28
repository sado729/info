@extends('admin.layouts.master')
@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightcase/2.5.0/css/lightcase.min.css">
    <style>
        .gal-item{float:left;margin-right: 10px;}
        .gal-item>figure>img{max-height: 150px;border-radius: 20px;border:1px solid #0d6aad;}
        #dodelete{background-color: red;color: white;}
        #doactive{background-color: green;color: white;}
        #dopay{background-color: green;color: white;}
        #dopassive{background-color: red;color: white;}
        .float-left{float: left;}
        .h150{height: 150px;}
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
                <strong>{{ $order->name.' '.$order->surname }}</strong>
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            <a class="btn btn-app" href="{{ route('order.admin.index') }}">
                                <i class="fas fa-undo fa-lg fa-fw"></i> Geri Qayıt
                            </a>
                            @if($admin->admin)
                            <a class="btn btn-app" id="dodelete" data-id="{{ $order->id }}">
                                <i class="fas fa-trash"></i> Sil
                            </a>
                            @endif
                            <div id="example1_wrapper" class="form-inline dt-bootstrap">
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="row text-center">
                                            @if(is_file(public_path('/uploads/order/'.$order->id.'/'.$order->image1)))
                                                <a class="gal-item showcase" data-rel="lightcase:myCollection:slideshow" title="{{ $order->name }}" href="{{ '/uploads/order/'.$order->id.'/'.$order->image1 }}">
                                                    <figure><img class="gal-item-img" src="{{ '/uploads/order/'.$order->id.'/'.$order->image1 }}" class="h150"></figure>
                                                </a>
                                            @endif
                                            @if(is_file(public_path('/uploads/order/'.$order->id.'/'.$order->image2)))
                                                <a class="gal-item showcase" data-rel="lightcase:myCollection:slideshow" title="{{ $order->name }}" href="{{ '/uploads/order/'.$order->id.'/'.$order->image2 }}">
                                                    <figure><img class="gal-item-img" src="{{ '/uploads/order/'.$order->id.'/'.$order->image2 }}" class="h150"></figure>
                                                </a>
                                            @endif
                                        </div>
                                        <br>
                                        <h3>Sifariş Məlumatları</h3>
                                        <table class="table table-responsive table-bordered table-striped table-hover" role="grid">
                                            <tbody>
                                                <tr role="row" class="even">
                                                    <td>Nömrəsi</td>
                                                    <td>{{ $order->id }}</td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td>Ad</td>
                                                    <td>{{ $order->name }}</td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td>Soyadı</td>
                                                    <td>{{ $order->surname }}</td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td>Telefon</td>
                                                    <td>{{ $order->phone }}</td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td>Email</td>
                                                    <td>{{ $order->email }}</td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td>Faktiki yaşayış ünvanınız</td>
                                                    <td>{{ $order->actual_address }}</td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td>İş yeriniz</td>
                                                    <td>{{ $order->work }}</td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td>Əmək haqqı</td>
                                                    <td>{{ $order->salary }}</td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td>Əmək haqqı kartınıza xidmət göstərən bank</td>
                                                    <td>{{ $order->salary_bank->name }}</td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td>Seçdiyi banklar</td>
                                                    <td>{{ implode(' | ',array_pluck($order->banks,'name')) }}</td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td>Kreditin məbləği</td>
                                                    <td>{{ $order->amount.' '.$order->currency->name }}</td>
                                                </tr>
                                                @if($admin->isbank)
                                                <tr role="row" class="even">
                                                    <td>Status</td>
                                                    <td>
                                                        @if($detail[0]['status']=='accept')
                                                            <i class="fas fa-eye green"></i> Təsdiqlənib
                                                        @elseif($detail[0]['status']=='reject')
                                                            <i class="fas fa-eye-slash red"></i> Rədd edilib
                                                        @else
                                                            <i class="far fa-clipboard yellow"></i> Cavablandırılmayıb
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endif
                                                <tr role="row" class="even">
                                                    <td>Paylaşılma vaxtı</td>
                                                    <td>{!! $order->created_at !!}</td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td>Dəyişilmə vaxtı</td>
                                                    <td>{!! $order->updated_at !!}</td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        @if(!$detail[0])
                                        <h3>Cavablandır</h3>
                                        <table class="table table-responsive table-bordered table-striped table-hover" role="grid">
                                            <tr>
                                                <th>Hər hansı filial</th>
                                                <th>Təsdiqlə</th>
                                                <th>Rədd et</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <select name="branch_id" id="branch_id" class="form-control">
                                                            @foreach($banks as $bank)
                                                                @foreach($bank->branchs as $filial)
                                                                    <option value="{{ $filial->id }}">{{ $filial->name }}</option>
                                                                @endforeach
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a class="btn" href="javascript:void(0);" id="doactive" data-id="{{ $order->id }}">
                                                        Təsdiqlə
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class="btn" href="javascript:void(0);" id="dopassive" data-id="{{ $order->id }}">
                                                        Rədd et
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                        @endif
                                        @if($admin->isbank && $detail[0]['status']=='accept' && !$detail[0]->amount)
                                            <h3>Kreditə ayrılan məbləğ</h3>
                                            <table class="table table-responsive table-bordered table-striped table-hover" role="grid">
                                                <tr>
                                                    <th>Məbləğ</th>
                                                    <th>Məzənnə</th>
                                                    <th>Təsdiqlə</th>
                                                </tr>
                                                @foreach($detail as $d)
                                                    <tr>
                                                        <td>
                                                            <div class="form-group col-md-12">
                                                                <input type="text" class="form-control" placeholder="Məbləğ" id="amount" name="amount" value="{{ $order->amount }}">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group col-md-12">
                                                                <select name="currency_id" id="currency_id" class="form-control">
                                                                    @foreach($currencies as $currency)
                                                                        <option value="{{ $currency->id }}" {{ $order->currency->id==$currency->id ? 'selected' : '' }}>{{ $currency->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a class="btn" href="javascript:void(0);" id="dopay" data-id="{{ $order->id }}">
                                                                Təsdiqlə
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        @endif
                                        @if($admin->admin && $detail[0])
                                            <h3>Cavablandıran banklar</h3>
                                            <table class="table table-responsive table-bordered table-striped table-hover" role="grid">
                                                <tr>
                                                    <th>Bank</th>
                                                    <th>Cavabı</th>
                                                    <th>Yönləndirdiyi filial</th>
                                                    <th>Ayırdığı məbləğ</th>
                                                </tr>
                                                @foreach($detail as $d)
                                                <tr>
                                                    <td>
                                                        {{ $d->user->bank->name }}
                                                    </td>
                                                    <td>
                                                        {{ $d->status=='accept' ? 'Təsdiqlənib' : 'Rədd edilib'}}
                                                    </td>
                                                    @if($d->branch)
                                                    <td>
                                                        {{ $d->branch->name }}
                                                    </td>
                                                    @else
                                                    <td>-</td>
                                                    @endif
                                                    @if($d->amount)
                                                    <td>
                                                        {{ $d->amount.' '.$d->currency->name }}
                                                    </td>
                                                    @elseif(!$d->amount && $d->status=='accept')
                                                    <td>
                                                        Hələ Ayrılmayıb
                                                    </td>
                                                    @else
                                                    <td>-</td>
                                                    @endif
                                                </tr>
                                                @endforeach
                                            </table>
                                        @endif
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
    <script src="/admin/js/fastclick.js"></script>
    <script src="/admin/js/adminlte.min.js"></script>
    <script src="/admin/js/jquery.slimscroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightcase/2.5.0/js/lightcase.min.js"></script>
    <script>
        $(document).ready(function () {
            let csrf = $("input[name='_token']").val(),
                doactive = $("#doactive"),
                dopay = $("#dopay"),
                dopassive = $("#dopassive"),
                dodelete = $("#dodelete"),
                showcase = $('a.showcase');

            showcase.lightcase({
                transition: 'scrollHorizontal',
                showSequenceInfo: false,
                showTitle: false
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            doactive.click(function() {
                let fieldid = $(this).data('id'),
                    branch_id = $('select#branch_id').val();
                $.ajax({
                    type: 'post',
                    url: '/admin/order/doactive',
                    data: {
                        'id': fieldid,
                        'branch_id': branch_id
                    },
                    dataType: 'json',
                    success: function(data) {
                        window.location.href = data.order;
                    }
                });
            });

            dopay.click(function() {
                let fieldid = $(this).data('id'),
                    amount = $('#amount').val(),
                    currency_id = $('select#currency_id').val();
                $.ajax({
                    type: 'post',
                    url: '/admin/order/dopay',
                    data: {
                        'id': fieldid,
                        'amount': amount,
                        'currency_id': currency_id,
                    },
                    dataType: 'json',
                    success: function(data) {
                        window.location.href = data.order;
                    }
                });
            });

            dopassive.click(function() {
                let fieldid = $(this).data('id');
                $.ajax({
                    type: 'post',
                    url: '/admin/order/dopassive',
                    data: {
                        'id': fieldid
                    },
                    dataType: 'json',
                    success: function(data) {
                        window.location.href = data.order;
                    }
                });
            });

            dodelete.click(function() {
                let fieldid = $(this).data('id');
                $.ajax({
                    type: 'delete',
                    url: '/admin/order/delete',
                    data: {
                        'id': fieldid
                    },
                    dataType: 'json',
                    success: function(data) {
                        window.location.href = data.order;
                    }
                });
            });
        });
    </script>
@endsection