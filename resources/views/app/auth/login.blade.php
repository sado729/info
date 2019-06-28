@extends('layouts.app.master')
@section('title') Daxil ol | Telefoncu.az @endsection
@section('keyword')  @endsection
@section('description')  @endsection
@section('ogimg')  @endsection
@section('head')

@endsection
@section('content')

    <!-- page title begin-->
    <div class="page-title login-page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <h2 class="extra-margin">Sign in </h2>
                    <p>Enjoy real benefits and rewards on your accrue investing.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- page title end -->

    <!-- login begin-->
    <div class="contact login-page-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="login-page-outer">
                        <div class="login-form-outer">
                            <div class="section-title text-center">
                                <h2>Login <span>Your Account</span></h2>
                            </div>
                        </div>
                        <form action="{{ route('login') }}" method="post" class="contact-form">
                            {{ csrf_field() }}
                            <div class="row">

                                <div class="col-xl-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="InputAmount">E-mail<span class="requred">*</span></label>
                                        <input type="email" class="form-control" id="InputAmount" placeholder="E-mail Address"
                                               required>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="InputPass1">Password<span class="requred">*</span></label>
                                        <input type="password" class="form-control" id="InputPass1" placeholder="Password" required>
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12">
                                    <div class="form-group mb-0 checkbox">
                                        <div class="form-check pl-0">
                                            <input class="form-check-input" type="checkbox" id="gridCheck1">
                                            <label class="form-check-label" for="gridCheck1">
                                                Keep me loged in
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12">
                                    <div class="row d-flex">
                                        <div class="col-xl-6 col-lg-6">
                                            <button type="submit" class="login-button">Sign in</button>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 d-flex align-items-center">
                                            <a href="#" class="forgetting-password">Forgot Password?</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- login end -->
@endsection
