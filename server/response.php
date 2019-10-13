<?php

/*
This script is for hospitals to respond to blood samples request
Database Name: bloodBank, hospital
Tables Used: request
*/

include 'config.php';

$bGroup = ['AP', 'AN', 'BP', 'BN', 'ABP', 'ABN', 'BOP', 'BON'];

try {

    $params = json_decode(file_get_contents('php://input'));

    if (!$params || !isset($_COOKIE['userId'])) {
        throw new Exception('404');
    }

    $conn = mysqli_connect($host, $user, $pass, $database);

    if (!$conn) {
        throw new Exception('500');
    }

    $status = (int)$params->response * 100;
    $group = $bGroup[(int)$params->group - 1];

    $sql = "update request set status=$status where requestId='$params->requestId'";

    mysqli_autocommit($conn, false);

    if (mysqli_query($conn, $sql)) {
        if ($status == 200) {
            $sql = "update hospital set $group=$group-1 where userId='$params->hospitalId'";

            if (mysqli_query($conn, $sql)) {
                mysqli_commit($conn);
                echo ((string)$status);
            } else {
                mysqli_rollback($conn);
                echo ('500');
            }

        } else {
            mysqli_commit($conn);
            echo ((string)$status);
        }

    } else {
        mysqli_rollback($conn);
        echo ('500');
    }

    mysqli_close($conn);
} catch (Exception $e) {
    echo ($e);
}
