<?php

/*
This script handles user Sign Up operations 
Database Name: credentials,receiver,hospital
Tables Used: request
*/

include 'config.php';

try {

    $params = json_decode(file_get_contents('php://input'));

    if (!$params) {
        throw new Exception('404');
    }

    $conn = mysqli_connect($host, $user, $pass, $database);

    if (!$conn) {
        throw new Exception('500');
    }

    $dateTime = date("Y-m-d H:i:s");
    $userId = md5($params->name . $dateTime, false);
    $pass = sha1($params->pass);

    if ($params->type === 'R') {
        $sql1 = "insert into receiver value('$userId','$params->name','$params->gen','$params->dob','$params->mobile',$params->group,'$dateTime')";
    } else {
        $sql1 = "insert into hospital value('$userId','$params->name','$params->city','$params->state',$params->group,'$params->mobile',0,0,0,0,0,0,0,0,0,'$dateTime')";
    }

    $sql2 = "insert into credentials value('$userId','$params->email','$pass','$params->type')";

    mysqli_autocommit($conn, false);

    if (mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2)) {

        if (setcookie('userId', $userId, time() + (86400 * 30), "/") && setcookie('type', $params->type, time() + (86400 * 30), "/")) {
            mysqli_commit($conn);
            echo ($params->type === 'R' ? '200' : '201');
        } else {
            mysqli_rollback($conn);
            echo ('500');
        }

    } else {
        mysqli_rollback($conn);
        mysqli_close($conn);
        throw new Exception('500');
    }

    mysqli_close($conn);
} catch (Exception $e) {
    echo ($e);
}
