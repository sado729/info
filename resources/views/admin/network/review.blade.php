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
                    <h4 class="page-title">Review order</h4>
                </div>
            </div>
            <!-- End Breadcrumb-->
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs nav-tabs-info nav-justified">
                                @foreach($locales as $code => $props)
                                    <li  class="nav-item">
                                        <a  class="nav-link {{$code=='en' ? 'active' : ''}}" data-toggle="tab" href="#tab_{{$code}}">
                                            <img height="16" src="/admin/flags/4x3/{{$code=='en'?'gb':$code}}.svg"  alt="aze">
                                            <span class="hidden-xs">{{$props['native']}} </span></a>
                                    </li>
                                @endforeach
                            </ul>
                            <form class="contact-form">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-12">
                                            <div class="login-page-outer">
                                                <div class="login-form-outer">
                                                    <div class="section-title text-center">
                                                        <h2><span>Review order</span></h2>
                                                    </div>
                                                </div>
                                                <div class="part1">
                                                    <p class="lead">Payment Details</p>

                                                    <table class="table table-bordered text-center">
                                                        <thead class="bg-bfy">
                                                        <tr>
                                                            <th scope="col">Title</th>
                                                            <th scope="col">Quantity</th>
                                                            <th scope="col">Price</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <th scope="row">Free</th>
                                                            <td>1.00</td>
                                                            <td>$0.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3" class="text-right"><b class="mr-2">Order total</b> $0.00</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="part2">
                                                    <p class="lead">Enrolment Details</p>
                                                    <table class="table table-bordered text-center table-striped">
                                                        <tbody>
                                                        <tr>
                                                            <th>First name :</th>
                                                            <td>Murad</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Surname :</th>
                                                            <td>Babayev</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Username :</th>
                                                            <td>Muro</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Mail :</th>
                                                            <td>zurou@outlook.com</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Sponsor :</th>
                                                            <td>Master Business Team (business.admin) (3)</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="pay">
                                                    <p class="lead">Payment</p>
                                                    <article class="card">
                                                        <div class="card-body p-5">
                                                            <ul class="nav bfy-dark nav-pills rounded nav-fill mb-3" role="tablist">
                                                                <li class="nav-item">
                                                                    <a class="nav-link active" data-toggle="pill" href="#nav-tab-card">
                                                                        <i class="fa fa-credit-card"></i> Credit Card</a></li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link" data-toggle="pill" href="#nav-tab-paypal">
                                                                        <i class="fab fa-paypal"></i> Paypal</a></li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link" data-toggle="pill" href="#nav-tab-bank">
                                                                        <i class="fa fa-university"></i> Bank Transfer</a></li>
                                                            </ul>

                                                            <div class="tab-content">
                                                                <div class="tab-pane fade show active" id="nav-tab-card">
                                                                    <p class="alert alert-success">Some text success or error</p>
                                                                    <form role="form">
                                                                        <div class="form-group">
                                                                            <label for="username">Full name (on the card)</label>
                                                                            <input type="text" class="form-control" name="username"
                                                                                   placeholder="" required="">
                                                                        </div> <!-- form-group.// -->

                                                                        <div class="form-group">
                                                                            <label for="cardNumber">Card number</label>
                                                                            <div class="input-group">
                                                                                <input type="text" class="form-control" name="cardNumber"
                                                                                       placeholder="">
                                                                                <div class="input-group-append">
				<span class="input-group-text text-muted">
					<i class="fab fa-cc-visa"></i>   <i class="fab fa-cc-amex"></i>  
					<i class="fab fa-cc-mastercard"></i>
				</span>
                                                                                </div>
                                                                            </div>
                                                                        </div> <!-- form-group.// -->

                                                                        <div class="row">
                                                                            <div class="col-sm-8">
                                                                                <div class="form-group">
                                                                                    <label><span class="hidden-xs">Expiration</span> </label>
                                                                                    <div class="input-group">
                                                                                        <input type="number" class="form-control"
                                                                                               placeholder="MM" name="">
                                                                                        <input type="number" class="form-control"
                                                                                               placeholder="YY" name="">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-4">
                                                                                <div class="form-group">
                                                                                    <label data-toggle="tooltip" title=""
                                                                                           data-original-title="3 digits code on back side of the card">CVV
                                                                                        <i class="fa fa-question-circle"></i></label>
                                                                                    <input type="number" class="form-control" required="">
                                                                                </div> <!-- form-group.// -->
                                                                            </div>
                                                                        </div> <!-- row.// -->
                                                                        <button class="btn btn-light  btn-lg btn-block waves-effect waves-light m-1" type="button">
                                                                            Confirm
                                                                        </button>
                                                                    </form>
                                                                </div> <!-- tab-pane.// -->
                                                                <div class="tab-pane fade" id="nav-tab-paypal">
                                                                    <p>Paypal is easiest way to pay online</p>
                                                                    <p>
                                                                        <button type="button" class="btn bfy-btn"><i
                                                                                    class="fab fa-paypal"></i> Log in my Paypal
                                                                        </button>
                                                                    </p>
                                                                    <p><strong>Note:</strong> Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit, sed do eiusmod
                                                                        tempor incididunt ut labore et dolore magna aliqua. </p>
                                                                </div>
                                                                <div class="tab-pane fade" id="nav-tab-bank">
                                                                    <p>Bank accaunt details</p>
                                                                    <dl class="param">
                                                                        <dt>BANK:</dt>
                                                                        <dd> THE WORLD BANK</dd>
                                                                    </dl>
                                                                    <dl class="param">
                                                                        <dt>Accaunt number:</dt>
                                                                        <dd> 12345678912345</dd>
                                                                    </dl>
                                                                    <dl class="param">
                                                                        <dt>IBAN:</dt>
                                                                        <dd> 123456789</dd>
                                                                    </dl>
                                                                    <p><strong>Note:</strong> Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit, sed do eiusmod
                                                                        tempor incididunt ut labore et dolore magna aliqua. </p>
                                                                </div> <!-- tab-pane.// -->
                                                            </div> <!-- tab-content .// -->

                                                        </div> <!-- card-body.// -->
                                                    </article>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row justify-content-between py-4">
                                                    <div class="col-4">
                                                        <a href="login.php" class="btn btn-light  btn-lg btn-block waves-effect waves-light m-1">Go back</a>
                                                    </div>
                                                    <div class="col-4">
                                                        <a href="{{route('admin.network.enrolment')}}" class="btn btn-light  btn-lg btn-block waves-effect waves-light m-1">Continue to next step </a>
                                                    </div>
                                                </div>
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
        @include('admin.include.footer')
    </div>
@endsection
