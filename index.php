<?php

include 'server/main.php';

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Blood Bank</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/index.css" />
    <script src="js/index.js"></script>
</head>

<body>
    <div id="main" class="container-fluid">
        <div class="row">
            <div class="col-sm-6 colA">
                <img class="img-responsive" id="imgMain" src="assets/cord-blood-and-tissue.png" />
            </div>
            <div class="col-sm-6 colA">
                <h4>Blood Samples</h4>
                <hr />
                <span class="bGroup">
                    <?php echo($total) ?></span> Blood Samples available
                <br /><br /></br>
                <div>
                    <div>
                        Blood Group <span class="bGroup">A+</span> <span class="badge text-primary">
                            <?php echo($reqCount1) ?> </span>
                        <span class="toggle" onclick="toggle(1)"><i id="t11" class="fa fa-chevron-down" aria-hidden="true"></i><i
                                id="t12" class="fa fa-chevron-up" aria-hidden="true"></i></span>
                        <hr />
                        <div class="hospitalList" id="list1">
                            <?php

if(!$reqCount1){
print<<<HERE
<div class='text-center'>No hospitals have this blood sample</div>
HERE;
}
else{
    $i=0;
    while($row=mysqli_fetch_assoc($req1)){

        $id=$row['userId'];
        $name=$row['name'];
        $city=$row['city'];
        $state=$row['state'];
        $count=$row['AP'];
print<<<HERE
<div class="hospital">
<div style="float:left">
<i class="fa fa-hospital-o iconA" aria-hidden="true"></i> 
<span class="badge">$count </span>
</div>
<div class="hospitalA">
$name
<br>$city, $state
</div>
HERE;
if((isset($_COOKIE['userId'])&&$_COOKIE['type']!=='R')||
(isset($_COOKIE['userId'])&&$_COOKIE['type']==='R'&&$bloodGroup!=1)?false:true){
print<<<HERE
<div class="hospitalB">
<button id="btn1$i" type="button" class="btn btn-default" onclick="request(event,'$id',1)"> Request </button>
</div>
HERE;
}
print<<<HERE
</div>
HERE;
    ++$i;
    if($i<$reqCount1){
        echo('<hr style="clear:both" />');
    }
    }
}

?>
                        </div>
                    </div>
                    <div>Blood Group <span class="bGroup">A-</span> <span class="badge text-primary">
                            <?php echo($reqCount2) ?> </span>
                        <span class="toggle" onclick="toggle(2)"><i id="t21" class="fa fa-chevron-down" aria-hidden="true"></i><i
                                id="t22" class="fa fa-chevron-up" aria-hidden="true"></i></span>
                        <hr />
                        <div class="hospitalList" id="list2">


                            <?php

if(!$reqCount2){
print<<<HERE
<div class='text-center'>No hospitals have this blood sample</div>
HERE;
}
else{
    $i=0;
    while($row=mysqli_fetch_assoc($req2)){

        $id=$row['userId'];
        $name=$row['name'];
        $city=$row['city'];
        $state=$row['state'];
        $count=$row['AN'];
print<<<HERE
<div class="hospital">
<div style="float:left">
<i class="fa fa-hospital-o iconA" aria-hidden="true"></i> 
<span class="badge">$count </span>
</div>
<div class="hospitalA">
$name
<br>$city, $state
</div>
HERE;
if((isset($_COOKIE['userId'])&&$_COOKIE['type']!=='R')||
(isset($_COOKIE['userId'])&&$_COOKIE['type']==='R'&&$bloodGroup!=2)?false:true){
print<<<HERE
<div class="hospitalB">
<button id="btn2$i" type="button" class="btn btn-default" onclick="request(event,'$id',2)"> Request </button>
</div>
HERE;
}
print<<<HERE
</div>
HERE;
    ++$i;
    if($i<$reqCount2){
        echo('<hr style="clear:both" />');
    }
    }
}

?>

                        </div>
                    </div>
                    <div>Blood Group <span class="bGroup">B+</span> <span class="badge">
                            <?php echo($reqCount3) ?> </span>
                        <span class="toggle" onclick="toggle(3)"><i id="t31" class="fa fa-chevron-down" aria-hidden="true"></i><i
                                id="t32" class="fa fa-chevron-up" aria-hidden="true"></i></span>
                        <hr />
                        <div class="hospitalList" id="list3">


                            <?php

if(!$reqCount3){
print<<<HERE
<div class='text-center'>No hospitals have this blood sample</div>
HERE;
}
else{
    $i=0;
    while($row=mysqli_fetch_assoc($req3)){

        $id=$row['userId'];
        $name=$row['name'];
        $city=$row['city'];
        $state=$row['state'];
        $count=$row['BP'];
print<<<HERE
<div class="hospital">
<div style="float:left">
<i class="fa fa-hospital-o iconA" aria-hidden="true"></i> 
<span class="badge">$count </span>
</div>
<div class="hospitalA">
$name
<br>$city, $state
</div>
HERE;
if((isset($_COOKIE['userId'])&&$_COOKIE['type']!=='R')||
(isset($_COOKIE['userId'])&&$_COOKIE['type']==='R'&&$bloodGroup!=3)?false:true){
print<<<HERE
<div class="hospitalB">
<button id="btn3$i" type="button" class="btn btn-default" onclick="request(event,'$id',3)"> Request </button>
</div>
HERE;
}
print<<<HERE
</div>
HERE;
    ++$i;
    if($i<$reqCount3){
        echo('<hr style="clear:both" />');
    }
    }
}

