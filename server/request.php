<?php

/*
This script is to send blood sample request from receivers to hospital
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

    $dateTime = date("Y-m-d H:i:s");
    $userId=$_COOKIE['userId'];
    $requestId=md5($userId.$dateTime, false);

    $sql="insert into request value('$requestId','$userId','$params->receiver',$params->group,100,'$dateTime')";

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