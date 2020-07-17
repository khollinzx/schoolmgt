<?php

// mysql://b7036da87e24e5:98dabd2d@us-cdbr-east-02.cleardb.com/heroku_052594d64dfc887?reconnect=true

// Starkco database Credentials
$dbHost = 'localhost';
$dbUsername = 'bindgacm_schoolmgt';
$dbPass = 'schoolmgt123$';
$dbName = 'bindgacm_schoolmgt';

define("DB_HOST", "localhost");
define("DB_NAME", "bindgacm_schoolmgt");
define("DB_PORT", "3306"); //default port is 3306
define("DB_USER", "bindgacm_schoolmgt");
define("DB_PASS", "schoolmgt123$"); //default password


// $dbHost = '127.0.0.1';
// $dbUsername = 'root';
// $dbPass = '';
// $dbName = 'school_db';

// // set the database cridentials to access the needed database
// define("DB_HOST", "127.0.0.1");
// define("DB_NAME", "school_db");
// define("DB_PORT", "3306"); //default port is 3306
// define("DB_USER", "root");
// define("DB_PASS", ""); //default password

// function to create a table
function createTable($table, $courseId, $courseCode, $materialName, $materialFile, $tokenId)
{
    try {
        $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e) {
        // if unable to connect to the database
        die("ERROR: Could not connect. " . $e->getMessage());
    }

    try {
        $result = "CREATE TABLE `$table`(
            id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            `$courseId` INT NOT NULL,
            `$courseCode` VARCHAR(20) NOT NULL,
            `$materialName` VARCHAR(50) NOT NULL,
            `$materialFile` VARCHAR(50) NOT NULL,
            `$tokenId` VARCHAR(200) NOT NULL
        )ENGINE=InnoDB DEFAULT CHARSET=latin1";
        $db->exec($result);
        echo "Table Created Successfully";
    } catch (Exception $e) {
        die("ERROR: Could not connect. " . $e->getMessage());
    }
    //close connection
    unset($db);
}

