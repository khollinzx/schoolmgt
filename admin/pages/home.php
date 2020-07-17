<?php

$students = select_all_asc('student_details');
?>
<div class="content-wrapper">

    <div class="container">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                List of Courses
            </h1>
        </section>

        <!-- Main row -->
        <div class="row" style="margin-top: 2rem;">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List of Students</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Names</th>
                                    <th>Department</th>
                                    <th>Level</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($students as $student) { ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $student['firstName'] . " " . $student['lastName'] . " " . $student['middleName'] ?></td>
                                        <td><?php echo selectField2("department_table", "department_name", "id", $student['department_id']) ?></td>
                                        <td><?php echo selectField2("level_table", "level_name", "id", $student['level_id']) ?></td>
                                        <td> <a class="btn btn-info" href="<?php echo BASE_URL . "admin/?pg=view_student&student_id=" . $student['student_id']; ?>"> View Student</a> </td>
                                    </tr>
                                <?php $i++;
                                }
                                ?>
                            </tbody>
                        </table>
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