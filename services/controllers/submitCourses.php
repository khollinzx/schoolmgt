<?php
ini_set('display_errors', 1);
require_once("../../starter/header.php");

// requiring the jwt-token vendor folder
require ROOT_PATH . "vendor/autoload.php";

use \Firebase\JWT\JWT;

// header included
header('Content-Type: application/json');

// get the header from the request
$headers = apache_request_headers();

// passing it to a variable token
$token = $headers['Authorization'];

// converting token to a string object
$jwt = strval($token);
$decoded = JWT::decode($jwt, $key, array('HS256'));

// checking if token is decoded
if (!$decoded) {
    $json[] = [
        "code" => '400',
        "msgs" => 'Authentication Failed',
        "token" => null
    ];

    $data['value'] = $json;

    echo json_encode($data);
    die();
}

$encodeId = json_encode(intval($decoded->data->id));

if (!isset($_POST)) {
    $json[] = [
        "code" => '404',
        "msgs" => 'Input Not Found',
        "token" => null
    ];

    $data['value'] = $json;

    echo json_encode($data);
    die();
}

// extracting the POST datas
extract($_POST);

if ($_SESSION["student_details"]->id == $encodeId) {
    $user = new Admin();
    try {

        saveSelectedCourses('registered_course', $course, $_SESSION["student_details"]->id, 'course_id', 'student_id');

        $user->update('student_details', "student_id",  $_SESSION["student_details"]->id, array(
            "permission_id"                    =>    0
        ));

        $json[] = [
            "code" => '200',
            "msgs" => 'OK',
            "token" => null
        ];

        $data['value'] = $json;

        echo json_encode($data);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
} else {

    $json[] = [
        "code" => '404',
        "msgs" => 'Authorization Failed',
        "token" => null
    ];

    $data['value'] = $json;

    echo json_encode($data);
}
