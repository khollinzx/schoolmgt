<?php
//get the configuration for the local server
require_once("starter/header.php");

include(ROOT_PATH . 'inc/adminheaderLogin.php');


// $countries = select_all_asc('country');

?>

<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>Student Protal</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Student Login</p>
            <div id="error"></div>
            <form id="loginDetails">
                <div class="input-group mb-3">
                    <input type="email" name="loginEmail" id="loginEmail" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="loginPassword" id="loginPassword" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
            </form>

            <div class="social-auth-links text-center mb-3">

                <button id="login" class="btn btn-block btn-primary"> Login
                </button>
                <br>
                <p>Not a Student </p>
                <a href="<?php echo BASE_URL; ?>student_signup/" class="btn btn-block btn-danger"> Sign Up
                </a>
            </div>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!--sign-in-page end-->
<!--sign-in-page end-->
<script src="<?php echo BASE_URL; ?>services/ajax/credentials.js"></script>