<?php

// $variables = fetchFields("users_details", "facebook_link, twitter_link, phoneNumber, image", "student_id", $_SESSION["user_details"]->id);

// foreach ($variables as $variable) {
//     $facebook_link = $variable["facebook_link"];
//     $twitter_link = $variable["twitter_link"];
//     $phoneNumber = $variable["phoneNumber"];
//     $image = $variable["image"];
// }
$level = selectField2('student_details', 'level_id', 'student_id', $_SESSION["student_details"]->id);
$department = selectField2('student_details', 'department_id', 'student_id', $_SESSION["student_details"]->id);
?>

<div class="content-wrapper">

    <div class="container">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Home
            </h1>
        </section>

        <!-- Main row -->
        <div class="row" style="margin-top: 2rem;">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">

                <div class="card card-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header text-white" style="background: url('<?php echo BASE_URL; ?>assets/backend2/dist/img/photo1.png') center center;">
                        <h3 class="widget-user-username text-right"><?php echo strtoupper(selectField2('student_details', 'firstName', 'student_id', $_SESSION["student_details"]->id) . ' ' . selectField2('student_details', 'lastName', 'student_id', $_SESSION["student_details"]->id)); ?></h3>
                        <h5 class="widget-user-desc text-right"><?php echo selectField2('level_table', 'level_name', 'id', $level) ?></h5>
                    </div>
                    <div class="widget-user-image">
                        <img class="img-circle" src="<?php echo BASE_URL; ?>assets/backend2/dist/img/user3-128x128.jpg" alt="User Avatar">
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="description-block">
                                    <h5 class="description-header"><?php echo selectField2('student_details', 'admissionNumber', 'student_id', $_SESSION["student_details"]->id) ?></h5>
                                    <span class="description-text">Admission No.</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 ">
                                <!-- /.description-block -->
                            </div>
                            <div class="col-sm-4 ">
                                <div class="description-block">
                                    <h5 class="description-header"><?php echo selectField2('department_table', 'department_name', 'id', $department) ?></h5>
                                    <span class="description-text">Deparment</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                </div>

            </section>
        </div>
        <!-- /.row (main row) -->

        </section>
        <!-- /.content -->
    </div>
</div>