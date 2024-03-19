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
          <style>
         .man_result .col-md-2{    text-align: center;
    border: 1px solid #009688;
    width: 16.333%;
    padding: 10px 0 0;
    margin: 0 0 0 3px;
    position: relative;
    font-size: 13px;
    background: #e8f1f3;
    font-weight: 600;
    text-transform: uppercase;
    color: #009688;
    border-radius: 5px;}
    
    .form-control {
    height: 60px;
    padding: 6px 12px;
    font-size: 13px;
    font-weight: 600;
    text-transform: uppercase;
    color: #009688;
    background-color: #e8f1f3;
    border: 1px solid #009688;
 
}

div.dataTables_wrapper div.dataTables_length select {
    width: 75px;
    height: 60px;
    display: inline-block;
}
     </style>
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
                  <h1>Manage New Report</h1>
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
                              <i class="fa fa-list"></i>New Report List</a>  
                           </div>
                        </div>
					
                        <div class="panel-body">
                            <div class="row">
                                <col-md-12>
                            <div class="col-md-2">
                              
                                
                <select class="form-control" name="dropdownl">
                    <option value="1">Total</option>
                    <option value="2">Today</option>
                    <option value="3">Last 7 Days</option>
                    <option value="4">Last 30 Days</option>
                    
                </select>
                </div>
                <div class="man_result">
                
                    </div>
                    </div>
                    

                    </div>
                
                
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                              <tr>
                                 <th>SR. No</th>
                                 <th>Date</th>
                                 <th>Recruiter Name</th>
                                 <th>Recruiter Email</th>
                                 <th>No of requirements</th>
                                 <th>No of submittal</th>
                                 <th>No Of End Client</th>
                                 <th>No Of End User Interviews</th>
                                 <th>No Of Joining</th>
                                 <th>Edit</th>
                                 <th>Delete</th>
                              </tr>
                       </thead>
                       <tbody>
                           <?php
                           $id_x=0;
                           $quer_select="SELECT * FROM recruiter_report where emp_email='".$_GET['emp_email']."' AND emp_id='".$_GET['emp_id']."' order by id DESC";
                           $run_select=$db->select($quer_select);
                           while($row_selct=$run_select->fetch_assoc())
                           {
                               $id_x++;
                               ?>
                                <tr>
                                    <td><?php echo $id_x;?></td>
                                    <td><?php echo date('d-m-Y',strtotime($row_selct['created_date']));?></td>
                                    <td><?php echo $row_selct['emp_name'];?></td>
                                    <td><?php echo $row_selct['emp_email'];?></td>
                                    <!--<td><?php echo $row_selct['emp_id'];?></td>-->
                                    <td><?php echo $row_selct['request'];?></td>
                                    <td><?php
                                    if($row_selct['submitable']< (int)($row_selct['request'])/2)
                                    {
                                    ?>
                                    <span class="btn btn-danger">
                                    <?php
                                     echo $row_selct['submitable'];
                                     ?>
                                    </span>
                                    <?php
                                    }
                                    else
                                    {
                                        ?>
                                    <span class="btn btn-success">
                                    <?php
                                        echo $row_selct['submitable'];
                                        ?>
                                    </span>
                                    <?php
                                    }
                                    ?></td>
                                    <td><?php echo $row_selct['end_client'];?></td>
                                    <td><?php echo $row_selct['user_interview'];?></td>
                                    <td><?php echo $row_selct['joining'];?></td>
                                    <td><a href="edit-new-report.php?new_report=<?php echo $row_selct['id'];?>" class="btn btn-success" onclick="return confirm('Are You Sure To Edit ?');">Edit</a></td>
                                    <td><a href="delete.php?new_report=<?php echo $row_selct['id'];?>" onclick="return confirm('Are You Sure To Delete ?');" class="btn btn-danger">Delete</a></td>
                                    
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
     <input type="hidden" name="emp_emailing" value="<?php echo $_GET['emp_email'];?>">
     <input type="hidden" name="emp_iding" value="<?php echo $_GET['emp_id'];?>">        
              <script>
                 $(document).ready(function()
                 {
                //$("#example_length label").text("");
                var emp_emailing=$('[name="emp_emailing"]').val();
                var emp_iding=$('[name="emp_iding"]').val();
                
                $(document).delegate('[name="dropdownl"]',"change",function()
                {
                var data=$(this).val();   
                $.ajax({
                    url: "action_count1.php",
                    method:"POST",
                    data:{x_data:data,emp_emailing:emp_emailing,emp_iding:emp_iding},
                    success:function(data)
                    {
                      $(".man_result").html(data)
                    }
                  }); 
               });
               
               
                $.ajax({
                    url: "action_count1.php",
                    method:"POST",
                    data:{x_data:1,emp_emailing:emp_emailing,emp_iding:emp_iding},
                    success:function(data)
                    {
                      $(".man_result").html(data)
                    }
                  }); 
               });
             </script>
         
   </body>


</html>

