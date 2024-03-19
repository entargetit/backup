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

  .new-class
  {
      text-align: center;
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
    border-radius: 5px;
  }
  
    .new-class1
  {
    text-align: center;
    border: 1px solid #009688;
    width: 54.333%;
    padding: 11px;
    margin: 0 0 0 3px;
    position: relative;
    font-size: 13px;
    background: #e8f1f3;
    font-weight: 600;
    text-transform: uppercase;
    color: #009688;
    border-radius: 5px;
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
                    <button class="btn btn-exp btn-sm" id="btnExport">Export Table</button>
                                                              
                       <p>    
                            <div class="col-md-2">
                <select class="form-control" name="dropdownl-cd">
                    <option value="1">Total</option>
                    <option value="2">Today</option>
                    <option value="3">Last 7 Days</option>
                    <option value="4">Last 30 Days</option>
                    
                </select>
                </div>
<table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>Name</th>
        
        <th>No of requirements</th>
         <th>No of requirements served</th>
        
        <th>No of submittal</th>
        <th>No Of End Client</th>
        <th>No Of End User Interviews</th>
        <th>No Of Joining</th>
                               
      </tr>
    </thead>
    <tbody class="man_result-cd">
        <?php 
        $query_spe="SELECT emp_name,SUM(request) as rqt,SUM(served) as ser,SUM(submitable) as subtbl,SUM(end_client) as endclt,SUM(user_interview) as userintw,SUM(joining) as joiner FROM new_report where emp_name <> '' Group By emp_name";
        $run_spe=$db->select($query_spe);
        while($row_spe=$run_spe->fetch_assoc())
        {
            ?>
        <tr>
        <td><div><?php echo $row_spe['emp_name']?></div></td>
        <td><div class="new-class btn"><?php echo $row_spe['rqt']?></div></td>
        <td><div class="new-class btn"><?php echo $row_spe['ser']?></div><div class="new-class1 btn"><?php if($row_spe['rqt']!=0) { echo number_format(($row_spe['ser']/$row_spe['rqt'])*100,2); }else{ echo 0; } ?> %</div></td>
        
        <td><div class="new-class btn"><?php echo $row_spe['subtbl']?></div><div class="new-class1 btn"><?php if($row_spe['rqt']!=0) { echo number_format(($row_spe['subtbl']/$row_spe['rqt'])*100,2); }else{ echo 0; } ?> %</div></td>
        <td><div class="new-class btn"><?php echo $row_spe['endclt']?></div><div class="new-class1 btn"><?php if($row_spe['subtbl']!=0) { echo number_format(($row_spe['endclt']/$row_spe['subtbl'])*100,2); }else{ echo 0; } ?> %</div></td>
        <td><div class="new-class btn"><?php echo $row_spe['userintw']?></div><div class="new-class1 btn"><?php if($row_spe['endclt']!=0) { echo number_format(($row_spe['userintw']/$row_spe['endclt'])*100,2); }else{ echo 0; } ?> %</div></td>
        <td><div class="new-class btn"><?php echo $row_spe['joiner']?></div><div class="new-class1 btn"><?php if($row_spe['userintw']!=0) { echo number_format(($row_spe['joiner']/$row_spe['userintw'])*100,2); }else{ echo 0; } ?> %</div></td>
        
      </tr>
        <?php    
        }
        ?>
    </tbody>
  </table>    
 
  </p>
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
                <script>
                 $(document).ready(function()
                 {
                $(document).delegate('[name="dropdownl"]',"change",function()
                {
                var data=$(this).val();   
                $.ajax({
                    url: "action-total-count.php",
                    method:"POST",
                    data:{x_data:data},
                    success:function(data)
                    {
                      $(".man_result").html(data)
                    }
                  }); 
               });
               
               
                $.ajax({
                    url: "action-total-count.php",
                    method:"POST",
                    data:{x_data:1},
                    success:function(data)
                    {
                      $(".man_result").html(data)
                    }
                  }); 
                  
                  
                      $(document).delegate('[name="dropdownl-cd"]',"change",function()
                {
                var data=$(this).val();   
                $.ajax({
                    url: "action_count-cd.php",
                    method:"POST",
                    data:{x_data:data},
                    success:function(data)
                    {
                      $(".man_result-cd").html(data)
                    }
                  }); 
               });
                  
               });
             </script>
      
  <script src="assets/table/script.js"></script>
<script>
$(document).ready(function()
{
    $("#btnExport").click(function()
    {
        $("#example").table2excel({
                filename: "Table.xls"
            });
        
    });

});

</script>   
   </body>


</html>