function saveSelectedCourses($table, $courses, $id, $course_id, $student_id)
{
    try {
        $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e) {
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
    try {
        for ($i = 0; $i < count($courses); $i++) {
            // $sql = "INSERT INTO {$table} SET `user_id` = {$id},`course_name` = {$courses[$i]}";
            $result = $db->prepare("INSERT INTO {$table} ({$student_id}, {$course_id}) VALUES(?, ?)");
            $result->bindParam(1, $id);
            $result->bindParam(2, $courses[$i]);
            $result->execute();
        }
    } catch (Exception $e) {
        echo "could not insert data, something went wrong ($table) ";
        exit;
    }

    return $result;
}

function arraySave($table, $courses, $id)
{
    try {
        $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e) {
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
    try {
        for ($i = 0; $i < count($courses); $i++) {
            // $sql = "INSERT INTO {$table} SET `user_id` = {$id},`course_name` = {$courses[$i]}";
            $result = $db->prepare("INSERT INTO {$table} (`user_id`, `course_name`) VALUES(?, ?)");
            $result->bindParam(1, $id);
            $result->bindParam(2, $courses[$i]);
            $result->execute();
        }
    } catch (Exception $e) {
        echo "could not insert data, something went wrong ($table) ";
        exit;
    }

    return $result;
}


// To fetch existing user
function selectExistUser($table, $field, $value)
{
    try {
        $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e) {
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
    try {
        $result = $db->prepare("SELECT * FROM {$table} WHERE {$field} = ? ");
        $result->bindParam(1, $value);
        $result->execute();
    } catch (Exception $e) {
        echo "could not insert data, something went wrong ($table) ";
        exit;
    }
    $return = $result->rowCount();

    return $return;
}

// To Count the rows in a table
function selectCount($table)
{
    try {
        $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e) {
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
    try {
        $result = $db->query("SELECT * FROM {$table} ");
        $result->execute();
    } catch (Exception $e) {
        echo "could not insert data, something went wrong ($table) ";
        exit;
    }
    $return = $result->rowCount();

    return $return;
}

// function to select field database
function selectField2($table, $field, $where, $id)
{
    try {
        $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e) {
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
    try {
        $result = $db->prepare("SELECT {$field} FROM {$table} WHERE {$where} = ?");
        $result->bindParam(1, $id);
        $result->execute();
    } catch (Exception $e) {
        echo "could not retrive data, something went wrong ($table) ";
        exit;
    }
    //pass the query into the product variable
    $return = $result->fetch(PDO::FETCH_ASSOC);

    $reply = $return[$field];
    return $reply;
}

function select_all_courses($table, $field, $where, $id)
{
    try {
        $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e) {
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
    try {
        $result = $db->prepare("SELECT {$field} FROM {$table} WHERE {$where} = ?");
        $result->bindParam(1, $id);
        $result->execute();
    } catch (Exception $e) {
        echo "could not retrive data, something went wrong ($table) ";
        exit;
    }
    //pass the query into the product variable
    $return = $result->fetchAll(PDO::FETCH_ASSOC);

    return $return;
}

function selectProduct($table, $field, $where, $id)
{
    try {
        $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e) {
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
    try {
        $result = $db->prepare("SELECT {$field} FROM {$table} WHERE {$where} = ?");
        $result->bindParam(1, $id);
        $result->execute();
    } catch (Exception $e) {
        echo "could not retrive data, something went wrong ($table) ";
        exit;
    }
    //pass the query into the product variable
    $return = $result->fetchAll(PDO::FETCH_ASSOC);

    return $return;
}

// function to get a user ID with a particular tokenID
function select_individual_id($id, $table, $token, $tokenValue)
{
    try {
        $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e) {
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
    try {
        $result = $db->prepare("SELECT {$id} FROM {$table} WHERE {$token} = ? ");
        $result->bindParam(1, $tokenValue);
        $result->execute();
    } catch (Exception $e) {
        echo "could not retrive data, something went wrong ($table) ";
        exit;
    }
    //pass the query into the product variable
    $return = $result->fetch(PDO::FETCH_ASSOC);
    return $return;
}

// Select all values from the database DESC
function select_all($table)
{
    try {
        $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e) {
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
    try {
        $result = $db->query("SELECT * FROM {$table} ORDER BY id DESC");
    } catch (Exception $e) {
        echo "could not retrive data, something went wrong ($table) ";
        exit;
    }
    //pass the query into the product variable
    $return = $result->fetchAll(PDO::FETCH_ASSOC);

    return $return;
}

function fetchFields($table, $field, $where, $id)
{
    try {
        $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e) {
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
    try {
        $result = $db->prepare("SELECT {$field} FROM {$table} WHERE {$where} = ?");
        $result->bindParam(1, $id);
        $result->execute();
    } catch (Exception $e) {
        echo "could not retrive data, something went wrong ($table) ";
        exit;
    }
    //pass the query into the product variable
    $return = $result->fetchAll(PDO::FETCH_ASSOC);

    return $return;
}

// Select all values from the database ASC
function select_all_asc($table)
{
    try {
        $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e) {
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
    try {
        $result = $db->query("SELECT * FROM {$table} ORDER BY id ASC");
    } catch (Exception $e) {
        echo "could not retrive data, something went wrong ($table) ";
        exit;
    }
    //pass the query into the product variable
    $return = $result->fetchAll(PDO::FETCH_ASSOC);

    return $return;
}

function select_all_with_user($table, $userId)
{
    try {
        $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e) {
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
    try {
        $result = $db->query("SELECT * FROM {$table} WHERE id != {$userId} ORDER BY id DESC");
    } catch (Exception $e) {
        echo "could not retrive data, something went wrong ($table) ";
        exit;
    }
    //pass the query into the product variable
    $return = $result->fetchAll(PDO::FETCH_ASSOC);

    return $return;
}

function query($table)
{
    try {
        $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e) {
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
    try {
        $result = $db->query("SELECT * FROM {$table} ORDER BY id DESC");
    } catch (Exception $e) {
        echo "could not retrive data, something went wrong ($table) ";
        exit;
    }
    //pass the query into the product variable
    $return = $result->fetchAll(PDO::FETCH_ASSOC);

    return $return;
}

function selectArrayField($table)
{
    try {
        $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e) {
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
    try {
        // $set = '';
        // $x = 1;

        // foreach ($fields as $name) {
        //     $set .= "{$name}";
        //     if ($x < count($fields)) {
        //         $set .= ', ';
        //     }
        //     $x++;
        // }
        $result = $db->query("SELECT * FROM {$table}");
    } catch (Exception $e) {
        echo "could not retrive data, something went wrong ($table) ";
        exit;
    }
    //pass the query into the product variable
    $return = $result->fetchAll(PDO::FETCH_ASSOC);

    return $return;
}

function selectFetchOrder($table, $query, $column, $sort, $searchArray, $row, $rowPerPage)
{
    try {
        $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e) {
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
    try {
        $result = $db->prepare("SELECT * FROM {$table} WHERE 1 " . $query . " ORDER BY " . $column . " " . $sort . " LIMIT :limit, :offset ");
        foreach ($searchArray as $key => $search) {
            $result->bindValue(":" . $key, $search, PDO::PARAM_STR);
        }
        $result->bindValue(":limit", (int) $row, PDO::PARAM_INT);
        $result->bindValue(":offset", (int) $rowPerPage, PDO::PARAM_INT);
        $result->execute();
    } catch (Exception $e) {
        echo "could not retrive data, something went wrong ADA ($table) ";
        exit;
    }
    //pass the query into the product variable
    $return = $result->fetchAll(PDO::FETCH_ASSOC);

    return $return;
}

function selectAllCount($table)
{
    try {
        $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e) {
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
    try {
        $result = $db->query("SELECT * FROM {$table}");
    } catch (Exception $e) {
        echo "could not retrive data, something went wrong COLLINS ($table) ";
        exit;
    }
    //pass the query into the product variable
    $return = $result->rowCount();

    return $return;
}

function selectAllCountFilter($table, $query, $searchArray)
{
    try {
        $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e) {
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
    try {
        $result = $db->prepare("SELECT COUNT(*) AS allcount FROM {$table} WHERE 1 " . $query);
        $result->execute($searchArray);
    } catch (Exception $e) {
        echo "could not retrive data, something went wrong PHILL ($table) ";
        exit;
    }
    //pass the query into the product variable
    $return = $result->fetch();

    return $return['allcount'];
}

function updateValue($table, $set, $valueSet, $where, $value)
{
    try {
        $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e) {
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
    try {
        $result = $db->prepare("UPDATE {$table} SET {$set} = ? WHERE {$where} = ? ");
        $result->bindParam(1, $valueSet);
        $result->bindParam(2, $value);
        $result->execute();
    } catch (Exception $e) {
        echo "could not retrive data, something went wrong ($table) ";
        exit;
    }
}

function bd_nice_number($n)
{
    // first strip any formatting;
    $n = (0 + str_replace(",", "", $n));

    // is this a number?
    if (!is_numeric($n)) return false;

    // now filter it;
    if ($n > 1000000000000) return number_format(round(($n / 1000000000000), 1)) . ' trillion';
    else if ($n >= 1000000000) return number_format(round(($n / 1000000000), 1)) . ' billion';
    else if ($n >= 999999) return number_format(round(($n / 1000000), 1)) . ' million';
    else if ($n >= 9999) return number_format(round(($n), 1)) . ' ';
    else if ($n >= 999) return number_format(round(($n), 1)) . '';

    return number_format($n);
}
