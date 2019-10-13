<?php

/*
This script handle user sign In operation 
Database Name: credentials 
Tables Used: request
*/

include 'config.php';

try {

    $params = json_decode(file_get_contents('php://input'));

    if (!$params) {
        throw new Exception('404');
    }

    $hash = sha1($params->pass);

    $conn = mysqli_connect($host, $user, $pass, $database);

    if (!$conn) {
        throw new Exception('500');
    }

    $sql = "select userId,type from credentials where email='$params->email' and password='$hash'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);

        if (setcookie('userId', $row['userId'], time() + (86400 * 30), "/") && setcookie('type', $row['type'], time() + (86400 * 30), "/")) {
            echo ($row['type'] === 'R' ? '200' : '201');
        } else {
            echo ('500');
        }
    } else {
        echo ('403');
    }

    mysqli_close($conn);
} catch (Exception $e) {

    echo ($e);
}
