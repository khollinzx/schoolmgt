<?php
ini_set('display_errors', 1);
require_once("../../starter/header.php");

require ROOT_PATH . "vendor/autoload.php";

use \Firebase\JWT\JWT;

$token_id = Token::generate();
$admissionNumber = "LAG-" . rand(10000, 99999);
$permission_id = 1;


extract($_POST);

$validate = new Validation();
$validateEmail = $validate->validate_email_domain($emailAddress);

if ($validateEmail === true) {

    try {

        $user = new Admin();


        if ($password !== $password2) {
            $json[] = [
                "code" => '400',
                "msgs" => 'Password did not Match',
                "token" => null
            ];

            $data['value'] = $json;

            echo json_encode($data);
            die();
        }

        $checkIfExist = selectExistUser('student_login', 'email', $emailAddress);

        if ($checkIfExist !== 0) {
            $json[] = [
                "code" => '400',
                "msgs" => 'User already exist',
                "token" => null
            ];

            $data['value'] = $json;

            echo json_encode($data);
            die();
        } else {

            $user->create('student_login', array(
                "email"                     =>    $emailAddress,
                "password"                  =>    Hash::make($password),
                "token_id"                  =>    $token_id,
            ));

            $select = select_individual_id('id', 'student_login', 'token_id', $token_id);

            $user->create('student_details', array(
                "student_id"                       =>      $select['id'],
                "firstName"                     =>      $firstName,
                "lastName"                      =>      $lastName,
                "middleName"                    =>      $middleName,
                "level_id"                      =>      $level,
                "department_id"                 =>      $department,
                "admissionNumber"               =>      $admissionNumber,
                "token_id"                      =>      $token_id,
                "permission_id"                  =>    $permission_id,
            ));

            $remember = (Input::get('remember') === 'on') ? true : false;
            $login = $user->login($emailAddress, $password, $remember, "student_login", "email");

            if ($login === true) {


                $user_metadata = array(
                    $payload,
                    "data" => array(
                        "id"        => $user->data()->id,
                        "email"     => $user->data()->email,
                        "token_id"  => $user->data()->token_id
                    )
                );

                $_SESSION["student_details"] = $user->data();

                $jwtToken = JWT::encode($user_metadata, $key);

                $json[] = [
                    "code" => '200',
                    "msgs" => 'OK',
                    "token" => $jwtToken
                ];

                $data['value'] = $json;

                echo json_encode($data);
            }
        }
    } catch (Exception $e) {
        die($e->getMessage());
    }
} else {
    $json[] = [
        "code" => '400',
        "msgs" => 'Invalid Email Address',
        "token" => null
    ];

    $data['value'] = $json;

    echo json_encode($data);
    die();
}
