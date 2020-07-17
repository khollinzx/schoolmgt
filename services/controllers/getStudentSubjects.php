<?php
ini_set('display_errors', 1);
require_once("../../starter/header.php");

require ROOT_PATH . "vendor/autoload.php";

use \Firebase\JWT\JWT;

header('Content-Type: application/json');

$headers = apache_request_headers();

$token = $headers['Authorization'];

$jwt = strval($token);
$decoded = JWT::decode($jwt, $key, array('HS256'));

if (!$decoded) {
    exit(json_encode(['error' => 'Authorization Failed']));
    die();
}
$encodeId = json_encode(intval($decoded->data->id));

// fetch Data
// ADA
$courseOffered = select_all_courses("registered_course", "*", "student_id", $_SESSION["student_details"]->id);
$i = 1;

//
if ($_SESSION["student_details"]->id == $encodeId) {
    if ($courseOffered != null) {
        foreach ($courseOffered as $courses) {
            $json[] = [
                "index"             => $i,
                "id"                => $courses["id"],
                "subjects"     => selectField2("courses", "name", "id", $courses["course_id"]),
            ];
            $i++;
        }

        $data = ['data' => $json];
    } else {
        $data = ['data' => 'zero'];
    }

    echo json_encode($data);
} else {

    echo json_encode(['error' => 'Unauthorized User']);
}
