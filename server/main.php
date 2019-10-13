<?php

/*
This script is to load data from database for index page
Database Name: bloodBank
Tables Used: hospital,request
*/

include 'config.php';

$bGroup=['A+','A-','B+','B-','AB+','AB-','O+','O-'];

try{

    $conn=mysqli_connect($host,$user,$pass,$database);

    if(!$conn){
        throw new Exception('500');
    }

    $notIn="";

    if(isset($_COOKIE['userId'])&&$_COOKIE['type']==='R'){
        $userId=$_COOKIE['userId'];
        $notIn=" and hospital.userId not in (select receiver from request where sender='$userId' and class=";
        $sql="select bGroup from receiver where userId='$userId'";
        $req=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($req);
        $bloodGroup=(int)$row['bGroup'];
    }
    else{
        $bloodGroup=10;
    }

    

    $sql="select * from hospital where AP>0".($notIn?$notIn."1)":"");
    $req1=mysqli_query($conn,$sql);
    $reqCount1=mysqli_num_rows($req1);

    $sql="select * from hospital where AN>0".($notIn?$notIn."2)":"");
    $req2=mysqli_query($conn,$sql);
    $reqCount2=mysqli_num_rows($req2);

    $sql="select * from hospital where BP>0".($notIn?$notIn."3)":"");
    $req3=mysqli_query($conn,$sql);
    $reqCount3=mysqli_num_rows($req3);

    $sql="select * from hospital where BN>0".($notIn?$notIn."4)":"");
    $req4=mysqli_query($conn,$sql);
    $reqCount4=mysqli_num_rows($req4);

    $sql="select * from hospital where ABP>0".($notIn?$notIn."5)":"");
    $req5=mysqli_query($conn,$sql);
    $reqCount5=mysqli_num_rows($req5);

    $sql="select * from hospital where ABN>0".($notIn?$notIn."6)":"");
    $req6=mysqli_query($conn,$sql);
    $reqCount6=mysqli_num_rows($req6);

    $sql="select * from hospital where BOP>0".($notIn?$notIn."7)":"");
    $req7=mysqli_query($conn,$sql);
    $reqCount7=mysqli_num_rows($req7);

    $sql="select * from hospital where BON>0".($notIn?$notIn."8)":"");
    $req8=mysqli_query($conn,$sql);
    $reqCount8=mysqli_num_rows($req8);

    $sql="select sum(AP),sum(AN),sum(BP),sum(BN),sum(ABP),sum(ABN),sum(BOP),sum(BON) from hospital";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);

    mysqli_close($conn);
}
catch(Exception $e){
    header('Location:/error.html');
}

$total=$row[0]+$row[1]+$row[2]+$row[3]+$row[4]+$row[5]+$row[6]+$row[7];

?>