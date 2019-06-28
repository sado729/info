<!DOCTYPE html>
<html lang="en">


<!-- head begin-->
<?php include "include/head.php"; ?>
<!-- head end-->
<body>
<!-- preloader begin-->
<div class="preloader">
    <div class='loader'>
        <div class='loader--dot'></div>
        <div class='loader--dot'></div>
        <div class='loader--dot'></div>
        <div class='loader--dot'></div>
        <div class='loader--dot'></div>
        <div class='loader--dot'></div>
        <div class='loader--text'></div>
    </div>
</div>
<!-- preloader end -->

<!-- header begin-->
<?php include "include/header.php"; ?>
<!-- header end -->


<!-- page title begin-->
<div class="page-title login-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <h2 class="extra-margin">Change or reset your password </h2>
                <p>If you're having trouble resetting your password or can’t sign in to your account.
                    You can change your password for security reasons or reset it if you forget it</p>
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
                            <h2><span>User account</span></h2>
                        </div>
                    </div>
                    <form class="contact-form">
                        <div class="row">

                            <div class="col-xl-12 col-lg-12">
                                <div class="form-group">
                                    <label for="InputAmount">E-mail<span class="requred">*</span></label>
                                    <input type="email" class="form-control" id="InputAmount" placeholder="Enter Username"
                                           required>
                                </div>
                            </div>

                            <div class="col-xl-12 col-lg-12">
                                <div class="row d-flex">
                                    <div class="col-xl-12">

                                        <button type="submit" class="btn btn-primary btn-lg btn-block join-button">E-mail new password</button>
                                    </div>
                                    <div class="col-xl-12">
                                        <p class="text-muted m-0 my-2 text-center">Do not have an account?</p>
                                        <div class="my-3">
                                            <a href="join.php" class="btn btn-light btn-lg btn-block bfy-btn">Create an account</a>
                                        </div>
                                        <a href="login.php" class="btn btn-success btn-lg btn-block bfy-btn">Sign in</a>
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

<!-- footer begin -->
<?php include "include/footer.php"; ?>
<!-- footer end -->

<!-- scroll top button begin -->
<div class="scroll-to-top">
    <a><i class="fas fa-long-arrow-alt-up"></i></a>
</div>
<!-- scroll top button end -->

<!-- scripts begin -->
<?php include "include/scripts.php"; ?>
<!-- scripts end -->
</body>


</html>