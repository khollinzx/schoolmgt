<?php
//get the configuration for the local server
require_once("starter/header.php");

include(ROOT_PATH . 'inc/adminheaderLogin.php');


?>

<div class="login-box">
    <div class="login-logo">
        <a href="#!"><b>Admin Protal</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Admin Login</p>
            <div id="error"></div>
            <form id="adminLoginDetails">
                <div class="input-group mb-3">
                    <input type="email" name="adminEmail" id="adminEmail" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="adminPassword" id="adminPassword" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
            </form>

            <div class="social-auth-links text-center mb-3">

                <button id="adminLogin" class="btn btn-block btn-primary"> Login
                </button>
                <br>
                <p>Back to Start Page </p>
                <a href="<?php echo BASE_URL; ?>" class="btn btn-block btn-info "><i class="fas fa-arrow-alt-circle-left"></i> Back
                </a>
            </div>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!--sign-in-page end-->
<!--sign-in-page end-->
<script src="<?php echo BASE_URL; ?>services/ajax/credentials.js"></script>