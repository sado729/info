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
                    <h4 class="page-title">Promotion Tools</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Promotion Tools</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Referral Link</li>
                    </ol>
                </div>
            </div>
            <!-- End Breadcrumb-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            New Member Placement
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12 col-md-8">
                                    <p><strong>MANUAL :</strong> You have to manually select whether a user is
                                        registered in
                                        your left or right organisation . </p>
                                    <p><strong>LEFT :</strong> You choose this option, each new user will be put
                                        directly in
                                        your left organisation .</p>
                                    <p><strong>RIGHT :</strong> You choose this option, each new user will be put
                                        directly
                                        in your right organisation.</p>
                                    <p></p>
                                </div>
                                <div class="col-sm-12 col-xs-12 col-md-4">
                                    <div class="new-member-placement-wrapper box-shadow-theme new-member-placement-choose ">
                                        <div class="col-md-12 panel panel-primary box-shadow-theme">
                                            <div class="inputGroup">
                                                <input id="manual" class="new-member-position" name="radio" type="radio"
                                                       checked="" data-value="MANUAL">
                                                <label for="manual" class="lead">Manual</label>
                                            </div>

                                            <div class="inputGroup">
                                                <input id="left" class="new-member-position" name="radio" type="radio"
                                                       data-value="LEFT">
                                                <label for="left" class="lead">Left</label>
                                            </div>
                                            <div class="inputGroup">
                                                <input id="right" class="new-member-position" name="radio" type="radio"
                                                       data-value="RIGHT">
                                                <label for="right" class="lead">Right</label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            Referral Link
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <p>Referral marketing is a method of promoting products or services to new customers
                                        through referrals, usually word of mouth. Such referrals often happen
                                        spontaneously but businesses can influence this through appropriate
                                        strategies.</p>
                                    <p>Referral marketing is a process to encourage and significantly increase referrals
                                        from word of mouth, perhaps the oldest and most trusted marketing strategy. This
                                        can be accomplished by encouraging and rewarding customers, and a wide variety
                                        of other contacts, to recommend products and services from consumer and B2B
                                        brands, both online and offline.</p>
                                </div>
                                <div class="col-md-12">
                                    <h5>Referral Joining Link</h5>
                                    <p>Please use the below link to add members to your network.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">

                            <div class="col-md-12 referal-link-wrap">
                                <div class="container">
                                    <div class="copy">
                                        <form>
                                            <input id="left-url" class="form-control" type="text" value=" https://binary.epixelmlmsoftware.com/afl-ref/zurou/LEFT/">
                                            <button id="copy-left-url" type="button" class="mt-3 btn btn-primary pull-right"
                                                    data-toggle="popover" data-content="Copied.." data-placement="top"
                                                    data-original-title="" title="">Copy link
                                            </button>
                                        </form>
                                    </div>

                                    <div class="text-center mt-3">
                                        <a target="_blank"
                                           href="https://www.facebook.com/sharer/sharer.php?u=https://binary.epixelmlmsoftware.com/afl-ref/zurou/LEFT"
                                           class="btn btn-social-icon btn-facebook">
                                            <i class="fa fa-facebook"></i></a>

                                        <a target="_blank"
                                           href="https://twitter.com/home?status=https://binary.epixelmlmsoftware.com/afl-ref/zurou/LEFT"
                                           class="btn btn-social-icon btn-twitter">
                                            <i class="fa fa-twitter"></i></a>

                                        <a target="_blank"
                                           href="https://plus.google.com/share?url=https://binary.epixelmlmsoftware.com/afl-ref/zurou/LEFT"
                                           class="btn btn-social-icon btn-google-plus">
                                            <i class="fa fa-google-plus"></i></a>
                                        <a target="_blank"
                                           href="https://www.linkedin.com/shareArticle?mini=true&amp;url=https://binary.epixelmlmsoftware.com/afl-ref/zurou/LEFT&amp;title=Referral-link&amp;summary=Please use this link to create an affiliate account"
                                           class="btn btn-social-icon btn-linkedin">
                                            <i class="fa fa-linkedin"></i></a>
                                    </div>
                                </div><!-- end .container -->
                            </div>
                            <div class="col-md-12 referal-link-wrap">
                                <div class="container">
                                    <div class="copy">
                                        <form>
                                            <input id="right-url" class="form-control" type="text" value=" https://binary.epixelmlmsoftware.com/afl-ref/zurou/RIGHT/">
                                            <button id="copy-right-url" type="button" class="mt-3 btn btn-primary pull-right"
                                                    data-toggle="popover" data-content="Copied.." data-placement="top"
                                                    data-original-title="" title="">Copy link
                                            </button>
                                        </form>
                                    </div>

                                    <div class="text-center mt-3">
                                        <a target="_blank"
                                           href="https://www.facebook.com/sharer/sharer.php?u=https://binary.epixelmlmsoftware.com/afl-ref/zurou/LEFT"
                                           class="btn btn-social-icon btn-facebook">
                                            <i class="fa fa-facebook"></i></a>

                                        <a target="_blank"
                                           href="https://twitter.com/home?status=https://binary.epixelmlmsoftware.com/afl-ref/zurou/LEFT"
                                           class="btn btn-social-icon btn-twitter">
                                            <i class="fa fa-twitter"></i></a>

                                        <a target="_blank"
                                           href="https://plus.google.com/share?url=https://binary.epixelmlmsoftware.com/afl-ref/zurou/LEFT"
                                           class="btn btn-social-icon btn-google-plus">
                                            <i class="fa fa-google-plus"></i></a>
                                        <a target="_blank"
                                           href="https://www.linkedin.com/shareArticle?mini=true&amp;url=https://binary.epixelmlmsoftware.com/afl-ref/zurou/LEFT&amp;title=Referral-link&amp;summary=Please use this link to create an affiliate account"
                                           class="btn btn-social-icon btn-linkedin">
                                            <i class="fa fa-linkedin"></i></a>
                                    </div>
                                </div><!-- end .container -->
                            </div>

                            <!-- end .wrapper -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>

        </script>
        @include('admin.include.footer')
    </div>
@endsection
@section('scripts')
    <script>
        (function() {
            var copyButton = document.querySelector('.copy button#copy-left-url');
            var copyInput = document.querySelector('.copy input#left-url');
            copyButton.addEventListener('click', function(e) {
                e.preventDefault();
                var text = copyInput.select();
                document.execCommand('copy');
            });

            copyInput.addEventListener('click', function() {
                this.select();
            });
        })();

        (function() {
            var copyButton = document.querySelector('.copy button#copy-right-url');
            var copyInput = document.querySelector('.copy input#right-url');
            copyButton.addEventListener('click', function(e) {
                e.preventDefault();
                var text = copyInput.select();
                document.execCommand('copy');
            });

            copyInput.addEventListener('click', function() {
                this.select();
            });
        })();
    </script>
@endsection