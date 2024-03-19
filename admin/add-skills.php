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
                  <h1>Create Skills</h1>
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
                              <a class="btn btn-add " href="#"> 
                              <i class="fa fa-list"></i> Create Skills</a>  
                           </div>
                        </div>
                    <?php
						if(isset($_POST['submit']))
						{
						    extract($_POST);
$id=rand();
							 $query1="INSERT INTO `skill`(`id`,`skills`, `data_uploader`, `created_date`) VALUES ('$id','$skills','$data_uploader','".date('d-m-Y')."')";
							 $run=$db->insert($query1);
							 if($run)
							 {
								echo $msg="<div class='alert alert-success'><strong>Sucess..</strong>Skill Has Been Successfully Inserted....</div>"; 
							 }
							 else
							 {
							echo $msg="<div class='alert alert-danger'><strong>!Error..</strong>Something Went Wrong Please try again</div>";	 
							 }
						}
				    ?>
						   
                        <div class="panel-body">
                           <form class="col-sm-6" action="" method="POST">
                              <div class="form-group">
                                 <label>Skill</label>
                                 <input type="text" name="skills" class="form-control" placeholder="Add Skills" required>
                              </div>
                            <div class="form-group">
                                 <label>Data Uploader</label>
                                 <input type="text" name="data_uploader" class="form-control" placeholder="Data Uploader" required>
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
            
                  <section class="content">
               <div class="row">
                  <!-- Form controls -->
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonlist"> 
                              <a class="btn btn-add " href="#"> 
                              <i class="fa fa-list"></i>Skill List</a>  
                           </div>
                        </div>
                
                        <div class="panel-body">
 
                           <div class="table-responsive">
                              <table id="my-table-id" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>Sr.No</th>
                                       <th>Skills</th>
                                       <th>Data Uploader</th>
                                       <th>Date</th>
                                       <th>Action</th>
                                      
                                    </tr>
                                 </thead>
                                 <tbody>
								 <?php
								    $i=1;
									$query_select="SELECT * FROM `skill` order by id desc";
									$runs=$db->select($query_select);
								    while($rows=$runs->fetch_assoc())
									{
									extract($rows);
									
									?>
                                    <tr>
									
                                       <td><?php echo $i++;?></td>
                                       <td><?php echo $skills;?></td>
                                        <td><?php echo $data_uploader;?></td>
                                       <td><?php echo $created_date;?></td>
                                       <td>
                                           <a href="skill-edit.php?skill=<?php echo $id;?>" class="btn btn-info">Edit</a>
                                           
                                           <a href="delete.php?skill=<?php echo $id;?>" class="btn btn-danger">Delete</a>
                                           
                                           </td>
                                       
                                       
                                       </tr>
									 <?php
									}
									?>
                                     
                                    
                                 </tbody>
                              </table>
                           </div>
						   
						   
						   
						   
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
   <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>
   </body>


</html>

