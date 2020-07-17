<?php
ini_set('display_errors', 1);
require_once("../../starter/header.php");

require ROOT_PATH . "vendor/autoload.php";

use \Firebase\JWT\JWT;

header('Content-Type: application/json');

$headers = apache_request_headers();

// estracting the JWT token from the headers
$token = $headers['Authorization'];

// converting the token to a string
$jwt = strval($token);

// /Decoding the token 
$decoded = JWT::decode($jwt, $key, array('HS256'));


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
extract($_POST);
$user = new Admin();

if ($_SESSION["student_details"]->id == $encodeId) {
    try {
        $user->update('student_details', "student_id",  $_SESSION["student_details"]->id, array(
            "firstName"                    =>    $firstName,
            "lastName"              =>    $lastName,
            "middleName"                    =>    $middleName,
            "phoneNumber"                     => $phoneNumber,
            "homeAddress"                     => $homeAddress
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
// }
