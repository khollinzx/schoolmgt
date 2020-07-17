<?php
//get the configuration for the local server
require_once("starter/header.php");

include(ROOT_PATH . 'inc/adminheaderLogin.php');


$departments = select_all_asc('department_table');
$levels = select_all_asc('level_table');

?>

<div class="login-box">
    <div class="login-logo">
        <a href="#!"><b>Student Portal</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Student Sign Up</p>
            <div id="error"></div>
            <form id="signupDetails">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="firstName" id="firstName" placeholder="First Name">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Last Name">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="middleName" id="middleName" placeholder="Middle Name">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="emailAddress" id="emailAddress" placeholder="Email Address">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password2" id="password2" placeholder="Confirm Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <select class="custom-select" name="level" id="level">
                        <option value="">Select Level</option>
                        <?php foreach ($levels as $level) { ?>
                            <option value="<?php echo $level['id'] ?>"><?php echo $level['level_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <select class="custom-select" name="department" id="department">
                        <option value="">Select Department</option>
                        <?php foreach ($departments as $department) { ?>
                            <option value="<?php echo $department['id'] ?>"><?php echo $department['department_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>

            </form>

            <div class="social-auth-links text-center mb-3">
                <button id="signup" class="btn btn-block btn-primary">Sign Up
                </button>
                <br>
                <p>Already a Student </p>
                <a href="<?php echo BASE_URL; ?>student_login/" class="btn btn-block btn-danger"> Login
                </a>
            </div>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!--sign-in-page end-->
<!--sign-in-page end-->
<script src="<?php echo BASE_URL; ?>services/ajax/credentials.js"></script>