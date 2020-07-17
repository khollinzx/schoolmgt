<?php
// Selecting the details of a particular student
$variables = fetchFields("student_details", "*", "student_id", $_SESSION["student_details"]->id);

// 
foreach ($variables as $variable) {
    $firstName = $variable["firstName"];
    $lastName = $variable["lastName"];
    $middleName = $variable["middleName"];
    $phoneNumber = $variable["phoneNumber"];
    $admissionNumber = $variable["admissionNumber"];
    $level = $variable["level_id"];
    $department = $variable["department_id"];
    $homeAddress = $variable["homeAddress"];
}

?>

<div class="content-wrapper">

    <div class="container">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Bio-Data
            </h1>
        </section>

        <!-- Main row -->
        <div class="row" style="margin-top: 2rem;">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Post Lists</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <form id="studentDetails">
                            <div id="error"></div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="firstName">First Name</label>
                                    <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $firstName; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="lastName">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $lastName; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="middleName">Middle Name</label>
                                    <input type="text" class="form-control" id="middleName" name="middleName" value="<?php echo $middleName; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="text" class="form-control" id="email" name="email" value="<?php echo $_SESSION["student_details"]->email; ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="phoneNumber">Mobile Number</label>
                                    <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" value="<?php echo $phoneNumber; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="homeAddress">Home Address</label>
                                    <input type="text" class="form-control" id="homeAddress" name="homeAddress" value="<?php echo $homeAddress; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="admissionNumber">Admission No.</label>
                                    <input type="text" class="form-control" id="admissionNumber" name="admissionNumber" value="<?php echo $admissionNumber; ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="lastName">Level</label>
                                    <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo selectField2('level_table', 'level_name', 'id', $level); ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="department">Department</label>
                                    <input type="text" class="form-control" id="department" name="department" value="<?php echo selectField2('department_table', 'department_name', 'id', $department); ?>" disabled>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </form>
                        <div class="card-footer">
                            <button id="updateStudentDetails" class="btn btn-primary">Update Student Details</button>
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


<script src="<?php echo BASE_URL; ?>services/ajax/updateStudentDetails.js"></script>