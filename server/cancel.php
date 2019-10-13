<?php

/*
This script is to cancel blood sample request from receiver
Database Name: bloodBank
Tables Used: request
*/

include 'config.php';

try{

    $params = json_decode(file_get_contents('php://input'));

    if (!$params||!isset($_COOKIE['userId'])) {
        throw new Exception('404');
    }

    $conn=mysqli_connect($host,$user,$pass,$database);

    if(!$conn){
        throw new Exception('500');
    }

    $sql="delete from request where requestId='$params->requestId'";

    mysqli_autocommit($conn,false);

    if(mysqli_query($conn,$sql)){
        mysqli_commit($conn);
        echo('200');
    }else{
        mysqli_rollback($conn);
        echo('500');
    }

    mysqli_close($conn);
}
catch(Exception $e){
    echo($e);
}

?>