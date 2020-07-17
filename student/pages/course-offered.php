<div class="content-wrapper">

    <div class="container">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Offered
                Courses
            </h1>
        </section>

        <!-- Main row -->
        <div class="row" style="margin-top: 2rem;">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Offered Courses</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Subject</th>
                                </tr>
                            </thead>
                            <tbody id="subjectTable">

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


<script src="<?php echo BASE_URL; ?>services/ajax/loadStudentSubject.js"></script>