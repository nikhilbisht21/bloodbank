<?php
include 'server/config.php';

$month = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
$bGroup = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
$location=$_COOKIE['type']==='R'?'/receiver.php':'/hospital.php';
$type=['Government','Semi-Government','Private'];

try {

    if(!isset($_COOKIE['userId'])){
        throw new Exception('404');
    }

    $conn = mysqli_connect($host, $user, $pass, $database);

    if (!$conn) {
        throw new Exception('500');
    }

    $requestId = $_GET['request'];

    $sql = "select * from request,receiver where request.sender=receiver.userId and request.requestId='$requestId'";
    $result = mysqli_query($conn, $sql);

    if (!mysqli_num_rows($result)) {
        throw new Exception('400');
    }

    $row1 = mysqli_fetch_assoc($result);

    $sql = "select * from request,hospital where request.receiver=hospital.userId and request.requestId='$requestId'";
    $result = mysqli_query($conn, $sql);

    if (!mysqli_num_rows($result)) {
        throw new Exception('400');
    }

    $row2 = mysqli_fetch_assoc($result);

    mysqli_close($conn);

    $tmp = explode('-', $row1['dob']);
    $date = $tmp[2] . ' ' . $month[(int)$tmp[1] - 1] . ', ' . $tmp[0];

    switch ($row1['status']) {
        case 100:
            $status = 'Pending';
            $class = 'text-info';
            break;
        case 300:
            $status = 'Rejected';
            $class = 'text-danger';
            break;
        default:
            $status = 'Approved';
            $class = 'text-success';
    }

} catch (Exception $e) {
   header('Location:/error.html');
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Blood Bank</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"><!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" media="screen" href="css/hospital.css" />
    <script src="js/pass.js"></script>
</head>

<body>
    <div class="container" id="pass">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <div id="tagDiv">
                    <img id="passImg" src="assets/cord-blood-and-tissue.png" class="img-responsive" /><span id="logoName" class="hid">Blood
                        Bank</span>
                </div>
                <br /><br />
                <div>
                    <i class="fa fa-hospital-o" aria-hidden="true"></i> <?php echo($row2['name'])  ?>
                    <br /><br /><i class="fa fa-map" aria-hidden="true"></i> <?php echo($row2['city'])  ?>, <?php echo($row2['state'])  ?>
                    <br /><br /><i class="fa fa-phone " aria-hidden="true"></i> <?php echo($row2['mobile'])  ?>
                    <br /><br /><i class="fa fa-leaf " aria-hidden="true"></i> <?php echo($type[(int)$row2['bGroup']-1].' Hospital')  ?>
                    <br /><br />
                </div>
                <div>
                    <h4> Blood Receiver </h4>
                    <br />
                    <table>
                        <tr>
                            <td>Name&emsp;</td>
                            <td><?php echo($row1['name'])  ?></td>
                        </tr>
                        <tr>
                            <td>Dob&emsp;</td>
                            <td><?php echo($date)  ?></td>
                        </tr>
                        <tr>
                            <td>Gender&emsp;</td>
                            <td><?php echo($row1['gender'])  ?></td>
                        </tr>
                        <tr>
                            <td>Contact&emsp;</td>
                            <td><?php echo($row1['mobile'])  ?></td>
                        </tr>
                        <tr>
                            <td>Blood Group&emsp;&emsp;</td>
                            <td><?php echo($bGroup[(int)$row1['bGroup'] - 1])  ?></td>
                        </tr>
                        <tr>
                            <td>Request Blood Sample&emsp;&emsp;</td>
                            <td class="res <?php echo($class)  ?>"><?php echo($bGroup[$row1['class']-1])  ?></td>
                        </tr>
                        <tr>
                            <td>Request Date&emsp;&emsp;</td>
                            <td class="res <?php echo($class)  ?>"><?php echo($row1['date'])  ?></td>
                        </tr>
                        <tr>
                            <td>Request Status&emsp;&emsp;</td>
                            <td id="status" class="res <?php echo($class)  ?>"><?php echo($status)  ?></td>
                        </tr>
                    </table>
                </div>

                <?php 
                if(isset($_COOKIE['userId'])&&$_COOKIE['type']!=='R'&&$row1['status']==100){

                    $id=$row1['requestId'];
                    $class=$row1['class'];
                    $hId=$row1['receiver'];
print<<<HERE
<div class="text-center" id="buttons">
    <br/>
    <button class="btn btn-default" onclick="request(event,'$id',$class,'$hId',2)"> Generate Pass </button>
    <button class="btn btn-default" onclick="request(event,'$id',3)"> Reject </button>
</div>
HERE;
                }
                else if(isset($_COOKIE['userId'])&&$_COOKIE['type']==='R'&&$row1['status']==200)
                    {
print<<<HERE
<div class="text-center" id="buttons">
    <br/>
    <button class="btn btn-default hid" onclick="printPass()" > Print Pass </button>
</div>
HERE;
                    }
                ?>
                
            </div>
        </div>
    </div>
    <div id="navBar" class="hid" style="position:absolute;top:0px;left:0px;">
        <span id="logo" onclick="window.location='/'">Blood Bank</span>
        <div id="navPanel">
            <span class="navOptions" onclick="window.location.replace('<?php echo($location) ?>')"><i class="fa fa-home" aria-hidden="true"></i> Home</i></span>
        </div>
    </div>
</body>

</html>