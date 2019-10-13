<?php

if(!isset($_COOKIE['userId'])){
    header('Location:/signIn.php');
}

if($_COOKIE['type']!=='R'){
    header('Location:/logout.php');
}

include 'server/receiver.php';

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

    <link rel="stylesheet" type="text/css" media="screen" href="css/receiver.css" />
    <script src="js/receiver.js"></script>
</head>

<body>
    <div class="container" id="main">
        <div class="row">
            <div class="col-sm-4 colC">
                <img src="assets/images3.png" class="img-responsive" />
                <hr />
                <i class="fa fa-user" aria-hidden="true"></i> <?php echo($data->name) ?>
                <br><br />
                <i class="fa fa-male" aria-hidden="true"></i> <?php echo($data->gender) ?>
                <br><br />
                <i class="fa fa-birthday-cake" aria-hidden="true"></i> <?php echo($date) ?>
                <br /><br />
                <span class="bGroup"><i class="fa fa-child bGroupA" aria-hidden="true"></i> <?php echo($bGroup[(int)$data->bGroup-1]) ?></span>
                <br /><br />
                <button class="btn btn-default" onclick="window.location='/index.php'"> Request Blood Sample <i style="color:rgb(160, 2, 2)"
                        class="fa fa-heart" aria-hidden="true"></i></button>
            </div>
            <div class="col-sm-7">
                <div style="clear:both">
                    <h4>Blood Samples Requested</h4>
                    <span class="toggle" onclick="toggle(1)"><i id="t11" class="fa fa-chevron-down" aria-hidden="true"></i><i
                            id="t12" class="fa fa-chevron-up" aria-hidden="true"></i></span>
                    <hr />

                    <div class="hospitalList" id="list1">

<?php

if(!$reqSentCount){
print<<<HERE
<div class='text-center'>You have not sent any blood samples requests</div>
HERE;
}
else{
    $i=0;
    while($row=mysqli_fetch_assoc($reqSent)){

        $id=$row['requestId'];
        $name=$row['name'];
        $city=$row['city'];
        $state=$row['state'];
        $class=$bGroup[(int)$row['class']-1];
print<<<HERE
<div class="hospital">
<div class="bGroupC">
<span class="bGroup"><i class="fa fa-heartbeat bGroupA" aria-hidden="true"></i> $class</span>
<span style="float:right"><i class="fa fa-hospital-o iconA" aria-hidden="true"></i><span/>
</div>
<div class="hospitalA">
$name
<br>$city, $state
</div>
<div class="hospitalB">
<button id="btnC$i" type="button" class="btn btn-default" onclick="cancelRequest(event,'$id')"> Cancel </button>
</div>
</div>
HERE;
    ++$i;
    if($i<$reqSentCount){
        echo('<hr style="clear:both" />');
    }
    }
}

?>

                    </div>

                </div>
                <div style="clear:both">
                    <h4>Blood Samples Received</h4><span class="toggle" onclick="toggle(2)"><i id="t21" class="fa fa-chevron-down"
                            aria-hidden="true"></i><i id="t22" class="fa fa-chevron-up" aria-hidden="true"></i></span>
                    <hr />

                    <div class="hospitalList" id="list2">

<?php

if(!$reqCount){
print<<<HERE
<div class='text-center'>No blood samples requests accepted or rejected</div>
HERE;
}
else{
    $i=0;
    while($row=mysqli_fetch_assoc($req)){
        
        $id=$row['requestId'];
        $name=$row['name'];
        $city=$row['city'];
        $state=$row['state'];
        $class=$bGroup[(int)$row['class']-1];

        switch($row['status']){
            case 200:
            $color='text-success';
            break;
            case 300:
            $color='text-warning';
            break;
            default:
            $color='bGroupA';
        }

print<<<HERE
<div class="hospital">
<div class="bGroupC">
<span class="bGroup"><i class="fa fa-heartbeat $color" aria-hidden="true"></i> $class</span>
<span style="float:right"><i class="fa fa-hospital-o iconA" aria-hidden="true"></i><span/>
</div>
<div class="hospitalA">
$name
<br>$city, $state
</div>
<div class="hospitalB">
<button class="btn btn-default" onclick="window.location.href='/pass.php?request=$id'; return false;"> View </button>
</div>
</div>
HERE;
    ++$i;
    if($i<$reqCount){
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
    <div id="navBar">
        <span id="logo" onclick="window.location='/'">Blood Bank</span>
        <div id="navPanel">
            <span class="navOptions" onclick="window.location.replace('/logout.php')"><i class="fa fa-sign-out"
                    aria-hidden="true"></i> Sign Out</i></span>
        </div>
    </div>
</body>

</html>