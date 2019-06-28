@extends('layouts.admin.master')
@section('head')
@endsection
@section('content')
    @include('admin.include.sidebar')
    @include('admin.include.header')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row mt-3">
{{--                <div class="col-3 col-lg-3 col-xs-3">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="media">--}}
{{--                                <div class="media-body text-left">--}}
{{--                                    <p class="text-white">Menu</p>--}}
{{--                                    <h3 class="text-white mb-0">8</h3>--}}
{{--                                </div>--}}
{{--                                <div class="align-self-center w-circle-icon rounded border border-white">--}}
{{--                                    <i class="zmdi zmdi-view-dashboard text-white"></i>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-footer text-center">--}}
{{--                            <a href="{{ route('menu.admin.index') }}" class="text-white small-font">Keçid et <span> <i class="fa fa-long-arrow-right"></i></span></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-3 col-lg-3 col-xs-3">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="media">--}}
{{--                                <div class="media-body text-left">--}}
{{--                                    <p class="text-white">Faq</p>--}}
{{--                                    <h3 class="text-white mb-0">11</h3>--}}
{{--                                </div>--}}
{{--                                <div class="align-self-center w-circle-icon rounded border border-white">--}}
{{--                                    <i class="fa fa-question text-white"></i>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-footer text-center">--}}
{{--                            <a href="{{ route('faq.admin.index') }}" class="text-white small-font">Keçid et <span> <i class="fa fa-long-arrow-right"></i></span></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="col-3 col-lg-3 col-xs-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body text-left">
                                    <p class="text-white">Blog</p>
                                    <h3 class="text-white mb-0">20</h3>
                                </div>
                                <div class="align-self-center w-circle-icon rounded border border-white">
                                    <i class="zmdi zmdi-device-hub text-white"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('news.admin.index') }}" class="text-white small-font">Keçid et <span> <i class="fa fa-long-arrow-right"></i></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-3 col-lg-3 col-xs-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body text-left">
                                    <p class="text-white">Statistic</p>
                                    <h3 class="text-white mb-0">9</h3>
                                </div>
                                <div class="align-self-center w-circle-icon rounded border border-white">
                                    <i class="fa fa-signal text-white"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <a href="javaScript:void(0);" class="text-white small-font">Keçid et <span> <i class="fa fa-long-arrow-right"></i></span></a>
                        </div>
                    </div>
                </div>
{{--                <div class="col-3 col-lg-3 col-xs-3">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="media">--}}
{{--                                <div class="media-body text-left">--}}
{{--                                    <p class="text-white">Service</p>--}}
{{--                                    <h3 class="text-white mb-0">2</h3>--}}
{{--                                </div>--}}
{{--                                <div class="align-self-center w-circle-icon rounded border border-white">--}}
{{--                                    <i class="fa fa-gears text-white"></i>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-footer text-center">--}}
{{--                            <a href="{{ route('service.admin.index') }}" class="text-white small-font">Keçid et <span> <i class="fa fa-long-arrow-right"></i></span></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-3 col-lg-3 col-xs-3">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="media">--}}
{{--                                <div class="media-body text-left">--}}
{{--                                    <p class="text-white">Why</p>--}}
{{--                                    <h3 class="text-white mb-0">5</h3>--}}
{{--                                </div>--}}
{{--                                <div class="align-self-center w-circle-icon rounded border border-white">--}}
{{--                                    <i class="fa fa-question-circle-o text-white"></i>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-footer text-center">--}}
{{--                            <a href="javaScript:void(0);" class="text-white small-font">Keçid et <span> <i class="fa fa-long-arrow-right"></i></span></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-3 col-lg-3 col-xs-3">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="media">--}}
{{--                                <div class="media-body text-left">--}}
{{--                                    <p class="text-white">Package</p>--}}
{{--                                    <h3 class="text-white mb-0">14</h3>--}}
{{--                                </div>--}}
{{--                                <div class="align-self-center w-circle-icon rounded border border-white">--}}
{{--                                    <i class="fa fa-cubes text-white"></i>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-footer text-center">--}}
{{--                            <a href="{{route('admin.package')}}" class="text-white small-font">Keçid et <span> <i class="fa fa-long-arrow-right"></i></span></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="col-3 col-lg-3 col-xs-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body text-left">
                                    <p class="text-white">Settings</p>
                                    <h3 class="text-white mb-0">10</h3>
                                </div>
                                <div class="align-self-center w-circle-icon rounded border border-white">
                                    <i class="zmdi zmdi-puzzle-piece text-white"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <a href="#" class="text-white small-font">Keçid et <span> <i class="fa fa-long-arrow-right"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">Popular Listings
                            <div class="card-action">
                                <div class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
                                        <i class="icon-options"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="javascript:void(0);">Action</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Another action</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Something else here</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="javascript:void(0);">Separated link</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="media align-items-center">
                                    <img src="/admin/img/products/property01.jpg" alt="user avatar" class="customer-img rounded">
                                    <div class="media-body ml-3">
                                        <h6 class="mb-0">Lorem ipsum dolor sitamet consectetur adipiscing</h6>
                                        <small class="small-font">$810,000 . 04 Beds . 03 Baths</small>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="media align-items-center">
                                    <img src="/admin/img/products/property02.jpg" alt="user avatar" class="customer-img rounded">
                                    <div class="media-body ml-3">
                                        <h6 class="mb-0">Lorem ipsum dolor sitamet consectetur adipiscing</h6>
                                        <small class="small-font">$2,560,000 . 08 Beds . 07 Baths</small>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="media align-items-center">
                                    <img src="/admin/img/products/property03.jpg" alt="user avatar" class="customer-img rounded">
                                    <div class="media-body ml-3">
                                        <h6 class="mb-0">Lorem ipsum dolor sitamet consectetur adipiscing</h6>
                                        <small class="small-font">$910,300 . 03 Beds . 02 Baths</small>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="media align-items-center">
                                    <img src="/admin/img/products/property04.jpg" alt="user avatar" class="customer-img rounded">
                                    <div class="media-body ml-3">
                                        <h6 class="mb-0">Lorem ipsum dolor sitamet consectetur adipiscing</h6>
                                        <small class="small-font">$1,140,650 . 06 Beds . 03 Baths</small>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="media align-items-center">
                                    <img src="/admin/img/products/property05.jpg" alt="user avatar" class="customer-img rounded">
                                    <div class="media-body ml-3">
                                        <h6 class="mb-0">Lorem ipsum dolor sitamet consectetur adipiscing</h6>
                                        <small class="small-font">$1,140,650 . 06 Beds . 03 Baths</small>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="media align-items-center">
                                    <img src="/admin/img/products/property03.jpg" alt="user avatar" class="customer-img rounded">
                                    <div class="media-body ml-3">
                                        <h6 class="mb-0">Lorem ipsum dolor sitamet consectetur adipiscing</h6>
                                        <small class="small-font">$910,300 . 03 Beds . 02 Baths</small>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="card-footer text-center bg-transparent border-0">
                            <a href="javascript:void(0);">View all listings</a>
                        </div>

                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">Popular Categories
                            <div class="card-action">
                                <div class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
                                        <i class="icon-options"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="javascript:void(0);">Action</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Another action</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Something else here</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="javascript:void(0);">Separated link</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="media align-items-center">
                                    <div class="icon-box border border-white">
                                        <i class="fa fa-cutlery"></i>
                                    </div>
                                    <div class="media-body ml-3">
                                        <h6 class="mb-0">Restaurants</h6>
                                    </div>
                                    <div class="date">
                                        Submited List: 250
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="media align-items-center">
                                    <div class="icon-box border border-white">
                                        <i class="fa fa-bed"></i>
                                    </div>
                                    <div class="media-body ml-3">
                                        <h6 class="mb-0">Hotels</h6>
                                    </div>
                                    <div class="date">
                                        Submited List: 90
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="media align-items-center">
                                    <div class="icon-box border border-white">
                                        <i class="fa fa-glass"></i>
                                    </div>
                                    <div class="media-body ml-3">
                                        <h6 class="mb-0">Nightclubs</h6>
                                    </div>
                                    <div class="date">
                                        Submited List: 260
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="media align-items-center">
                                    <div class="icon-box border border-white">
                                        <i class="fa fa-video-camera"></i>
                                    </div>
                                    <div class="media-body ml-3">
                                        <h6 class="mb-0">Movie Theaters</h6>
                                    </div>
                                    <div class="date">
                                        Submited List: 150
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="media align-items-center">
                                    <div class="icon-box border border-white">
                                        <i class="fa fa-shopping-bag"></i>
                                    </div>
                                    <div class="media-body ml-3">
                                        <h6 class="mb-0">Shopping</h6>
                                    </div>
                                    <div class="date">
                                        Submited List: 300
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="media align-items-center">
                                    <div class="icon-box border border-white">
                                        <i class="fa fa-lightbulb-o"></i>
                                    </div>
                                    <div class="media-body ml-3">
                                        <h6 class="mb-0">Museums</h6>
                                    </div>
                                    <div class="date">
                                        Submited List: 150
                                    </div>
                                </div>
                            </li>
                        </ul>

                        <div class="card-footer text-center border-0">
                            <a href="javascript:void(0);">View all Categories</a>
                        </div>

                    </div>
                </div>
            </div><!--End Row-->



        </div>
        <!-- End container-fluid-->
        @include('admin.include.footer')

    </div>
@endsection
@section('scripts')
    <script defer src="{{ asset('admin/js/simplebar.js') }}"></script>
    <script defer src="{{ asset('admin/js/script.js') }}"></script>
    <script defer src="{{ asset('admin/js/chart.js') }}"></script>
    <script defer src="{{ asset('admin/js/index2.js') }}"></script>
    <script defer src="{{ asset('admin/highcharts/highcharts.min.js') }}"></script>
    <script defer src="{{ asset('admin/highcharts/exporting.min.js') }}"></script>
    <script defer src="{{ asset('admin/js/chart-home.js') }}"></script>
@endsection