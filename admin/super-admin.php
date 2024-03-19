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
      <!-- Start page Label Plugins 
         =====================================================================-->
      <!-- Emojionearea -->
      <link href="assets/plugins/emojionearea/emojionearea.min.css" rel="stylesheet" type="text/css"/>
      <!-- Monthly css -->
      <link href="assets/plugins/monthly/monthly.css" rel="stylesheet" type="text/css"/>
      <!-- End page Label Plugins 
         =====================================================================-->
      <!-- Start Theme Layout Style
         =====================================================================-->
      <!-- Theme style -->
      <link href="assets/dist/css/stylecrm.css" rel="stylesheet" type="text/css"/>
      <!-- Theme style rtl -->
     
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
                  <i class="fa fa-dashboard"></i>
               </div>
               <div class="header-title">
                  <h1>Super Admin Dashboard</h1>
                  <small></small>
               </div>
            </section>
           
           
           <?php 
						$kkmd=0;
						$taday_md=date('Y-m-d');
						$query_select1md="SELECT * FROM recruiter_report INNER JOIN recruiters ON recruiter_report.emp_email=recruiters.email where recruiter_report.created_date LIKE '%".$taday_md."%'";
						$runmd=$db->select($query_select1md);
						while($rowmd=$runmd->fetch_assoc())
						{
						$kkmd++;	
						}
						?>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <div id="cardbox4">
                        <div class="statistic-box">
                           <i class="fa fa-files-o fa-3x"></i>
                           <div class="counter-number pull-right">
                              <span class="count-number"><?php echo $kkmd;?></span> 
                              <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                              </span>
                           </div>
                           <h4> <a href="#" style="color:white;">Today New Report</a></h4>
                        </div>
                     </div>
                  </div>  
                  
                  
                		  <?php 
						$kkmmd=0;
						$query_select1mmd="SELECT * FROM recruiter_report INNER JOIN recruiters ON recruiter_report.emp_email=recruiters.email where recruiter_report.created_date between date_sub(now(),INTERVAL 1 WEEK) and now()";
						$runmmd=$db->select($query_select1mmd);
						while($rowmmd=$runmmd->fetch_assoc())
						{
						$kkmmd++;	
						}
						?>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <div id="cardbox4">
                        <div class="statistic-box">
                           <i class="fa fa-files-o fa-3x"></i>
                           <div class="counter-number pull-right">
                              <span class="count-number"><?php echo $kkmmd;?></span> 
                              <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                              </span>
                           </div>
                           <h4> <a href="#" style="color:white;">Last 7 Days New Report</a></h4>
                        </div>
                     </div>
                  </div>  
                  
                  
                  
                  
                		  <?php 
						$kkmmmd=0;
						$query_select1mmmd="SELECT * FROM recruiter_report INNER JOIN recruiters ON recruiter_report.emp_email=recruiters.email where recruiter_report.created_date between date_sub(now(),INTERVAL 30 DAY) and now()";
						$runmmmd=$db->select($query_select1mmmd);
						while($rowmmm=$runmmmd->fetch_assoc())
						{
						$kkmmmd++;	
						}
						?>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <div id="cardbox4">
                        <div class="statistic-box">
                           <i class="fa fa-files-o fa-3x"></i>
                           <div class="counter-number pull-right">
                              <span class="count-number"><?php echo $kkmmmd;?></span> 
                              <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                              </span>
                           </div>
                           <h4> <a href="#" style="color:white;">Last 30 Days New Report</a></h4>
                        </div>
                     </div>
                  </div>  
                  
                  
                    <?php 
						$kkmmmmd=0;
						$query_select1mmmmd="SELECT * FROM recruiter_report INNER JOIN recruiters ON recruiter_report.emp_email=recruiters.email";
						$runmmmmd=$db->select($query_select1mmmmd);
						while($rowmmmmd=$runmmmmd->fetch_assoc())
						{
						$kkmmmmd++;	
						}
						?>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <div id="cardbox4">
                        <div class="statistic-box">
                           <i class="fa fa-files-o fa-3x"></i>
                           <div class="counter-number pull-right">
                              <span class="count-number"><?php echo $kkmmmmd;?></span> 
                              <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                              </span>
                           </div>
                           <h4> <a href="#" style="color:white;">Total New Report</a></h4>
                        </div>
                     </div>
                  </div> 
                  
                  
                  
                  
                  
           
           
                  
                  
                  <?php 
						$kkm=0;
						$taday_m=date('Y-m-d');
						$query_select1m="SELECT * FROM employers INNER JOIN recruiters ON employers.emp_email=recruiters.email where employers.created_date LIKE '%".$taday_m."%'";
						$runm=$db->select($query_select1m);
						while($rowm=$runm->fetch_assoc())
						{
						$kkm++;	
						}
						?>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <div id="cardbox3">
                        <div class="statistic-box">
                           <i class="fa fa-files-o fa-3x"></i>
                           <div class="counter-number pull-right">
                              <span class="count-number"><?php echo $kkm;?></span> 
                              <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                              </span>
                           </div>
                           <h4> <a href="#" style="color:white;">Today Employers</a></h4>
                        </div>
                     </div>
                  </div>  
                  
                  
                		  <?php 
						$kkmm=0;
						$query_select1mm="SELECT * FROM employers INNER JOIN recruiters ON employers.emp_email=recruiters.email where employers.created_date between date_sub(now(),INTERVAL 1 WEEK) and now()";
						$runmm=$db->select($query_select1mm);
						while($rowmm=$runmm->fetch_assoc())
						{
						$kkmm++;	
						}
						?>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <div id="cardbox3">
                        <div class="statistic-box">
                           <i class="fa fa-files-o fa-3x"></i>
                           <div class="counter-number pull-right">
                              <span class="count-number"><?php echo $kkmm;?></span> 
                              <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                              </span>
                           </div>
                           <h4> <a href="#" style="color:white;">Last 7 Days Employ</a></h4>
                        </div>
                     </div>
                  </div>  
                  
                  
                  
                  
                		  <?php 
						$kkmmm=0;
						$query_select1mmm="SELECT * FROM employers  INNER JOIN recruiters ON employers.emp_email=recruiters.email where employers.created_date between date_sub(now(),INTERVAL 30 DAY) and now()";
						$runmmm=$db->select($query_select1mmm);
						while($rowmmm=$runmmm->fetch_assoc())
						{
						$kkmmm++;	
						}
						?>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <div id="cardbox3">
                        <div class="statistic-box">
                           <i class="fa fa-files-o fa-3x"></i>
                           <div class="counter-number pull-right">
                              <span class="count-number"><?php echo $kkmmm;?></span> 
                              <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                              </span>
                           </div>
                           <h4> <a href="#" style="color:white;">Last 30 Days Employers</a></h4>
                        </div>
                     </div>
                  </div>  
                  
                  
                    <?php 
						$kkmmmm=0;
						$query_select1mmmm="SELECT * FROM employers  INNER JOIN recruiters ON employers.emp_email=recruiters.email";
						$runmmmm=$db->select($query_select1mmmm);
						while($rowmmmm=$runmmmm->fetch_assoc())
						{
						$kkmmmm++;	
						}
						?>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <div id="cardbox3">
                        <div class="statistic-box">
                           <i class="fa fa-files-o fa-3x"></i>
                           <div class="counter-number pull-right">
                              <span class="count-number"><?php echo $kkmmmm;?></span> 
                              <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                              </span>
                           </div>
                           <h4> <a href="#" style="color:white;">Total Employers</a></h4>
                        </div>
                     </div>
                  </div> 
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                	  <?php 
						$kkm1=0;
						$taday_m1=date('Y-m-d');
						$query_select1m1="SELECT * FROM consultant  INNER JOIN recruiters ON consultant.emp_email=recruiters.email where consultant.created_date LIKE '%".$taday_m1."%'";
						$runm1=$db->select($query_select1m1);
						while($rowm1=$runm1->fetch_assoc())
						{
						$kkm1++;	
						}
						?>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <div id="cardbox2">
                        <div class="statistic-box">
                           <i class="fa fa-files-o fa-3x"></i>
                           <div class="counter-number pull-right">
                              <span class="count-number"><?php echo $kkm1;?></span> 
                              <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                              </span>
                           </div>
                           <h4> <a href="#" style="color:white;">Today Consultants</a></h4>
                        </div>
                     </div>
                  </div>  
                  
                  
                		  <?php 
						$kkmm2=0;
						$query_select1mm2="SELECT * FROM consultant  INNER JOIN recruiters ON consultant.emp_email=recruiters.email where consultant.created_date between date_sub(now(),INTERVAL 1 WEEK) and now()";
						$runmm2=$db->select($query_select1mm2);
						while($rowmm2=$runmm2->fetch_assoc())
						{
						$kkmm2++;	
						}
						?>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <div id="cardbox2">
                        <div class="statistic-box">
                           <i class="fa fa-files-o fa-3x"></i>
                           <div class="counter-number pull-right">
                              <span class="count-number"><?php echo $kkmm2;?></span> 
                              <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                              </span>
                           </div>
                           <h4> <a href="#" style="color:white;">Last 7 Days Consultants</a></h4>
                        </div>
                     </div>
                  </div>  
                  
                  
                  
                  
                		  <?php 
						$kkmmm3=0;
						$query_select1mmm3="SELECT * FROM consultant  INNER JOIN recruiters ON consultant.emp_email=recruiters.email where consultant.created_date between date_sub(now(),INTERVAL 30 DAY) and now()";
						$runmmm3=$db->select($query_select1mmm3);
						while($rowmmm3=$runmmm3->fetch_assoc())
						{
						$kkmmm3++;	
						}
						?>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <div id="cardbox2">
                        <div class="statistic-box">
                           <i class="fa fa-files-o fa-3x"></i>
                           <div class="counter-number pull-right">
                              <span class="count-number"><?php echo $kkmmm3;?></span> 
                              <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                              </span>
                           </div>
                           <h4> <a href="#" style="color:white;">Last 30 Days Consultants</a></h4>
                        </div>
                     </div>
                  </div>  
                  
                  
                    <?php 
						$kkmmmm4=0;
						$query_select1mmmm4="SELECT * FROM consultant  INNER JOIN recruiters ON consultant.emp_email=recruiters.email";
						$runmmmm4=$db->select($query_select1mmmm4);
						while($rowmmmm4=$runmmmm4->fetch_assoc())
						{
						$kkmmmm4++;	
						}
						?>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <div id="cardbox2">
                        <div class="statistic-box">
                           <i class="fa fa-files-o fa-3x"></i>
                           <div class="counter-number pull-right">
                              <span class="count-number"><?php echo $kkmmmm4;?></span> 
                              <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                              </span>
                           </div>
                           <h4> <a href="#" style="color:white;">Total Consultants</a></h4>
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
      <!-- /.wrapper -->
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
      <script src="assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript">    </script>
      <!-- FastClick -->
      <script src="assets/plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
      <!-- CRMadmin frame -->
      <script src="assets/dist/js/custom.js" type="text/javascript"></script>
      <!-- End Core Plugins
         =====================================================================-->
      <!-- Start Page Lavel Plugins
         =====================================================================-->
      <!-- ChartJs JavaScript -->
      <script src="assets/plugins/chartJs/Chart.min.js" type="text/javascript"></script>
      <!-- Counter js -->
      <script src="assets/plugins/counterup/waypoints.js" type="text/javascript"></script>
      <script src="assets/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
      <!-- Monthly js -->
      <script src="assets/plugins/monthly/monthly.js" type="text/javascript"></script>
      <!-- End Page Lavel Plugins
         =====================================================================-->
      <!-- Start Theme label Script
         =====================================================================-->
      <!-- Dashboard js -->
      <script src="assets/dist/js/dashboard.js" type="text/javascript"></script>
      <!-- End Theme label Script
         =====================================================================-->
      <script>
         function dash() {
         // single bar chart
         var ctx = document.getElementById("singelBarChart");
         var myChart = new Chart(ctx, {
         type: 'bar',
         data: {
         labels: ["Sun", "Mon", "Tu", "Wed", "Th", "Fri", "Sat"],
         datasets: [
         {
         label: "My First dataset",
         data: [40, 55, 75, 81, 56, 55, 40],
         borderColor: "rgba(0, 150, 136, 0.8)",
         width: "1",
         borderWidth: "0",
         backgroundColor: "rgba(0, 150, 136, 0.8)"
         }
         ]
         },
         options: {
         scales: {
         yAxes: [{
             ticks: {
                 beginAtZero: true
             }
         }]
         }
         }
         });
               //monthly calender
               $('#m_calendar').monthly({
                 mode: 'event',
                 //jsonUrl: 'events.json',
                 //dataType: 'json'
                 xmlUrl: 'events.xml'
             });
         
         //bar chart
         var ctx = document.getElementById("barChart");
         var myChart = new Chart(ctx, {
         type: 'bar',
         data: {
         labels: ["January", "February", "March", "April", "May", "June", "July", "august", "september","october", "Nobemver", "December"],
         datasets: [
         {
         label: "My First dataset",
         data: [65, 59, 80, 81, 56, 55, 40, 65, 59, 80, 81, 56],
         borderColor: "rgba(0, 150, 136, 0.8)",
         width: "1",
         borderWidth: "0",
         backgroundColor: "rgba(0, 150, 136, 0.8)"
         },
         {
         label: "My Second dataset",
         data: [28, 48, 40, 19, 86, 27, 90, 28, 48, 40, 19, 86],
         borderColor: "rgba(51, 51, 51, 0.55)",
         width: "1",
         borderWidth: "0",
         backgroundColor: "rgba(51, 51, 51, 0.55)"
         }
         ]
         },
         options: {
         scales: {
         yAxes: [{
             ticks: {
                 beginAtZero: true
             }
         }]
         }
         }
         });
             //counter
             $('.count-number').counterUp({
                 delay: 10,
                 time: 5000
             });
         }
         dash();         
      </script>
   </body>


</html>
 
