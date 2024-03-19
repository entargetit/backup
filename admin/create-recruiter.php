<?php
session_start();
if(!isset($_SESSION['admin_next']))
{
	header('location: index.php');

}
?>

<?php
$constant_url = $_SERVER['DOCUMENT_ROOT'] . "/functions/constants.php";
include_once($constant_url);

include(DATABASE_URL);
$db=new Database();

?>

<!DOCTYPE html>
<html lang="en">
   

<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Entargetit CRM Admin Panel</title>
      <!-- Favicon and touch icons -->
      <link rel="shortcut icon" href="assets/dist/img/ico/favicon.png" type="image/x-icon">
      <!-- Start Global Mandatory Style
         =====================================================================-->
      <!-- jquery-ui css -->
      <link href="assets/plugins/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
      <!-- Bootstrap -->
      <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
      <!-- Bootstrap rtl -->
      <!--<link href="assets/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->
      <!-- Lobipanel css -->
      <link href="assets/plugins/lobipanel/lobipanel.min.css" rel="stylesheet" type="text/css"/>
      <!-- Pace css -->
      <link href="assets/plugins/pace/flash.css" rel="stylesheet" type="text/css"/>
      <!-- Font Awesome -->
      <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
      <!-- Pe-icon -->
      <link href="assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css"/>
      <!-- Themify icons -->
      <link href="assets/themify-icons/themify-icons.css" rel="stylesheet" type="text/css"/>
      <!-- End Global Mandatory Style
         =====================================================================-->
      <!-- Start Theme Layout Style
         =====================================================================-->
      <!-- Theme style -->
      <link href="assets/dist/css/stylecrm.css" rel="stylesheet" type="text/css"/>
      <!-- Theme style rtl -->
      <!--<link href="assets/dist/css/stylecrm-rtl.css" rel="stylesheet" type="text/css"/>-->
      <!-- End Theme Layout Style
         =====================================================================-->
   </head>
   <body class="hold-transition sidebar-mini">
      <!--preloader-->
      <div id="preloader">
         <div id="status"></div>
      </div>
      <!-- Site wrapper -->
      <div class="wrapper">
        <?php include("includes/header.php");?>
         <!-- =============================================== -->
         <!-- Left side column. contains the sidebar -->
        <?php include("includes/sidebar.php");?>
         <!-- =============================================== -->
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-users"></i>
               </div>
               <div class="header-title">
                  <h1>Create Recruiters</h1>
                  <small></small>
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <!-- Form controls -->
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonlist"> 
                              <a class="btn btn-add " href="user-list.php"> 
                              <i class="fa fa-list"></i>  User List </a>  
                           </div>
                        </div><?php
						   if(isset($_POST['submit']))
						   {
							$name=$_POST['name'];
							$email=$_POST['email'];
							   
							$number=$_POST['number'];
							   
							$address=$_POST['address'];
							   
							$empid=$_POST['empid'];
							$password=$_POST['password'];
							$passs=$password;
							
							
									
									
								$_query="select * FROM recruiters where email='$email'";
						$_run=$db->select($_query);
						$_count=$_run->num_rows;
						if($_count==0)
						{
						$query1="Insert Into recruiters(name,email,number,address,empid,password) values('$name','$email','$number','$address','$empid','$passs')";
						$run=$db->insert($query1);
						if($run)
						{
						echo $msg="<div class='alert alert-success'><strong>Sucess..</strong>Employee Data Has Been Successfully Inserted....</div>"; 
						}
						else
						{
						echo $msg="<div class='alert alert-danger'><strong>!Error..</strong>May be Email Id already Existed please try Again...</div>";	 
						}
						}
						else
						{
						echo $msg="<div class='alert alert-danger'><strong>!Error..</strong>Email Already Exists</div>";  
						}	  
					    }
				?>
						   
                        <div class="panel-body">
                           <form class="col-sm-6" action="" method="POST">
                              <div class="form-group">
                                 <label>Name</label>
                                 <input type="text" name="name" class="form-control" placeholder="Enter Your Name" required>
                              </div>
                             
                              <div class="form-group">
                                 <label>Email</label>
                                 <input type="email"  name="email" class="form-control" placeholder="Enter Email" required>
                              </div>
                              <div class="form-group">
                                 <label>Mobile</label>
                                 <input type="text" name="number" class="form-control" placeholder="Enter Mobile" >
                              </div>
                             
                              <div class="form-group">
                                 <label>Position</label>
                                 <input type="text" class="form-control" name="address"  placeholder="Position" >
                              </div>
							   <div class="form-group">
                                 <label>Employee Id</label>
                                 <input type="varchar" name="empid" class="form-control" placeholder="Enter Employee Id" required>
                              </div>
							  <div class="form-group">
                                 <label>Password</label>
                                 <input type="password" name="password" class="form-control" placeholder="Password" required>
                              </div>
							  
							  
                          
                              
                              <div class="reset-button">
							  
							  <input type="submit" name="submit" class="btn btn-success" value="Save">
							  <input type="reset" name="cancel" class="btn btn-warning" value="Reset">
							  
                                 
                              </div>
                           </form>
						   
						   
						   
						   
                        </div>
						
                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
         <footer class="main-footer">
            <strong>Copyright &copy; 2017-2018 <a href="#">Entargetit</a>.</strong> All rights reserved.
         </footer>
      </div>
      <!-- ./wrapper -->
      <!-- Start Core Plugins
         =====================================================================-->
      <!-- jQuery -->
      <script src="assets/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>
      <!-- jquery-ui --> 
      <script src="assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js" type="text/javascript"></script>
      <!-- Bootstrap -->
      <script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
      <!-- lobipanel -->
      <script src="assets/plugins/lobipanel/lobipanel.min.js" type="text/javascript"></script>
      <!-- Pace js -->
      <script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
      <!-- SlimScroll -->
      <script src="assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
      <!-- FastClick -->
      <script src="assets/plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
      <!-- CRMadmin frame -->
      <script src="assets/dist/js/custom.js" type="text/javascript"></script>
      <!-- End Core Plugins
         =====================================================================-->
      <!-- Start Theme label Script
         =====================================================================-->
      <!-- Dashboard js -->
      <script src="assets/dist/js/dashboard.js" type="text/javascript"></script>
      <!-- End Theme label Script
         =====================================================================-->
   </body>


</html>

