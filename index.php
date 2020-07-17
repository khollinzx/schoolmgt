<?php
//get the configuration for the local server
require_once("starter/header.php");

include(ROOT_PATH . 'inc/adminheaderLogin.php');


// $countries = select_all_asc('country');

?>

<div class="login-box">
  <div class="login-logo">
    <a href="#!"><b>Welcome</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Please Click on your prefered Link</p>

      <div class="col-md-12">
        <div class="row">
          <div class="col-md-6">
            <a href="<?php echo BASE_URL; ?>admin_login/" class="btn btn-app btn-dark">
              <i class="fas fa-user"></i> Staff Login
            </a>
          </div>
          <div class="col-md-6">
            <a href="<?php echo BASE_URL; ?>student_login/" class="btn btn-app btn-info">
              <i class="fas fa-graduation-cap"></i> Student Login
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!--sign-in-page end-->
<!--sign-in-page end-->
<script src="<?php echo BASE_URL; ?>services/ajax/login.js"></script>