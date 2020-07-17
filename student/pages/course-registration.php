<?php

$coreSubjects = selectProduct('courses', 'id, name', 'core_id', 1);
$electiveSubjects = selectProduct('courses', 'id, name', 'core_id', 2);
$vocationalSubjects = selectProduct('courses', 'id, name', 'core_id', 3);
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
                        <h3 class="card-title">List of Courses</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <form id="courses">
                            <div id="error"></div>
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Option</th>
                                        <th>Subject</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><b>Core Subjects</b></td>
                                    </tr>
                                    <?php
                                    $i = 1;
                                    foreach ($coreSubjects as $coreSubject) { ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><input type="checkbox" name="course[]" onclick="return false" checked="checked" id="course" value="<?php echo $coreSubject['id'] ?>"></td>
                                            <td><?php echo $coreSubject['name'] ?></td>
                                        </tr>
                                    <?php $i++;
                                    }
                                    ?>
                                    <tr>
                                        <td><b>Elective Subjects</b></td>
                                    </tr>
                                    <?php
                                    $i = 1;
                                    foreach ($electiveSubjects as $electiveSubject) { ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><input type="checkbox" name="course[]" id="course" value="<?php echo $electiveSubject['id'] ?>"></td>
                                            <td><?php echo $electiveSubject['name'] ?></td>
                                        </tr>
                                    <?php $i++;
                                    }
                                    ?>
                                    <tr>
                                        <td><b>Vocational Subjects</b></td>
                                    </tr>
                                    <?php
                                    $i = 1;
                                    foreach ($vocationalSubjects as $vocationalSubject) { ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><input type="checkbox" name="course[]" id="course" value="<?php echo $vocationalSubject['id'] ?>"></td>
                                            <td><?php echo $vocationalSubject['name'] ?></td>
                                        </tr>
                                    <?php $i++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </form>

                        <div class="card-footer text-right">
                            <button id="saveSelectedCourses" class="btn btn-primary">Save Selected Courses</button>
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