<?php

if(!isset($_COOKIE['userId'])){
    header('Location:/signIn.php');
}

if($_COOKIE['type']!=='H'){
    header('Location:/logout.php');
}

include 'server/hospital.php';

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
    <link rel="stylesheet" type="text/css" media="screen" href="css/hospital.css" />
    <script src="js/hospital.js"></script>
</head>

<body>
    <div class="container" id="main">
        <div class="row">
            <div class="col-sm-4 colC">
                <img src="assets/images2.png" class="img-responsive" />
                <br />
                <span class="total stats">
                    <?php echo($total) ?></span> Samples Contributed
                <hr />
                <i class="fa fa-hospital-o" aria-hidden="true"></i>
                <?php echo($data->name) ?>
                <br><br />
                <i class="fa fa-map-pin" aria-hidden="true"></i>
                <?php echo($data->city) ?>
                <br><br />
                <i class="fa fa-map" aria-hidden="true"></i>
                <?php echo($data->state) ?>
                <br /><br />
                <button class="btn btn-default" onclick="window.location='/index.html'"> View Available Blood Samples
                    <i style="color:rgb(160, 2, 2)" class="fa fa-heart" aria-hidden="true"></i></button>
            </div>
            <div class="col-sm-7">
                <div style="clear:both">
                    <h4>Add Blood Samples</h4>
                    <span class="toggle" onclick="toggle(1)"><i id="t11" class="fa fa-chevron-down" aria-hidden="true"></i><i
                            id="t12" class="fa fa-chevron-up" aria-hidden="true"></i></span>
                    <hr />

                    <div class="hospitalList" id="list1">
                        <div id="alert" style="display: none"><span id="alertA">Alert</span>
                            <br /><br />
                        </div>
                        <form id="sampleForm" onsubmit="addSamples(event)">
                            <select id="blood" name="blood" required="true" class="inp">
                                <option value=""> </option>
                                <option value="1">A positive</option>
                                <option value="2">A negative</option>
                                <option value="3">B positive</option>
                                <option value="4">B negative</option>
                                <option value="5">AB positive</option>
                                <option value="6">AB negative</option>
                                <option value="7">O positive</option>
                                <option value="8">O negative</option>
                            </select>
                            <input class="inp" name="quantity" id="quant" type="number" min="1" value="0" />
                            <input class="btn btn-default inp" id="submit" type="submit" name="submit" value="Add Samples" />
                        </form>
                    </div>
                    <div style="clear:both">
                        <h4>Blood Samples Contributed</h4><span class="toggle" onclick="toggle(2)"><i id="t21" class="fa fa-chevron-down"
                                aria-hidden="true"></i><i id="t22" class="fa fa-chevron-up" aria-hidden="true"></i></span>
                        <hr />

                        <div id="list2">
                            <div class="sampleCount blue">
                                <span id="bg1">
                                    <?php echo($data->AP) ?></span>
                                <br />A +
                            </div>
                            <div class="sampleCount red">
                                <span id="bg3">
                                    <?php echo($data->BP) ?></span>
                                <br />B +
                            </div>
                            <div class="sampleCount green">
                                <span id="bg5">
                                    <?php echo($data->ABP) ?></span>
                                <br />AB +
                            </div>
                            <div class="sampleCount purple">
                                <span id="bg7">
                                    <?php echo($data->BOP) ?></span>
                                <br />O +
                            </div>
                            <div class="sampleCount orange" style="clear:both">
                                <span id="bg2">
                                    <?php echo($data->AN) ?></span>
                                <br />A -
                            </div>
                            <div class="sampleCount cyan">
                                <span id="bg4">
                                    <?php echo($data->BN) ?></span>
                                <br />B -
                            </div>
                            <div class="sampleCount pink">
                                <span id="bg6">
                                    <?php echo($data->ABN) ?></span>
                                <br />AB -
                            </div>
                            <div class="sampleCount yellow">
                                <span id="bg8">
                                    <?php echo($data->BON) ?></span>
                                <br />O -
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div style="clear:both">
                    <h4>Blood Samples Requests</h4><span class="toggle" onclick="toggle(3)"><i id="t31" class="fa fa-chevron-down"
                            aria-hidden="true"></i><i id="t32" class="fa fa-chevron-up" aria-hidden="true"></i></span>
                    <hr />

                    <div class="hospitalList" id="list3">

                        <?php

                        if(!$reqCount){
print<<<HERE
<div class='text-center'>You have no blood samples requests</div>
HERE;
                        }
                        else{
                            $i=0;
                            while($row=mysqli_fetch_assoc($req)){

                                $id=$row['requestId'];
                                $name=$row['name'];
                                $mobile=$row['mobile'];
                                $class=$bGroup[(int)$row['class']-1];

                                switch($row['status']){
                                    case 200:
                                    $color='text-success';
                                    break;
                                    case 300:
                                    $color='bGroupA';
                                    break;
                                    default:
                                    $color='text-warning';
                                }
print<<<HERE
<div class="hospital">
<div class="bGroupC bord">
<span id="bGroup"><i class="fa fa-child $color" aria-hidden="true"></i> $class</span>
</div>
<div class="hospitalA bord">
<i class="fa fa-user" aria-hidden="true"></i> $name
<br><i class="fa fa-mobile" aria-hidden="true"></i> $mobile
</div>
<div class="hospitalB bord" >
<button class="btn btn-default" onclick="window.location.href='/pass.php?request=$id'; return false;"> View </button>
</div>
</div>
HERE;
                            ++$i;
                            if($i<$reqCount){
                                echo('<hr style="clear:both" />');
                            }
                            }

                            echo('<div style="height:30px;width:100%"></div>');
                        }

                        ?>

                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div style="clear:both">
                    <h4>Activity</h4><span class="toggle" onclick="toggle(4)"><i id="t41" class="fa fa-chevron-down"
                            aria-hidden="true"></i><i id="t42" class="fa fa-chevron-up" aria-hidden="true"></i></span>
                    <hr />

                    <div class="hospitalList" id="list4">
                        <table>
                            <tr>
                                <td>
                                    <h5>Samples Contributed &emsp;
                                </td>
                                <td> <span class="total"><span class="stats">
                                            <?php echo($total) ?></span> <i class="fa fa-clock-o" aria-hidden="true"></i></span></h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Requests Received &emsp;
                                </td>
                                <td><span class="total">
                                        <?php echo($reqCount) ?> <i class="fa fa-child" aria-hidden="true"></i></span></h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Requests Accepted &emsp;
                                </td>
                                <td> <span class="total">
                                        <?php echo($reqAccepted) ?> <i class="fa fa-heartbeat" aria-hidden="true"></i></span></h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Requests Rejected &emsp;
                                </td>
                                <td><span class="total">
                                        <?php echo($reqRejected) ?> <i class="fa fa-heart" aria-hidden="true"></i></span></h5>
                                </td>
                            </tr>
                        </table>
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