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
                  <h1>Edit Consultant</h1>
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
	                    $query_insert="Update `consultant` SET `consult_name`='$consult_name', `skill`='$skill', `phone`='$phone', `email`='$email', `visa`='$visa', `rate`='$rate', `tax_term`='$tax_term', `state`='$state' where id='".$_GET['consultant']."'";
						$run=$db->insert($query_insert);
						if($run)
							 {
								echo $msg="<div class='alert alert-success'><strong>Sucess..</strong>Consultant Detail Has Been Updated....</div>"; 
							 }
							 else
							 {
							echo $msg="<div class='alert alert-danger'><strong>!Error..</strong>Consultant Detail has not been Updated...</div>";	 
							 }
							}
				
						?>
                        <div class="panel-body">
                           <form class="col-sm-6" action="" method="POST">
                               
                               <?php
                           $quer_select="SELECT * FROM consultant where id='".$_GET['consultant']."'";
                           $run_select=$db->select($quer_select);
                           $row_selct=$run_select->fetch_assoc();
                             ?> 
                               
                               <div class="form-group">
                                  
                                 <label>Consultant Name</label>
                                 <input type="text" name="consult_name" value="<?php echo $row_selct['consult_name'];?>" class="form-control" placeholder="Consultant Name" required>
                              </div>
                                                                    					 <div class="form-group">

                                 <label>Skill</label>
                                 <input type="text" name="skill" value="<?php echo $row_selct['skill'];?>" class="form-control" placeholder="Skill" required>
                              </div>
                              
                              <div class="form-group">
                                 <label>Phone Number</label>
                                 <input type="number" name="phone" value="<?php echo $row_selct['phone'];?>" id="email" class="form-control" placeholder="Phone Numbert" autocomplete="off" required>
                              </div>
                              <div class="form-group">
                                 <label>Email</label>
                                 <input type="email" name="email" value="<?php echo $row_selct['email'];?>" class="form-control" placeholder="Email" required>
                              </div>
                              <div class="form-group">
                                 <label>Visa Drag & Drop</label>
                                 <select class="form-control" name="visa">
                                     <option value="">select</option>
                                     <option value="US Citizen" <?php if($row_selct['visa']=="US Citizen"){ echo "selected";}?>>US Citizen</option>
                                     <option value="Green Card" <?php if($row_selct['visa']=="Green Card"){ echo "selected";}?>>Green Card</option>
                                     <option value="EAD" <?php if($row_selct['visa']=="EAD"){ echo "selected";}?>>EAD</option>
                                     <option value="H1B" <?php if($row_selct['visa']=="H1B"){ echo "selected";}?>>H1B</option>
                                     <option value="TN" <?php if($row_selct['visa']=="TN"){ echo "selected";}?>>TN</option>
                                   </select>
                              </div>
                              
                                      <div class="form-group">
                                 <label>Rate</label>
                               <input  type="text" class="form-control" name="rate" value="<?php echo $row_selct['rate']?>">
                              </div>
                              
                              
                              
                             <div class="form-group">
                                 <label>Tax Terms</label>
                                 <select class="form-control" name="tax_term">
                                     <option value="">Select Tax Terms</option>
                                     <option value="1099" <?php if($row_selct['tax_term']=="1099"){ echo "selected";}?>>1099</option>
                                     <option value="W2" <?php if($row_selct['tax_term']=="W2"){ echo "selected";}?>>W2</option>
                                     <option value="C2C" <?php if($row_selct['tax_term']=="C2C"){ echo "selected";}?>>C2C</option>
                                    
                                   </select>
                              </div>
                              
                             <div class="form-group">
                                 <label>State</label>
                               
                                  <select class="form-control" name="state" required>
                                     <option value="">select</option>
                                     <option value="Alabama" <?php if($row_selct['state']=="Alabama"){ echo "selected";}?>>Alabama</option>
                                     <option value="Alaska" <?php if($row_selct['state']=="Alaska"){ echo "selected";}?>>Alaska</option>
                                     <option value="American Samoa" <?php if($row_selct['state']=="American Samoa"){ echo "selected";}?>>American Samoa</option>
                                     <option value="Arizona" <?php if($row_selct['state']=="Arizona"){ echo "selected";}?>>Arizona</option>
                                     <option value="Arkansas" <?php if($row_selct['state']=="Arkansas"){ echo "selected";}?>>Arkansas</option>
                                     
                                     <option value="California" <?php if($row_selct['state']=="California"){ echo "selected";}?>>California</option>
                                     <option value="Colorado" <?php if($row_selct['state']=="Colorado"){ echo "selected";}?>>Colorado</option>
                                     <option value="Connecticut" <?php if($row_selct['state']=="Connecticut"){ echo "selected";}?>>Connecticut</option>
                                     <option value="District Of Columbia" <?php if($row_selct['state']=="District Of Columbia"){ echo "selected";}?>>District Of Columbia</option>
                                     <option value="Federated States Of Micronesia" <?php if($row_selct['state']=="Federated States Of Micronesia"){ echo "selected";}?>>Federated States Of Micronesia</option>
                                     <option value="Florida" <?php if($row_selct['state']=="Florida"){ echo "selected";}?>>Florida</option>
                                     <option value="Georgia" <?php if($row_selct['state']=="Georgia"){ echo "selected";}?>>Georgia</option>
                                     <option value="Guam" <?php if($row_selct['state']=="Guam"){ echo "selected";}?>>Guam</option>
                                     <option value="Hawaii" <?php if($row_selct['state']=="Hawaii"){ echo "selected";}?>>Hawaii</option>
                                     <option value="Idaho" <?php if($row_selct['state']=="Idaho"){ echo "selected";}?>>Idaho</option>
                                     <option value="Illinois" <?php if($row_selct['state']=="Illinois"){ echo "selected";}?>>Illinois</option>
                                     <option value="Indiana" <?php if($row_selct['state']=="Indiana"){ echo "selected";}?>>Indiana</option>
                                     <option value="Iowa" <?php if($row_selct['state']=="Iowa"){ echo "selected";}?>>Iowa</option>
                                     <option value="Kansas" <?php if($row_selct['state']=="Kansas"){ echo "selected";}?>>Kansas</option>
                                     <option value="Kentucky" <?php if($row_selct['state']=="Kentucky"){ echo "selected";}?>>Kentucky</option>
                                     <option value="Louisiana" <?php if($row_selct['state']=="Louisiana"){ echo "selected";}?>>Louisiana</option>
                                     <option value="Maine" <?php if($row_selct['state']=="Maine"){ echo "selected";}?>>Maine</option>
                                     <option value="Marshall Islands" <?php if($row_selct['state']=="Marshall Islands"){ echo "selected";}?>>Marshall Islands</option>
                                     <option value="Maryland" <?php if($row_selct['state']=="Maryland"){ echo "selected";}?>>Maryland</option>
                                     <option value="Massachusetts" <?php if($row_selct['state']=="Massachusetts"){ echo "selected";}?>>Massachusetts</option>
                                     <option value="Michigan" <?php if($row_selct['state']=="Michigan"){ echo "selected";}?>>Michigan</option>
                                     <option value="Minnesota" <?php if($row_selct['state']=="Minnesota"){ echo "selected";}?>>Minnesota</option>
                                     <option value="Mississippi" <?php if($row_selct['state']=="Mississippi"){ echo "selected";}?>>Mississippi</option>
                                     <option value="Missouri" <?php if($row_selct['state']=="Missouri"){ echo "selected";}?>>Missouri</option>
                                     <option value="Montana" <?php if($row_selct['state']=="Montana"){ echo "selected";}?>>Montana</option>
                                     <option value="Nebraska" <?php if($row_selct['state']=="Nebraska"){ echo "selected";}?>>Nebraska</option>
                                     <option value="New Hampshire" <?php if($row_selct['state']=="New Hampshire"){ echo "selected";}?>>New Hampshire</option>
                                     <option value="New Jersey" <?php if($row_selct['state']=="New Jersey"){ echo "selected";}?>>New Jersey</option>
                                     
                                     <option value="New Mexico" <?php if($row_selct['state']=="New Mexico"){ echo "selected";}?>>New Mexico</option>
                                     <option value="New York" <?php if($row_selct['state']=="New York"){ echo "selected";}?>>New York</option>
                                     <option value="North Carolina" <?php if($row_selct['state']=="North Carolina"){ echo "selected";}?>>North Carolina</option>
                                     <option value="North Dakota" <?php if($row_selct['state']=="North Dakota"){ echo "selected";}?>>North Dakota</option>
                                     <option value="Northern Mariana Islands" <?php if($row_selct['state']=="Northern Mariana Islands"){ echo "selected";}?>>Northern Mariana Islands</option>
                                     <option value="Ohio" <?php if($row_selct['state']=="Ohio"){ echo "selected";}?>>Ohio</option>
                                     <option value="Oklahoma" <?php if($row_selct['state']=="Oklahoma"){ echo "selected";}?>>Oklahoma</option>
                                     <option value="Oregon" <?php if($row_selct['state']=="Oregon"){ echo "selected";}?>>Oregon</option>
                                     <option value="Palau" <?php if($row_selct['state']=="Palau"){ echo "selected";}?>>Palau</option>
                                     <option value="Pennsylvania" <?php if($row_selct['state']=="Pennsylvania"){ echo "selected";}?>>Pennsylvania</option>
                                     <option value="Puerto Rico" <?php if($row_selct['state']=="Puerto Rico"){ echo "selected";}?>>Puerto Rico</option>
                                     <option value="Rhode Island" <?php if($row_selct['state']=="Rhode Island"){ echo "selected";}?>>Rhode Island</option>
                                     
                                     
                                     <option value="South Carolina" <?php if($row_selct['state']=="South Carolina"){ echo "selected";}?>>South Carolina</option>
                                     <option value="South Dakota" <?php if($row_selct['state']=="South Dakota"){ echo "selected";}?>>South Dakota</option>
                                     <option value="Tennessee" <?php if($row_selct['state']=="Tennessee"){ echo "selected";}?>>Tennessee</option>
                                     <option value="Texas" <?php if($row_selct['state']=="Texas"){ echo "selected";}?>>Texas</option>
                                     <option value="Utah" <?php if($row_selct['state']=="Utah"){ echo "selected";}?>>Utah</option>
                                     <option value="Vermont" <?php if($row_selct['state']=="Vermont"){ echo "selected";}?>>Vermont</option>
                                     <option value="Virginia" <?php if($row_selct['state']=="Virginia"){ echo "selected";}?>>Virginia</option>
                                     <option value="Washington" <?php if($row_selct['state']=="Washington"){ echo "selected";}?>>Washington</option>
                                     <option value="West Virginia" <?php if($row_selct['state']=="West Virginia"){ echo "selected";}?>>West Virginia</option>
                                     
                                     <option value="Wisconsin" <?php if($row_selct['state']=="Wisconsin"){ echo "selected";}?>>Wisconsin</option>
                                     
                                     <option value="Wyoming" <?php if($row_selct['state']=="Wyoming"){ echo "selected";}?>>Wyoming</option>
                                    
                                     
                                     
                                   </select>
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

