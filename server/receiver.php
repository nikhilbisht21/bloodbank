<?php

/*
This script is to load data from database of receivers home page
Database Name: bloodBank
Tables Used: receiver,hospital,request
*/

include 'config.php';

$month=['January','February','March','April','May','June','July','August','September','October','November','December'];
$bGroup=['A+','A-','B+','B-','AB+','AB-','O+','O-'];

try{

    $userId=$_COOKIE['userId'];

    $conn=mysqli_connect($host,$user,$pass,$database);

    if(!$conn){
        throw new Exception('500');
    }

    $sql="select * from receiver where userId='$userId'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $data=(object)$row;

    $sql="select * from request left join hospital on request.receiver=hospital.userId where request.sender='$userId' and request.status=100";
    $reqSent=mysqli_query($conn,$sql);
    $reqSentCount=mysqli_num_rows($reqSent);

    $sql="select * from request left join hospital on request.receiver=hospital.userId where request.sender='$userId' and (request.status=200 or request.status=300)";
    $req=mysqli_query($conn,$sql);
    $reqCount=mysqli_num_rows($req);
    
    mysqli_close($conn);
}
catch(Exception $e){
    header('Location:/error.html');
}

$tmp=explode('-',$data->dob);
$date=$tmp[2].' '.$month[(int)$tmp[1]-1].', '.$tmp[0];

?>