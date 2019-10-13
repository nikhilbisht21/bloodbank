<?php

if(isset($_COOKIE['userId'])){
    header('Location:'.($_COOKIE['type']==='R'?'/receiver.php':'/hospital.php'));
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
    
    <link rel="stylesheet" type="text/css" media="screen" href="css/singnIn.css" />
    <script src="js/signIn.js"></script>
</head>
<body>
    <div id="main">
        <img src="assets/images1.png" class="img-responsive">
        <hr/>
        <div class="alert alert-danger text-center" id="error"></div>
        <form id="signIn" method="POST" class="text-center" onsubmit="signIn(event)">
            <h4 class="text-left labelA" >Email <i class="fa fa-envelope" aria-hidden="true"></i></h4>
            <input id="email" type="email" name="email" type="email" value="" required="true"/>
            <h4 class="text-left labelA">Password <i class="fa fa-key" aria-hidden="true"></i></h4>
            <input id="pass" type="password" name="pass" value="" required="true"/>
            <input id="submit" class="btn btn-default" name="submit" type="submit" name="submit" value="Sign In"/>
        </form>
        <hr/>
        <div class="text-center" style="margin-bottom:50px;">
        <button class="btn btn-default" onclick="window.location.href='/signUp.php'"> Create Account </button>
        </div>
        
    </div>
    <div id="navBar">
        <span id="logo" onclick="window.location='/'">Blood Bank</span>
    </div>
</body>
</html>