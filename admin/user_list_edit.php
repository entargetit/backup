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
                  <h1>Recruiter Edit </h1>
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
                              <i class="fa fa-list"></i> Recruiter Edit </a>  
                           </div>
                        </div>
						<?php
							  $editid=$_GET['edit'];
									$query_select="Select * From recruiters where id='$editid'";
									$run=$db->select($query_select);
									$i=1;
									while($row=$run->fetch_assoc())
									{
										$id=$row['id'];
										$name=$row['name'];
										$email=$row['email'];
										$number=$row['number'];
										$address=$row['address'];
										$empid=$row['empid'];
										$password=$row['password'];
									}	
									
									?>
						
						
						
						
						
						
						
						   
                        <div class="panel-body">
                           <form class="col-sm-6" action="edituser.php?vara=<?php echo $id;?>" method="POST">
                              <div class="form-group">
                                 <label>Name</label>
                                 <input type="text" value="<?php echo $name;?>" name="name" class="form-control" placeholder="Enter Your Name" required>
                              </div>
                             
                              <div class="form-group">
                                 <label>Email</label>
                                 <input type="email"  value="<?php echo $email;?>" name="email" class="form-control" placeholder="Enter Email" required>
                              </div>
                              <div class="form-group">
                                 <label>Mobile</label>
                                 <input type="text" value="<?php echo $number;?>" name="number" class="form-control" placeholder="Enter Mobile" required>
                              </div>
                             
                              <div class="form-group">
                                 <label>Address</label>
                                 <textarea class="form-control" value="<?php echo $address;?>" name="address" rows="3" placeholder="Address" required><?php echo $address;?></textarea>
                              </div>
							   <div class="form-group">
                                 <label>Employee Id</label>
                                 <input type="varchar" value="<?php echo $empid;?>" name="empid" class="form-control" placeholder="Enter Employee Id" required>
                              </div>
							  <div class="form-group">
                                 <label>Password</label>
                                 <input type="text" value="<?php echo $password;?>" name="password" class="form-control" placeholder="Password" required>
                              </div>
							  
							  <!--<div class="form-group">
                                 <label>Confirm Password</label>
                                 <input type="password" name="confirmpass" class="form-control" placeholder="Password" required>
                              </div>-->
                          
                              
                              <div class="reset-button">
							  
							  <input type="submit" name="submit" class="btn btn-success" value="Save">
							  <input type="reset" name="cancel" class="btn btn-warning" value="Reset">
							  
                                 <!--<a href="#" class="btn btn-warning">Reset</a>
                                 <a href="#" class="btn btn-success">Save</a>-->
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

