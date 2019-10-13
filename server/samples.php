<?php

/*
This script is for hospitals to add blood sampels
Database Name: bloodBank, hospital
Tables Used: request
*/

include 'config.php';

$group=['AP','AN','BP','BN','ABP','ABN','BOP','BON'];

try{

    $params = json_decode(file_get_contents('php://input'));

    if (!$params||!isset($_COOKIE['userId'])) {
        throw new Exception('404');
    }

    $conn=mysqli_connect($host,$user,$pass,$database);

    if(!$conn){
        throw new Exception('500');
    }

    $userId=$_COOKIE['userId'];
    $class=$group[$params->group-1];

    $sql="update hospital set $class=$class+$params->quantity,sampleCount=sampleCount+$params->quantity where userId='$userId'";

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