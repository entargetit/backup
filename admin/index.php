<?php
session_start();
?>

<?php
$constant_url = $_SERVER['DOCUMENT_ROOT'] . "/functions/constants.php";
include_once($constant_url);

include(DATABASE_URL);
$db=new Database();
$mmm="";
?>




<!DOCTYPE html>
<html lang="en">
    

<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Entargetit CRM Admin Panel</title>

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/dist/img/ico/favicon.png" type="image/x-icon">
        <!-- Bootstrap -->
        <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <!-- Bootstrap rtl -->
        <!--<link href="assets/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->
        <!-- Pe-icon-7-stroke -->
        <link href="assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css"/>
        <!-- style css -->
        <link href="assets/dist/css/stylecrm.css" rel="stylesheet" type="text/css"/>
        <!-- Theme style rtl -->
        <!--<link href="assets/dist/css/stylecrm-rtl.css" rel="stylesheet" type="text/css"/>-->
    </head>
    <body>
        <!-- Content Wrapper -->
        <div class="login-wrapper">
            
            <div class="container-center">
            <div class="login-area">
                <div class="panel panel-bd panel-custom">
                    <div class="panel-heading">
                        <div class="view-header">
                            <div class="header-icon">
                                <i class="pe-7s-unlock"></i>
                            </div>
                            <div class="header-title">
                                <h3>Super Admin Login</h3>
                                <small><strong>Please enter your credentials to login.</strong></small>
                            </div>
                        </div>
                    </div><?php

if(isset($_POST['submit']))
{
$user=$_POST['username'];
$password=$_POST['password'];
$pass=$password;

$query="Select * From superlogin where id=2";
$run=$db->select($query);
$row=$run->fetch_assoc();
$userr=$row['user'];
$passs=$row['password'];
if($user==$userr && $pass==$passs)
{
$_SESSION['admin_next']=$userr;
echo "<script>open('super-admin.php','_self')</script>";
}
else
{
$msg="<div class='alert alert-danger'><strong>!Error..</strong>Eail Or Paasword is Worng.. </div>";
echo $mmm=$db->errors($msg);
}
}
?>
                    <div class="panel-body">
				
                        <form action="#" id="loginForm" method="POST" novalidate>
                            <div class="form-group">
                                <label class="control-label" for="username">Username</label>
                                <input type="text" placeholder="" title="Please enter you username"  name="username" id="username" class="form-control">
                                <!--<span class="help-block small">Your unique username to app</span>--->
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" title="Please enter your password" placeholder="******" name="password" id="password" class="form-control">
                                <!--<span class="help-block small">Your strong password</span>--->
                            </div>
                            <div>
                               <!-- <a href="super-admin.php" class="btn btn-add">Login</a>-->
								<input type="submit" name="submit" value="submit" class="btn btn-add">
                               <!-- <a class="btn btn-warning" href="register.php">Register</a>-->
                            </div>
                        </form>
                        </div>
                        </div>
                </div>
            </div>
        </div>
        <!-- /.content-wrapper -->
        <!-- jQuery -->
        <script src="assets/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>
        <!-- bootstrap js -->
        <script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    </body>


</html>
