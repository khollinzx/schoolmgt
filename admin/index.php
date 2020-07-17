<?php
// Calling the core 
require_once("../starter/header.php");

// calling the Admin class
$user = new Admin();

// checking if the user is logged in already
if ($user->isLoggedin()) {
    // Get the user data stored in SESSION
    $_SESSION['admin_details'];
}

// Check if pg exits
if (isset($_GET["pg"])) {
    //If pg exists, assign its value to $page_name
    $page_name = $_GET["pg"];
    $linkTitle = $page_name;
}

// checking if the SESSION has holds the users details
// if true runs the file_exist line 
// if false redirect to the index page
if (isset($_SESSION["admin_details"])) {


    // passing the page to a variavble $filename
    $filename = ROOT_PATH . "admin/pages/" . $page_name . ".php";

    //checking if the file exist
    if (file_exists($filename)) {

        /**
         * Calling in the Header
         * and Navbar
         */
        include(ROOT_PATH . 'inc/adminheader2.php');

        include(ROOT_PATH . 'inc/adminnavbar.php');

        // Display the page
        include(ROOT_PATH . 'admin/pages/' . $page_name . '.php');
    } else {

        /**
         * if the page does not exist
         * page not found will be display
         */
        include(ROOT_PATH . 'inc/adminheaderLogin.php');
        include(ROOT_PATH . "admin/pages/page-not-found.php");
    }
} else {
    // Redirect to Login page if the user is not logged in
    Redirect::to("../");
}
