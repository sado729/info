@extends('admin.layouts.master')
@section('head')
    <link rel="stylesheet" href="{{ asset('/admin/css/morris.css') }}">
    <link rel="stylesheet" href="{{ asset('/admin/css/datepicker.min.css') }}">
    <style>
        .icon > .fas {
            display: inline-block !important;
        }

        #statistica {
            background-color: #3c8dbc;
            color: white;
        }

        #statistica td:not(:last-child) {
            border-right: 1px solid #ccc;
        }

        #statistica th:not(:last-child) {
            border-right: 1px solid #ccc;
        }

        .highcharts-credits {
            display: none;
        }
        .mt25{margin-top: 25px;} .fl{float: left;}
    </style>
@endsection
@section('body') skin-blue sidebar-mini @endsection
@section('content')
    @include('admin.layouts.include.header')
    @include('admin.layouts.include.sidebar')
    <div class="content-wrapper" style="min-height: 960px;">
        <section class="content">
            <div class="row">
                @if($admin->admin)
                    <form action="{{ route('admin.statistic',1) }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group col-md-3">
                            <label for="bank_id">
                                Bank seç
                            </label>

                            <select name="bank_id" id="bank_id" class="form-control">
                                @foreach($banks as $b)
                                <option value="{{ $b->id }}" {{ $bank->id==$b->id ? 'selected' : '' }}>{{ $b->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="start">
                                Başlanğıc vaxtı
                            </label>
                            <div class="input-group date">
                                <input type="text" class="form-control pull-right datepicker-here" name="start" value="{{ $start ?: \Carbon\Carbon::parse(now())->subMonth()->format('d.m.Y') }}">
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="end">
                                Bitmə vaxtı
                            </label>
                            <div class="input-group date">
                                <input type="text" class="form-control pull-right datepicker-here" name="end" value="{{ $end ?: \Carbon\Carbon::parse(now())->format('d.m.Y') }}">
                            </div>
                        </div>
                        <div class="form-group col-md-1 mt25">
                            <button type="submit" class="btn btn-primary"> Axtar</button>
                        </div>
                    </form>
                @endif
                @if($admin->admin || $admin->isbank)
                <div class="clearfix"></div>

                <div class="col-xs-12 col-lg-8">
                    <div id="chart-10" data-days="{{ json_encode($tenDays['days']) }}"
                         data-orders="{{ json_encode($tenDays['orders']) }}"
                         data-accepted="{{ json_encode($tenDays['accepted']) }}"
                         data-rejected="{{ json_encode($tenDays['rejected']) }}">
                    </div>
                </div>

                <div class="col-xs-12 col-lg-4">
                    <table class="table table-responsive" id="statistica">
                        <thead class="text-left">
                        <tr>
                            <th>
                                Tarix
                            </th>

                            <th>
                                Sifariş
                            </th>

                            <th>
                                <i class="fas fa-check-circle"></i>
                            </th>

                            <th>
                                <i class="fas fa-times-circle"></i>
                            </th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <td>
                                @lang('admin.today'):
                            </td>

                            <td>
                                {{ $orders['today'] }}
                            </td>

                            <td>
                                {{ $accepted['today'] }}
                            </td>

                            <td>
                                {{ $rejected['today'] }}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                @lang('admin.yesterday'):
                            </td>

                            <td>
                                {{ $orders['yesterday'] }}
                            </td>

                            <td>
                                {{ $accepted['yesterday'] }}
                            </td>

                            <td>
                                {{ $rejected['yesterday'] }}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                @lang('admin.this_week'):
                            </td>

                            <td>
                                {{ $orders['thisWeek'] }}
                            </td>

                            <td>
                                {{ $accepted['thisWeek'] }}
                            </td>

                            <td>
                                {{ $rejected['thisWeek'] }}
                            </td>

                        </tr>

                        <tr>
                            <td>
                                @lang('admin.this_month'):
                            </td>

                            <td>
                                {{ $orders['thisMonth'] }}
                            </td>

                            <td>
                                {{ $accepted['thisMonth'] }}
                            </td>

                            <td>
                                {{ $rejected['thisMonth'] }}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                @lang('admin.this_year'):
                            </td>

                            <td>
                                {{ $orders['thisYear'] }}
                            </td>

                            <td>
                                {{ $accepted['thisYear'] }}
                            </td>

                            <td>
                                {{ $rejected['thisYear'] }}
                            </td>

                        </tr>

                        <tr>
                            <td>
                                @lang('admin.total'):
                            </td>

                            <td>
                                {{ $orders['total'] }}
                            </td>

                            <td>
                                {{ $accepted['total'] }}
                            </td>

                            <td>
                                {{ $rejected['total'] }}
                            </td>

                        </tr>
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        </section>
    </div>
    @include('admin.layouts.include.footer')
@endsection
@section('scripts')
    <script src="{{ asset('/admin/js/fastclick.js') }}"></script>
    <script src="{{ asset('/admin/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('/admin/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('/admin/js/datepicker.min.js') }}"></script>

    <script defer src="{{ asset('admin/highcharts/highcharts.min.js') }}"></script>
    <script defer src="{{ asset('admin/highcharts/exporting.min.js') }}"></script>
    <script defer src="{{ asset('admin/js/chart-home.js') }}"></script>
@endsection