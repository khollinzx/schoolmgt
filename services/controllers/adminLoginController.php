<?php
/**
 * This Model logs the admin 
 * and redirect to the predefined pages
 */
ini_set('display_errors', 1);
require_once("../../starter/header.php");

require ROOT_PATH . "vendor/autoload.php";

use \Firebase\JWT\JWT;

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

// Extracting the Post Datas
extract($_POST);

// calling the Admin Class
$user = new Admin();

try {

    // Setting the remember class function
    $remember = (Input::get('remember') === 'on') ? true : false;
    // passing the inputted field to check if the users exist and return the users details
    $login = $user->login($adminEmail, $adminPassword, $remember, "admin_login", "email");

    if ($login === true) {

        // if true pass the users valuse to the SESSION
        $_SESSION['admin_details'] = $user->data();

        // Preparing the payload for JWT 
        $user_metadata = array(
            $payload,
            "data" => array(
                "id" => $user->data()->id,
                "email" => $user->data()->email,
                "token_id" => $user->data()->token_id
            )
        );

        // encoding the payload to generate a jwt Token
        $jwtToken = JWT::encode($user_metadata, $key);

        // Success code and token
        $json[] = [
            "code" => '200',
            "msgs" => 'OK',
            "token" => $jwtToken
        ];

        $data['value'] = $json;

        echo json_encode($data);
    } else {
        // if user does not exist pass the message to the view
        $json[] = [
            "code" => '400',
            "msgs" => 'Invalid Email Or Password',
            "token" => null
        ];

        $data['value'] = $json;

        echo json_encode($data);
    }
} catch (Exception $e) {
    die($e->getMessage());
}
