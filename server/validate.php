<?php

/*
This script is to validate email and mobile
Database Name: bloodBank, hospital
Tables Used: request
*/

include 'config.php';

try{

    $params = json_decode(file_get_contents('php://input'));

    if (!$params) {
        throw new Exception('404');
    }

    $conn=mysqli_connect($host,$user,$pass,$database);

    if(!$conn){
        throw new Exception('500');
    }

    if($params->name=='email'){
        $sql="select count(*) as count from credentials where email='$params->value'";
    }
    else{
        $sql="select count(*) as count from hospital,receiver where hospital.mobile='$params->value' or receiver.mobile='$params->value'";
    }

    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);

    if($row['count']!=0){
       echo('400');
    }else{
        echo('200');
    }

    mysqli_close($conn);
}
catch(Exception $e){
    echo($e);
}

?>