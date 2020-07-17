<?php


session_start();
// Live Server Database Configuration

$GLOBALS['config'] = array(
	'mysql' => array(
		'host' => 'localhost',
		'username' => 'bindgacm_schoolmgt',
		'port' => '3306',
		'password' => 'schoolmgt123$',
		'db' => 'bindgacm_schoolmgt'
	),
	'remember' => array(
		'cookie_name' => 'hash',
		'cookie_expiry' => 604800
	),
	'session' => array(
		'session_name' => 'user',
		'token_name' => 'token'
	)
);

// // Localhost Confiquration
// $GLOBALS['config'] = array(
// 	'mysql' => array(
// 		'host' => '127.0.0.1',
// 		'username' => 'root',
// 		'port' => '3306',
// 		'password' => '',
// 		'db' => 'school_db'
// 	),
// 	'remember' => array(
// 		'cookie_name' => 'hash',
// 		'cookie_expiry' => 604800
// 	),
// 	'session' => array(
// 		'session_name' => 'user',
// 		'token_name' => 'token'
// 	)
// );


spl_autoload_register(function ($class) {
	require_once(ROOT_PATH . 'classes/' . $class . '.php');
});

require_once(ROOT_PATH . 'functions/sanitize.php');
require_once(ROOT_PATH . 'functions/select_all.php');
require_once(ROOT_PATH . 'functions/database.php');
// require_once (ROOT_PATH.'functions/PHPMailer/src/PHPMailer.php');
// require_once (ROOT_PATH.'functions/PHPMailer/src/Exception.php');
// require_once (ROOT_PATH.'functions/PHPMailer/src/SMTP.php');

// JWT Variable
$key = "secret";
$payload = array(
	$iss = "http://schoolmgt",
	$aud = "http://schoolmgt",
	$iat = 1356999524,
	$nbf = 1357000000
);

if (Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name'))) {
	$hash = Cookie::get(Config::get('remember/cookie_name'));
	$hashCheck = DB::getInstance()->get('user_session', array('hash', '=', $hash));

	if ($hashCheck->count()) {
		$user = new User($hashCheck->first()->user_id);
		$user->login();
	}
}
