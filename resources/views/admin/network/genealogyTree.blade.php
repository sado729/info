@extends('layouts.admin.master')
@section('head')
    <link rel="stylesheet" href="css/tree-view.css">
    <link rel="stylesheet" href="css/tree-main.css">
    <style>
        .user-block:hover .pop-up-content {
            display: block;
        }
    </style>
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
                    <h4 class="page-title">Network</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Network</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Genealogy Tree</li>
                    </ol>
                </div>
            </div>
            <!-- End Breadcrumb-->
            <div class="row">
                <div class="col-lg-12">
                       <form action="#">
                           <div class="form-group">
                               <div class="col-md-12">
                                   <label for="InputUserName">User Name<span class="requred"></span></label>
                                   <input type="text" class="form-control" id="InputUserName">
                               </div>
                           </div>
                           <div class="form-group">
                               <div class="col-md-12">
                                   <button type="submit" class="btn btn-light waves-effect waves-light m-1">Submit</button>
                               </div>
                           </div>
                       </form>
                       <div class="card">
                           <!--Management Hierarchy-->
                           <section class="management-hierarchy">
                               <div class="hv-container">
                                   <div class="hv-wrapper">

                                       <!-- Key component -->
                                       <div class="hv-item">
                                           <div class="hv-item-parent user-block">
                                               <div class="person">
                                                   <img src="/admin/img/common.png" alt="">
                                                   <a href="#" class="name">
                                                       Ziko Sichi <b>/ CEO</b>
                                                   </a>
                                               </div>
                                               <div class="pop-up-content">
                                                   <div class="profile_tooltip_pick">
                                                       <div class="image_tooltip"><img class="profile-rounded-image-tooltip" src="/admin/img/common.png" width="70" height="70" alt="zurou" title="zurou"></div>
                                                   </div>
                                                   <div class="tooltip_profile_detaile">
                                                       <dl>
                                                           <dt>Name</dt>
                                                           <dd>Pirmurad Babayev</dd>
                                                       </dl>
                                                       <!-- <dl>
                                                         <dt>User Id</dt>
                                                         <dd>33</dd>
                                                       </dl> -->
                                                       <!-- <dl>
                                                         <dt></dt>
                                                         <dd></dd>
                                                       </dl> -->


                                                       <dl>
                                                           <dt>Sales (Left)</dt>
                                                           <dd>$0.00</dd>
                                                       </dl>

                                                       <dl>
                                                           <dt>Sales (Right)</dt>
                                                           <dd>$0.00</dd>
                                                       </dl>

                                                       <dl>
                                                           <dt>Carry-forward (Right)</dt>
                                                           <dd>$0.00</dd>
                                                       </dl>

                                                       <dl>
                                                           <dt>Carry-forward (Left)</dt>
                                                           <dd>$0.00</dd>
                                                       </dl>

                                                       <dl>
                                                           <dt>Joined Date</dt>
                                                           <dd>2019-06-22 12:11:16</dd>
                                                       </dl>
                                                       <!-- <div class="tooltip_btn"><a href="/users/zurou">View Profile</a></div> -->
                                                   </div>
                                               </div>
                                           </div>

                                           <div class="hv-item-children">

                                               <div class="hv-item-child">
                                                   <!-- Key component -->
                                                   <div class="hv-item">

                                                       <div class="hv-item-parent user-block">
                                                           <div class="person">
                                                               <img src="/admin/img/avatars/avatar-1.png" alt="">
                                                               <a href="#" class="name">
                                                                   Annie Wilner <b>/ Creative Director</b>
                                                               </a>
                                                           </div>
                                                           <div class="pop-up-content">
                                                               <div class="profile_tooltip_pick">
                                                                   <div class="image_tooltip"><img class="profile-rounded-image-tooltip" src="/admin/img/common.png" width="70" height="70" alt="zurou" title="zurou"></div>
                                                               </div>
                                                               <div class="tooltip_profile_detaile">
                                                                   <dl>
                                                                       <dt>Name</dt>
                                                                       <dd>Annie Wilnor</dd>
                                                                   </dl>
                                                                   <!-- <dl>
                                                                     <dt>User Id</dt>
                                                                     <dd>33</dd>
                                                                   </dl> -->
                                                                   <!-- <dl>
                                                                     <dt></dt>
                                                                     <dd></dd>
                                                                   </dl> -->


                                                                   <dl>
                                                                       <dt>Sales (Left)</dt>
                                                                       <dd>$0.00</dd>
                                                                   </dl>

                                                                   <dl>
                                                                       <dt>Sales (Right)</dt>
                                                                       <dd>$0.00</dd>
                                                                   </dl>

                                                                   <dl>
                                                                       <dt>Carry-forward (Right)</dt>
                                                                       <dd>$0.00</dd>
                                                                   </dl>

                                                                   <dl>
                                                                       <dt>Carry-forward (Left)</dt>
                                                                       <dd>$0.00</dd>
                                                                   </dl>

                                                                   <dl>
                                                                       <dt>Joined Date</dt>
                                                                       <dd>2019-06-22 12:11:16</dd>
                                                                   </dl>
                                                                   <!-- <div class="tooltip_btn"><a href="/users/zurou">View Profile</a></div> -->
                                                               </div>
                                                           </div>
                                                       </div>

                                                       <div class="hv-item-children">

                                                           <div class="hv-item-child">
                                                               <div class="person">
                                                                   <img src="/admin/img/no-user.png" alt="no-user">
                                                                   <a href="{{route('admin.network.addNewMember')}}" class="name">
                                                                       Add new member <b></b>
                                                                   </a>
                                                               </div>
                                                           </div>




                                                           <div class="hv-item-child">
                                                               <div class="person">
                                                                   <img src="/admin/img/no-user.png" alt="no-user">
                                                                   <a href="{{route('admin.network.addNewMember')}}" class="name">
                                                                       Add new member <b></b>
                                                                   </a>
                                                               </div>
                                                           </div>

                                                       </div>

                                                   </div>
                                               </div>


                                               <div class="hv-item-child">
                                                   <!-- Key component -->
                                                   <div class="hv-item">

                                                       <div class="hv-item-parent user-block">
                                                           <div class="person">
                                                               <img src="/admin/img/avatars/avatar-4.png" alt="">
                                                               <a href="#" class="name">
                                                                   Gordon Clark <b>/ Senior Developer</b>
                                                               </a>
                                                           </div>
                                                           <div class="pop-up-content">
                                                               <div class="profile_tooltip_pick">
                                                                   <div class="image_tooltip"><img class="profile-rounded-image-tooltip" src="/admin/img/common.png" width="70" height="70" alt="zurou" title="zurou"></div>
                                                               </div>
                                                               <div class="tooltip_profile_detaile">
                                                                   <dl>
                                                                       <dt>Name</dt>
                                                                       <dd> Gordon Clark</dd>
                                                                   </dl>
                                                                   <!-- <dl>
                                                                     <dt>User Id</dt>
                                                                     <dd>33</dd>
                                                                   </dl> -->
                                                                   <!-- <dl>
                                                                     <dt></dt>
                                                                     <dd></dd>
                                                                   </dl> -->


                                                                   <dl>
                                                                       <dt>Sales (Left)</dt>
                                                                       <dd>$0.00</dd>
                                                                   </dl>

                                                                   <dl>
                                                                       <dt>Sales (Right)</dt>
                                                                       <dd>$0.00</dd>
                                                                   </dl>

                                                                   <dl>
                                                                       <dt>Carry-forward (Right)</dt>
                                                                       <dd>$0.00</dd>
                                                                   </dl>

                                                                   <dl>
                                                                       <dt>Carry-forward (Left)</dt>
                                                                       <dd>$0.00</dd>
                                                                   </dl>

                                                                   <dl>
                                                                       <dt>Joined Date</dt>
                                                                       <dd>2019-06-22 12:11:16</dd>
                                                                   </dl>
                                                                   <!-- <div class="tooltip_btn"><a href="/users/zurou">View Profile</a></div> -->
                                                               </div>
                                                           </div>

                                                       </div>

                                                       <div class="hv-item-children">

                                                           <div class="hv-item-child">
                                                               <div class="person">
                                                                   <img src="/admin/img/no-user.png" alt="no-user">
                                                                   <a href="{{route('admin.network.addNewMember')}}" class="name">
                                                                       Add new member <b></b>
                                                                   </a>
                                                               </div>
                                                           </div>


                                                           <div class="hv-item-child">
                                                               <div class="person">
                                                                   <img src="/admin/img/no-user.png" alt="no-user">
                                                                   <a href="{{route('admin.network.addNewMember')}}" class="name">
                                                                       Add new member <b></b>
                                                                   </a>
                                                               </div>
                                                           </div>
                                                       </div>

                                                   </div>
                                               </div>

                                           </div>

                                       </div>

                                   </div>
                               </div>
                           </section>
                       </div>
                </div>
            </div>
        </div>
        @include('admin.include.footer')
    </div>
@endsection
