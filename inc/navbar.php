<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>

</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <span class="brand-text font-weight-light">SCHOOL MGT SYSTEM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <span style="color: #fff;"><?php echo selectField2('student_details', 'firstName', 'student_id', $_SESSION["student_details"]->id) . ' ' . selectField2('student_details', 'lastName', 'student_id', $_SESSION["student_details"]->id); ?></span>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Actions
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo BASE_URL; ?>student/?pg=home" class="nav-link 
                            <?php if ($linkTitle == 'home') {
                                echo "active";
                            } ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Home</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo BASE_URL; ?>student/?pg=bio-data" class="nav-link 
                            <?php if ($linkTitle == 'bio-data') {
                                echo "active";
                            } ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bio-Data</p>
                            </a>
                        </li>
                        <?php if (selectField2("student_details", "permission_id", "student_id", $_SESSION["student_details"]->id) == 1) { ?>
                            <li class="nav-item">
                                <a href="<?php echo BASE_URL; ?>student/?pg=course-registration" class="nav-link
                                <?php if ($linkTitle == 'course-registration') {
                                    echo "active";
                                } ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Course Registration</p>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if (selectField2("student_details", "permission_id", "student_id", $_SESSION["student_details"]->id) == 0) { ?>
                            <li class="nav-item">
                                <a href="<?php echo BASE_URL; ?>student/?pg=course-offered" class="nav-link
                                <?php if ($linkTitle == 'course-offered') {
                                    echo "active";
                                } ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Course Offered</p>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="logout nav-link">
                        <i class="fas fa-power-off nav-icon"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<script src="<?php echo BASE_URL; ?>services/ajax/logout.js"></script>