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
                <div class="col-md-12">
                    <h4 class="page-title">Enrolment Details</h4>
                </div>
            </div>
            <!-- End Breadcrumb-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive-sm bt-switch col-md-12 container my-2">
                                <table class="table table-sm table-bordered table-hover table-striped text-center">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Details</th>
                                </tr>
                                </thead>
                                    <tbody class="sortable">
                                    <tr>
                                        <td>Uid</td>
                                        <td>36</td>
                                    </tr>
                                        <tr>
                                            <td>First Name</td>
                                            <td>Bahadur</td>
                                        </tr>
                                        <tr>
                                            <td>Surname</td>
                                            <td>Mikayilov</td>
                                        </tr>
                                        <tr>
                                            <td>Username</td>
                                            <td>Miki</td>
                                        </tr>
                                        <tr>
                                            <td>E-mail</td>
                                            <td>9o3er@mailsoul.com</td>
                                        </tr>
                                    <tr>
                                        <td>Enrollment Package</td>
                                        <td>Free</td>
                                    </tr>
                                    <tr>
                                        <td>Enrollment Reference Id</td>
                                        <td>16</td>
                                    </tr>
                                    <tr>
                                        <td>Sponsor Member	</td>
                                        <td>zurou</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-md-6">
                                <div class="row py-4">
                                        <a href="{{route('admin.index')}}" class="btn btn-light waves-effect waves-light m-1">Home</a>
                                        <a href="{{route('admin.network.addNewMember')}}" class="btn btn-light waves-effect waves-light m-1">Add New Member </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">Login Credentials - Demo</div>
                                    <div class="card-body">Considering user convenience, we have skipped the email confirmation policy for this demo. You can login the new account using the following credentials.
                                        Username : Miki
                                        Password : Miki</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.include.footer')
    </div>
@endsection
