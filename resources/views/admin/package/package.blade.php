@extends('layouts.admin.master')
@section('head')
@endsection
@section('content')
    @include('admin.include.sidebar')
    @include('admin.include.header')
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- package begin-->
            <div class="package ">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-12 col-lg-12">
                            <div class="section-title row text-center py-5  package">
                                <section class='card'>
                                    <div class='card_inner'>
                                        <div class='card_inner__circle'>
                                            <img src='/admin/img/payment-icons/rocket.png' alt="roket">
                                        </div>
                                        <div class='card_inner__header'>
                                            <img src='/admin/img/payment-icons/002-city-vector-background-town-vol2.png' alt="town">
                                        </div>
                                        <div class='card_inner__content'>
                                            <div class='title'>Personal edition</div>
                                            <div class='price'>$19.99</div>
                                            <div class='text'>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur at posuere eros. Interdum et malesuada fames ac ante ipsum primis in faucibus. <br/> <br/>Fusce sed tortor in orci ultrices tempor quis ut leo. Fusce imperdiet eget ante eu faucibus. Nam rhoncus sapien</div>
                                        </div>
                                        <div class='card_inner__cta'>
                                            <button>
                                                <span>Buy now</span>
                                            </button>
                                        </div>
                                    </div>
                                </section>
                                <section class='card'>
                                    <div class='card_inner'>
                                        <div class='card_inner__circle'>
                                            <img src='/admin/img/payment-icons/cog.png' alt="cog">
                                        </div>
                                        <div class='card_inner__header'>
                                            <img src='/admin/img/payment-icons/free-vector-modern-city_093317_bluecity.png' alt="city">
                                        </div>
                                        <div class='card_inner__content'>
                                            <div class='title'>Professional edition</div>
                                            <div class='price'>$49.99</div>
                                            <div class='text'>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur at posuere eros. Interdum et malesuada fames ac ante ipsum primis in faucibus. <br/> <br/>Fusce sed tortor in orci ultrices tempor quis ut leo. Fusce imperdiet eget ante eu faucibus. Nam rhoncus sapien</div>
                                        </div>
                                        <div class='card_inner__cta'>
                                            <button>
                                                <span>Buy now</span>
                                            </button>
                                        </div>
                                    </div>
                                </section>
                                <section class='card'>
                                    <div class='card_inner'>
                                        <div class='card_inner__circle'>
                                            <img src='/admin/img/payment-icons/paperplane.png' alt="paperplane">
                                        </div>
                                        <div class='card_inner__header'>
                                            <img src='/admin/img/payment-icons/Forest-Creek.jpg' alt="forest">
                                        </div>
                                        <div class='card_inner__content'>
                                            <div class='title'>Enterprise edition</div>
                                            <div class='price'>$89.99</div>
                                            <div class='text'>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur at posuere eros. Interdum et malesuada fames ac ante ipsum primis in faucibus. <br/> <br/>Fusce sed tortor in orci ultrices tempor quis ut leo. Fusce imperdiet eget ante eu faucibus. Nam rhoncus sapien</div>
                                        </div>
                                        <div class='card_inner__cta'>
                                            <button>
                                                <span>Buy now</span>
                                            </button>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- package end -->
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