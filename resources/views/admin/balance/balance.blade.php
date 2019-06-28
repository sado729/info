@extends('layouts.admin.master')
@section('head')
@endsection
@section('content')
    @include('admin.include.sidebar')
    @include('admin.include.header')
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Start Balance-->
            <div class=balans">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-12 col-lg-12">
                            <div class="section-title text-center">
                                <div class="wallet">
                                    <aside class="left-wallet">
                                        <div class="wallet-head">
                                            <h1> My Wallets </h1>
                                            <div class="modal-open d-none">+
                                            </div>
                                        </div>
                                        <div class="cc-select modal-open">
                                            <div id="1" class="cc visa cc-active">
                                                <div class="cc-img-main"></div>
                                                <div class="cc-num">**** **** **** 2562</div>
                                                <div class="cc-date d-none"><small>Valid Thru: 12/17</small></div>
                                            </div>
                                        </div>
                                    </aside>
                                    <content class="right-trans">
                                        <h1> Current Balance </h1>
                                        <h4 id="balance">$337</h4>
                                        <div class="trans-list">

                                            <div class="trans trans-visa">
                                                <div class="trans-details"><span class="trans-minus"></span>
                                                    <h3 class="trans-name">Purchase Business Package</h3>
                                                    <h5 class="trans-type-date">12 July, 2018</h5></div>
                                                <div class="trans-amt"><h4 class="trans-amt amt-blue">$100</h4>
                                                </div>
                                            </div>

                                            <div class="trans trans-visa">
                                                <div class="trans-details"><span class="trans-plus"></span>
                                                    <h3 class="trans-name">Funds Added</h3>
                                                    <h5 class="trans-type-date">11 July, 2018</h5></div>
                                                <div class="trans-amt"><h4 class="trans-amt amt-green">$437</h4></div>
                                            </div>

                                        </div>
                                    </content>
                                </div>

                                <div class="modal">
                                    <div class="modal-body">
                                        <h3>Add a New Card</h3>
                                        <h5>Select a card on the left and enter the information</h5>
                                        <div class="modal-close">x</div>
                                        <div class="modal-cards">
                                            <div class="md-cc visa">
                                                <div class="cc-img visa"></div>
                                            </div>
                                        </div>
                                        <form class="form-inline">
                                            <input type="text" id="ccnum" > <br>
                                            <select name="month" id="month" required>
                                                <option value="">Month</option>
                                                <option value="01">Janaury</option>
                                                <option value="02">February</option>
                                                <option value="03">March</option>
                                                <option value="04">April</option>
                                                <option value="05">May</option>
                                                <option value="06">June</option>
                                                <option value="07">July</option>
                                                <option value="08">August</option>
                                                <option value="09">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select>
                                            <select name="year" id="year" required >
                                                <option value="">Year</option>
                                                <option value="16">2016</option>
                                                <option value="17">2017</option>
                                                <option value="18">2018</option>
                                                <option value="19">2019</option>
                                                <option value="20">2020</option>
                                                <option value="21">2021</option>
                                                <option value="22">2022</option>
                                                <option value="23">2023</option>
                                                <option value="24">2024</option>
                                            </select>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- End Balance-->

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