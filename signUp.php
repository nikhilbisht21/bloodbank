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
    <script src="js/signUp.js"></script>
</head>

<body>
    <!---For Receivers Registration----->

    <div class="container" id="mainA">
        <div class="row">
            <div class="col-sm-3 colB"></div>
            <div class="col-sm-6 colB">
                <h4>Blood Receiver Registration</h4>
                <hr />
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 colB"></div>
            <div class="col-sm-6 colB">
                <div class="alert alert-danger text-center error" id="error1"></div>
            </div>
        </div>
        <form id="formR" class="form" method="POST" onsubmit="signUp(event)">
            <div class="row">
                <div class="col-sm-3 colB"></div>
                <div class="col-sm-3 colB">
                    <h4><i class="fa fa-user" aria-hidden="true"></i> Name</h4>
                </div>
                <div class="col-sm-3 colB"><input class="inpA" type="text" name="uname" value="" required="true" /></div>
            </div>
            <div class="row">
                <div class="col-sm-3 colB"></div>
                <div class="col-sm-3 colB">
                    <h4><i class="fa fa-female" aria-hidden="true"></i> Gender</h4>
                </div>
                <div class="col-sm-3 colB">
                    <select class="inpA" name="gender" required="true">
                        <option value=""> </option>
                        <option value="Male">Female</option>
                        <option value="Female">Male</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3 colB"></div>
                <div class="col-sm-3 colB">
                    <h4><i class="fa fa-calendar" aria-hidden="true"></i> DOB</h4>
                </div>
                <div class="col-sm-3 colB"><input class="inpA" type="date" name="dob" value="" required="true" /></div>
            </div>
            <div class="row">
                <div class="col-sm-3 colB"></div>
                <div class="col-sm-3 colB">
                    <h4><i class="fa fa-leaf" aria-hidden="true"></i> Blood Group</h4>
                </div>
                <div class="col-sm-3 colB">
                    <select class="inpA" name="type" required="true">
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
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3 colB"></div>
                <div class="col-sm-3 colB">
                    <h4><i class="fa fa-mobile" aria-hidden="true"></i> Mobile</h4>
                </div>
                <div class="col-sm-3 colB"><input class="inpA mobile" type="text" name="mobile" value="" minlength="10" maxlength="10" required="true" onblur="validate(event)" /></div>
            </div>
            <div class="row">
                <div class="col-sm-3 colB"></div>
                <div class="col-sm-3 colB">
                    <h4><i class="fa fa-envelope" aria-hidden="true"></i> Email</h4>
                </div>
                <div class="col-sm-3 colB"><input class="inpA email" type="email" name="email" value="" required="true" onblur="validate(event)" /></div>
            </div>
            <div class="row">
                <div class="col-sm-3 colB"></div>
                <div class="col-sm-3 colB">
                    <h4><i class="fa fa-key" aria-hidden="true"></i> Password</h4>
                </div>
                <div class="col-sm-3 colB"><input class="inpA pass1" type="password"name="pass1" value="" minlength="8" required="true" /></div>
            </div>
            <div class="row">
                <div class="col-sm-3 colB"></div>
                <div class="col-sm-3 colB">
                    <h4><i class="fa fa-lock" aria-hidden="true"></i> Re-Enter Password</h4>
                </div>
                <div class="col-sm-3 colB"><input class="inpA pass2" type="password" name="pass2" value="" minlength="8"  required="true" /></div>
            </div>
            <div class="row text-center">
                <div class="col-sm-3 colB"></div>
                <div class="col-sm-6 colB">
                    <br />
                    <input class="btn btn-default submit" type="submit" name="submit" value="Register" />
                </div>
            </div>
        </form>
    </div>

    <!--For Hospital Registeration----------------------->

    <div class="container" id="mainB">
        <div class="row">
            <div class="col-sm-3 colB"></div>
            <div class="col-sm-6 colB">
                <h4>Hospital Registration</h4>
                <hr />
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 colB"></div>
            <div class="col-sm-6 colB">
                <div class="alert alert-danger text-center error" id="error2"></div>
            </div>
        </div>
        <form id="formH" class="form"  method="POST" onsubmit="signUp(event)">
            <div class="row">
                <div class="col-sm-3 colB"></div>
                <div class="col-sm-3 colB">
                    <h4><i class="fa fa-hospital-o" aria-hidden="true"></i> Hospital Name</h4>
                </div>
                <div class="col-sm-3 colB"><input class="inpA" type="text" name="uname" value="" required="true" /></div>
            </div>
            <div class="row">
                <div class="col-sm-3 colB"></div>
                <div class="col-sm-3 colB">
                    <h4><i class="fa fa-map-pin" aria-hidden="true"></i> City</h4>
                </div>
                <div class="col-sm-3 colB"><input class="inpA" type="text" name="city" value="" required="true" /></div>
            </div>
            <div class="row">
                <div class="col-sm-3 colB"></div>
                <div class="col-sm-3 colB">
                    <h4><i class="fa fa-map-marker" aria-hidden="true"></i> State</h4>
                </div>
                <div class="col-sm-3 colB"><input class="inpA" type="text" name="state" value="" required="true" /></div>
            </div>
            <div class="row">
                <div class="col-sm-3 colB"></div>
                <div class="col-sm-3 colB">
                    <h4><i class="fa fa-leaf" aria-hidden="true"></i> Type</h4>
                </div>
                <div class="col-sm-3 colB">
                    <select class="inpA" name="type" required="true">
                        <option value=""> </option>
                        <option value="1">Government</option>
                        <option value="2">Semi-Government</option>
                        <option value="3">Private</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3 colB"></div>
                <div class="col-sm-3 colB">
                    <h4><i class="fa fa-mobile" aria-hidden="true"></i> Mobile</h4>
                </div>
                <div class="col-sm-3 colB"><input class="inpA mobile" type="text" name="mobile" value="" minlength="10" maxlength="10" required="true" onblur="validate(event)" /></div>
            </div>
            <div class="row">
                <div class="col-sm-3 colB"></div>
                <div class="col-sm-3 colB">
                    <h4><i class="fa fa-envelope" aria-hidden="true"></i> Email</h4>
                </div>
                <div class="col-sm-3 colB"><input class="inpA email" type="email" name="email" value="" required="true" onblur="validate(event)" /></div>
            </div>
            <div class="row">
                <div class="col-sm-3 colB"></div>
                <div class="col-sm-3 colB">
                    <h4><i class="fa fa-key" aria-hidden="true"></i> Password</h4>
                </div>
                <div class="col-sm-3 colB"><input class="inpA pass1" type="password"name="pass1" value="" minlength="8"  required="true" /></div>
            </div>
            <div class="row">
                <div class="col-sm-3 colB"></div>
                <div class="col-sm-3 colB">
                    <h4><i class="fa fa-lock" aria-hidden="true"></i> Re-Enter Password</h4>
                </div>
                <div class="col-sm-3 colB"><input class="inpA pass2" type="password" name="pass2" value="" minlength="8"  required="true" /></div>
            </div>
            <div class="row text-center">
                <div class="col-sm-3 colB"></div>
                <div class="col-sm-6 colB">
                    <br />
                    <input class="btn btn-default submit" type="submit" name="submit" value="Register" />
                </div>
            </div>
        </form>
    </div>

    <div id="navBar">
        <span id="logo" onclick="window.location='/'">Blood Bank</span>
        <div id="navPanel">
            <span class="navOptions" onclick="changeRegister(0)"><i class="fa fa-hospital-o" aria-hidden="true"></i>
                Hospital</span>
            <span class="navOptions" onclick="changeRegister(1)"><i class="fa fa-user" aria-hidden="true"></i> Receiver</i></span>
        </div>
    </div>
</body>

</html>