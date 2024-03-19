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
      
      
       <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
      <!-- Theme style rtl -->
     <script src="jqueryfile.js"></script>
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
                  <h1>Edit Employer</h1>
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
                           <!--<div class="btn-group" id="buttonlist"> 
                              <a class="btn btn-add " href="#"> 
                              <i class="fa fa-list"></i>  Lead List </a>  
                           </div>-->
                        </div>
						<?php
						if(isset($_POST['submit']))
						{
						extract($_POST);
	                    $query_insert="Update `employers` SET `company`='$company', `name`='$name', `phone`='$phone', `email`='$email' where id='".$_GET['employers']."'";
						$run=$db->insert($query_insert);
						if($run)
							 {
								echo $msg="<div class='alert alert-success'><strong>Sucess..</strong>Employer Detail Has Been Updated....</div>"; 
							 }
							 else
							 {
							echo $msg="<div class='alert alert-danger'><strong>!Error..</strong>Employer Detail has not been Updated...</div>";	 
							 }
							}
				
						?>
                        <div class="panel-body">
                           <form class="col-sm-6" action="" method="POST">
                               
                               <?php
                           $quer_select="SELECT * FROM employers where id='".$_GET['employers']."'";
                           $run_select=$db->select($quer_select);
                           $row_selct=$run_select->fetch_assoc();
                             ?> 
                               
                               <div class="form-group">
                                  
                                 <label>Employer Company Name</label>
                                 <input type="text" name="company" class="form-control" value="<?php echo $row_selct['company'];?>" placeholder="Employer Company Name" required>
                              </div>
                                                                    					 <div class="form-group">

                                 <label>Employer Name</label>
                                 <input type="text" name="name" class="form-control" value="<?php echo $row_selct['name'];?>" placeholder="Employer Name" required>
                              </div>
                              
                              <div class="form-group">
                                 <label>Employer Phone Number</label>
                                 <input type="number" name="phone" id="email" value="<?php echo $row_selct['phone'];?>" class="form-control" placeholder="Employer Phone Numbert" autocomplete="off" required>
                              </div>
                              <div class="form-group">
                                 <label>Employer Email</label>
                                 <input type="email" name="email" value="<?php echo $row_selct['email'];?>" class="form-control" placeholder="Employer Email" required>
                              </div>
                              <div class="reset-button">
							  <input type="submit" value="Submit" id="sub_sub" name="submit"class="btn btn-success">
							  <input type="reset" value="Cancel" class="btn btn-warning">
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
         <!--Link For new data table -->
          <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" type="text/javascript"></script>
           <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
            <script type="text/javascript">
                
                $(document).ready(function() {
    $('#example').DataTable({
        "scrollX": true
                            });
} );
                
            </script>
         
   </body>


</html>

