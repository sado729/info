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
                    <h4 class="page-title">Murad Babayev</h4>
                </div>
            </div>
            <!-- End Breadcrumb-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 image-section">
                                    <img src="https://png.pngtree.com/thumb_back/fw800/back_pic/00/08/57/41562ad4a92b16a.jpg">
                                    <a href="{{route('admin.account.editProfileImage')}}" class="wall-img-edit-btn"><i class="fa fa-pencil"></i></a>
                                </div>
                                <div class="row user-left-part">
                                    <div class="col-md-3 col-sm-3 col-xs-12 user-profil-part pull-left">
                                        <div class="row ">
                                            <div class="col-md-12 col-md-12-sm-12 col-xs-12 user-image text-center">
                                                <img src="/admin/img/avatars/avatar-2.png">
                                                <a href="{{route('admin.account.editProfileImage')}}" class="profile-img-edit-btn"><i class="fa fa-pencil"></i></a>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12 user-detail-section1 text-center">
                                               <div class="user-profile">
                                                   <ul class="list-unstyled text-center">
                                                       <li><p><i class="fa fa-map-marker m-r-xs"></i>zurou</p></li>
                                                       <li><p><i class="fa fa-envelope m-r-xs"></i><a href="mailto:zurou@outlook.com">zurou@outlook.com</a></p></li>
                                                   </ul>
                                               </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-sm-9 col-xs-12 pull-right profile-right-section">
                                        <div class="row profile-right-section-row">
                                            <div class="col-md-12 profile-header">
                                                <div class="row">
                                                    <div class="col-md-8 col-sm-6 col-xs-6 profile-header-section1 pull-left">
                                                        <h1>Murad Babayev</h1>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6 col-xs-6 profile-header-section1 text-right pull-rigth">
                                                        <a href="{{route('admin.account.editProfile')}}" class="btn text-white btn-danger">Edit</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <p class="profile-name-sec">zurou</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
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
                                        <td>Murad</td>
                                    </tr>
                                    <tr>
                                        <td>Surname</td>
                                        <td>Babayev</td>
                                    </tr>
                                    <tr>
                                        <td>Username</td>
                                        <td>zurou</td>
                                    </tr>
                                    <tr>
                                        <td>E-mail</td>
                                        <td>zurou@outlook.com</td>
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


                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.include.footer')
    </div>
@endsection
