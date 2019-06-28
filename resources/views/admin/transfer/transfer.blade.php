@extends('layouts.admin.master')
@section('head')
@endsection
@section('content')
    @include('admin.include.sidebar')
    @include('admin.include.header')
    <div class="content-wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12">
                    <div class="section-title text-center section-border pt-5">
                        <div class="row">
                            <div class="col-md-12 mx-auto">
                                <legend>Mr. Sosa:</legend>
                            </div>
                            <!-- panel preview -->
                            <div class="col-sm-5">
                                <h4>Transfer money:</h4>
                                <div class="panel panel-default">
                                    <div class="panel-body form-horizontal payment-form">
                                        <div class="form-group">
                                            <label for="whom" class="col-sm-3 control-label">Whom?</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="whom" name="whom">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="concept" class="col-sm-3 control-label">Concept</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="concept" name="concept">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="description" class="col-sm-3 control-label">Description</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="description" name="description">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="amount" class="col-sm-3 control-label">Amount</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="amount" name="amount">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="status" class="col-sm-3 control-label">Status</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" id="status" name="status">
                                                    <option>Paid</option>
                                                    <option>Unpaid</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="date" class="col-sm-3 control-label">Date</label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control" id="date" name="date">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12 text-left">
                                                <button type="button" class="btn btn-primary preview-add-button">
                                                    <span class="glyphicon glyphicon-plus"></span> Add
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- / panel preview -->
                            <div class="col-sm-7">
                                <h4>Preview:</h4>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="table-responsive">
                                            <table class="table preview-table">
                                                <thead>
                                                <tr>
                                                    <th>Whom</th>
                                                    <th>Concept</th>
                                                    <th>Description</th>
                                                    <th>Amount</th>
                                                    <th>Status</th>
                                                    <th>Date</th>
                                                </tr>
                                                </thead>
                                                <tbody></tbody> <!-- preview content goes here-->
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row text-right">
                                    <div class="col-xs-12">
                                        <h4>Total: <strong><span class="preview-total"></span></strong></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <hr style="border:1px dashed #dddddd;">
                                        <button type="button" class="btn btn-primary btn-block">Submit all and finish</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

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