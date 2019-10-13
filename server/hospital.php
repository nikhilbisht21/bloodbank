<?php

/*
This script is to load data from database of hospitals home page
Database Name: bloodBank
Tables Used: hospital,receiver,request
*/

include 'config.php';

$bGroup=['A+','A-','B+','B-','AB+','AB-','O+','O-'];

try{

    $userId=$_COOKIE['userId'];

    $conn=mysqli_connect($host,$user,$pass,$database);

    if(!$conn){
        throw new Exception('500');
    }

    $sql="select * from hospital where userId='$userId'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $data=(object)$row;

    $sql="select * from request left join receiver on request.sender=receiver.userId where request.receiver='$userId' order by request.date desc";
    $req=mysqli_query($conn,$sql);
    $reqCount=mysqli_num_rows($req);

    $sql="select * from request where receiver='$userId' and status=200";
    $result=mysqli_query($conn,$sql);
    $reqAccepted=mysqli_num_rows($result);

    $sql="select * from request where receiver='$userId' and status=300";
    $result=mysqli_query($conn,$sql);
    $reqRejected=mysqli_num_rows($result);

    mysqli_close($conn);
}
catch(Exception $e){
    header('Location:/error.html');
}

$total=$data->sampleCount;

?>