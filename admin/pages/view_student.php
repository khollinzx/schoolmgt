<?php
if (isset($_GET["student_id"])) {
    $student_id = $_GET["student_id"];

    $student_id;
}

$level_id = selectField2("student_details", "level_id", "student_id", $student_id);
$department_id = selectField2("student_details", "department_id", "student_id", $student_id);
$courseOffered = select_all_courses("registered_course", "*", "student_id", $student_id);


?>
<div class="content-wrapper">

    <div class="container">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Student Details
            </h1>
        </section>

        <!-- Main row -->
        <div class="row" style="margin-top: 2rem;">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><a href="<?php echo BASE_URL; ?>admin/?pg=home"><i class="fas fa-arrow-alt-circle-left"></i> Back</a></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">student Bio-Data</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="text-center">
                                            <img class="profile-user-img img-fluid img-circle" src="<?php echo BASE_URL; ?>assets/backend2/dist/img/user4-128x128.jpg" alt="User profile picture">
                                        </div>
                                        <ul class="list-group list-group-unbordered mt-3 mb-3">
                                            <li class="list-group-item">
                                                <b>Full Name: <?php echo strtoupper(selectField2("student_details", "firstName", "student_id", $student_id) . " " . selectField2("student_details", "lastName", "student_id", $student_id) . " " . selectField2("student_details", "middlename", "student_id", $student_id)) ?></b>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Level: <?php echo selectField2("level_table", "level_name", "id", $level_id) ?></b>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Department: <?php echo selectField2("department_table", "department_name", "id", $department_id) ?></b>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">student Course</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>S/N</th>
                                                        <th>Courses</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1;
                                                    if ($courseOffered == null) {
                                                        echo " <tr> <td>No Course Selected Yet </td> </tr>";
                                                    } else {
                                                        foreach ($courseOffered as $course) { ?>
                                                            <tr>
                                                                <td><?php echo $i; ?></td>
                                                                <td><?php echo selectField2("courses", "name", "id", $course["course_id"]) ?></td>
                                                            </tr>
                                                    <?php $i++;
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                </div>


            </section>
        </div>
        <!-- /.row (main row) -->

        </section>
        <!-- /.content -->
    </div>
</div>

<script src="<?php echo BASE_URL; ?>services/ajax/submitCourses.js"></script>