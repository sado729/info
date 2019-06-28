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
               <div class="col-lg-8">
                   <div class="login-page-outer">
                        <div class="login-form-outer">
                                <div class="section-title text-center">
                                    <h2>Login <span>Your Account</span></h2>
                                </div>
                            </div>
                            <form class="contact-form">
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
                                                <a href="forgotPass.php" class="forgetting-password">Forgot Password?</a>
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