?>


                        </div>
                    </div>
                    <div>Blood Group <span class="bGroup">B-</span> <span class="badge text-primary">
                            <?php echo($reqCount4) ?> </span>
                        <span class="toggle" onclick="toggle(4)"><i id="t41" class="fa fa-chevron-down" aria-hidden="true"></i><i
                                id="t42" class="fa fa-chevron-up" aria-hidden="true"></i></span>
                        <hr />
                        <div class="hospitalList" id="list4">


                            <?php

if(!$reqCount4){
print<<<HERE
<div class='text-center'>No hospitals have this blood sample</div>
HERE;
}
else{
    $i=0;
    while($row=mysqli_fetch_assoc($req4)){

        $id=$row['userId'];
        $name=$row['name'];
        $city=$row['city'];
        $state=$row['state'];
        $count=$row['BN'];
print<<<HERE
<div class="hospital">
<div style="float:left">
<i class="fa fa-hospital-o iconA" aria-hidden="true"></i> 
<span class="badge">$count </span>
</div>
<div class="hospitalA">
$name
<br>$city, $state
</div>
HERE;
if((isset($_COOKIE['userId'])&&$_COOKIE['type']!=='R')||
(isset($_COOKIE['userId'])&&$_COOKIE['type']==='R'&&$bloodGroup!=4)?false:true){
print<<<HERE
<div class="hospitalB">
<button id="btn4$i" type="button" class="btn btn-default" onclick="request(event,'$id',4)"> Request </button>
</div>
HERE;
}
print<<<HERE
</div>
HERE;
    ++$i;
    if($i<$reqCount4){
        echo('<hr style="clear:both" />');
    }
    }
}

?>

                        </div>
                    </div>
                    <div>Blood Group <span class="bGroup">AB+</span> <span class="badge text-primary">
                            <?php echo($reqCount5) ?> </span>
                        <span class="toggle" onclick="toggle(5)"><i id="t51" class="fa fa-chevron-down" aria-hidden="true"></i><i
                                id="t52" class="fa fa-chevron-up" aria-hidden="true"></i></span>
                        <hr />
                        <div class="hospitalList" id="list5">

                            <?php

if(!$reqCount5){
print<<<HERE
<div class='text-center'>No hospitals have this blood sample</div>
HERE;
}
else{
    $i=0;
    while($row=mysqli_fetch_assoc($req5)){

        $id=$row['userId'];
        $name=$row['name'];
        $city=$row['city'];
        $state=$row['state'];
        $count=$row['ABP'];
print<<<HERE
<div class="hospital">
<div style="float:left">
<i class="fa fa-hospital-o iconA" aria-hidden="true"></i> 
<span class="badge">$count </span>
</div>
<div class="hospitalA">
$name
<br>$city, $state
</div>
HERE;
if((isset($_COOKIE['userId'])&&$_COOKIE['type']!=='R')||
(isset($_COOKIE['userId'])&&$_COOKIE['type']==='R'&&$bloodGroup!=5)?false:true){
print<<<HERE
<div class="hospitalB">
<button id="btn5$i" type="button" class="btn btn-default" onclick="request(event,'$id',5)"> Request </button>
</div>
HERE;
}
print<<<HERE
</div>
HERE;
    ++$i;
    if($i<$reqCount5){
        echo('<hr style="clear:both" />');
    }
    }
}

?>

                        </div>
                    </div>
                    <div>Blood Group <span class="bGroup">AB-</span> <span class="badge text-primary">
                            <?php echo($reqCount6) ?> </span>
                        <span class="toggle" onclick="toggle(6)"><i id="t61" class="fa fa-chevron-down" aria-hidden="true"></i><i
                                id="t62" class="fa fa-chevron-up" aria-hidden="true"></i></span>
                        <hr />
                        <div class="hospitalList" id="list6">

                            <?php

if(!$reqCount6){
print<<<HERE
<div class='text-center'>No hospitals have this blood sample</div>
HERE;
}
else{
    $i=0;
    while($row=mysqli_fetch_assoc($req6)){

        $id=$row['userId'];
        $name=$row['name'];
        $city=$row['city'];
        $state=$row['state'];
        $count=$row['ABN'];
print<<<HERE
<div class="hospital">
<div style="float:left">
<i class="fa fa-hospital-o iconA" aria-hidden="true"></i> 
<span class="badge">$count </span>
</div>
<div class="hospitalA">
$name
<br>$city, $state
</div>
HERE;
if((isset($_COOKIE['userId'])&&$_COOKIE['type']!=='R')||
(isset($_COOKIE['userId'])&&$_COOKIE['type']==='R'&&$bloodGroup!=6)?false:true){
print<<<HERE
<div class="hospitalB">
<button id="btn6$i" type="button" class="btn btn-default" onclick="request(event,'$id',6)"> Request </button>
</div>
HERE;
}
print<<<HERE
</div>
HERE;
    ++$i;
    if($i<$reqCount6){
        echo('<hr style="clear:both" />');
    }
    }
}

?>

                        </div>
                    </div>
                    <div>Blood Group <span class="bGroup">O+</span> <span class="badge text-primary">
                            <?php echo($reqCount7) ?> </span>
                        <span class="toggle" onclick="toggle(7)"><i id="t71" class="fa fa-chevron-down" aria-hidden="true"></i><i
                                id="t72" class="fa fa-chevron-up" aria-hidden="true"></i></span>
                        <hr />
                        <div class="hospitalList" id="list7">

                            <?php

if(!$reqCount7){
print<<<HERE
<div class='text-center'>No hospitals have this blood sample</div>
HERE;
}
else{
    $i=0;
    while($row=mysqli_fetch_assoc($req7)){

        $id=$row['userId'];
        $name=$row['name'];
        $city=$row['city'];
        $state=$row['state'];
        $count=$row['BOP'];
print<<<HERE
<div class="hospital">
<div style="float:left">
<i class="fa fa-hospital-o iconA" aria-hidden="true"></i> 
<span class="badge">$count </span>
</div>
<div class="hospitalA">
$name
<br>$city, $state
</div>
HERE;
if((isset($_COOKIE['userId'])&&$_COOKIE['type']!=='R')||
(isset($_COOKIE['userId'])&&$_COOKIE['type']==='R'&&$bloodGroup!=7)?false:true){
print<<<HERE
<div class="hospitalB">
<button id="btn7$i" type="button" class="btn btn-default" onclick="request(event,'$id',7)"> Request </button>
</div>
HERE;
}
print<<<HERE
</div>
HERE;
    ++$i;
    if($i<$reqCount7){
        echo('<hr style="clear:both" />');
    }
    }
}

?>

                        </div>
                    </div>
                    <div>Blood Group <span class="bGroup">O-</span> <span class="badge text-primary">
                            <?php echo($reqCount8) ?> </span>
                        <span class="toggle" onclick="toggle(8)"><i id="t81" class="fa fa-chevron-down" aria-hidden="true"></i><i
                                id="t82" class="fa fa-chevron-up" aria-hidden="true"></i></span>
                        <hr />
                        <div class="hospitalList" id="list8">

                            <?php

if(!$reqCount8){
print<<<HERE
<div class='text-center'>No hospitals have this blood sample</div>
HERE;
}
else{
    $i=0;
    while($row=mysqli_fetch_assoc($req8)){

        $id=$row['userId'];
        $name=$row['name'];
        $city=$row['city'];
        $state=$row['state'];
        $count=$row['BON'];
print<<<HERE
<div class="hospital">
<div style="float:left">
<i class="fa fa-hospital-o iconA" aria-hidden="true"></i> 
<span class="badge">$count </span>
</div>
<div class="hospitalA">
$name
<br>$city, $state
</div>
HERE;
if((isset($_COOKIE['userId'])&&$_COOKIE['type']!=='R')||
(isset($_COOKIE['userId'])&&$_COOKIE['type']==='R'&&$bloodGroup!=8)?false:true){
print<<<HERE
<div class="hospitalB">
<button id="btn8$i" type="button" class="btn btn-default" onclick="request(event,'$id',8)"> Request </button>
</div>
HERE;
}
print<<<HERE
</div>
HERE;
    ++$i;
    if($i<$reqCount8){
        echo('<hr style="clear:both" />');
    }
    }
}

?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="navBar">
        <span id="logo" onclick="window.location='/'">Blood Bank</span>
        <div id="navPanel">
            <?php

if (isset($_COOKIE['userId'])) {
    $location=$_COOKIE['type']==='R'?'/receiver.php':'/hospital.php';
    print <<<HERE
<span class="navOptions" onclick="window.location.replace('$location')"><i class="fa fa-home" aria-hidden="true"></i> Home</i></span>
<span class="navOptions" onclick="window.location.replace('/logout.php')"><i class="fa fa-sign-out" aria-hidden="true"></i> Sign Out</i></span>
HERE;
} else {
    print <<<HERE
<span class="navOptions" onclick="window.location='/signIn.php'" onclick="window.location.href('/signIn.html')"><i class="fa fa-user" aria-hidden="true"></i> Sign In</span>
<span class="navOptions" onclick="window.location='/signUp.php'"><i class="fa fa-user-plus" aria-hidden="true"></i> Sign Up</i></span>
HERE;
}

?>
        </div>
    </div>
</body>

</html>