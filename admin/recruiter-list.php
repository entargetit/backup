<?php
session_start();
if(!isset($_SESSION['admin_next']))
{
	header('location: index.php');
	
}
?>
<!DOCTYPE html>
<html lang="en">
<script>
function verify1(){
    msg = "Are you sure that you want to Update?";
    //all we have to do is return the return value of the confirm() method
    return confirm(msg);
    }
</script> 	  
	  
<script>
function verify2(){
    msg = "Are you sure that you want to DELETE?";
    //all we have to do is return the return value of the confirm() method
    return confirm(msg);
    }
</script>  
   

<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Entargetit CRM Admin Panel</title>
      <!-- Favicon and touch icons -->
      <link rel="shortcut icon" href="assets/dist/img/ico/favicon.png" type="image/x-icon">
     
      <link href="assets/plugins/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
      <!-- Bootstrap -->
      <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
      <!-- Bootstrap rtl -->
    
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
      <!-- dataTables css -->
      <link href="assets/plugins/datatables/dataTables.min.css" rel="stylesheet" type="text/css"/>
     
      <link href="assets/dist/css/stylecrm.css" rel="stylesheet" type="text/css"/>
     <script type="text/javascript">
function ExportToExcel(mytblId){
       var htmltable= document.getElementById('my-table-id');
       var html = htmltable.outerHTML;
       window.open('data:application/vnd.ms-excel,' + encodeURIComponent(html));
       
    }
</script>
   </head>
    <body class="hold-transition sidebar-mini">
      <!--preloader-->
      <div id="preloader">
         <div id="status"></div>
      </div>
      <!-- Site wrapper -->
      <div class="wrapper">
        <?php include("includes/header.php");?>
        
         <!-- Left side column. contains the sidebar -->
         <?php include("includes/sidebar.php");?>
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-users"></i>
               </div>
               <div class="header-title">
                  <h1>Recruiter</h1>
                  <small>List</small>
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonexport">
                              <a href="#">
                                 <h4> Recruiter List</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="btn-group">
                              <div class="buttonexport" id="buttonlist"> 
                                 <a class="btn btn-add" href="create-recruiter.php"> <i class="fa fa-plus"></i> Create Recruiter
                                 </a>  
                              </div>
                              <a class="btn btn-exp btn-sm "  onclick=" return ExportToExcel('mytblId');"  ><i class="fa fa-bars"></i> Export Table Data</a>
                              <ul class="dropdown-menu exp-drop" role="menu">
                                 <li>
                                    <a href="#" onclick="$('#dataTableExample1').tableExport({type:'json',escape:'false'});"> 
                                    <img src="assets/dist/img/json.png" width="24" alt="logo"> JSON</a>
                                 </li>
                                 <li>
                                    <a href="#" onclick="$('#dataTableExample1').tableExport({type:'json',escape:'false',ignoreColumn:'[2,3]'});">
                                    <img src="assets/dist/img/json.png" width="24" alt="logo"> JSON (ignoreColumn)</a>
                                 </li>
                                 <li><a href="#" onclick="$('#dataTableExample1').tableExport({type:'json',escape:'true'});">
                                    <img src="assets/dist/img/json.png" width="24" alt="logo"> JSON (with Escape)</a>
                                 </li>
                                 <li class="divider"></li>
                                 <li><a href="#" onclick="$('#dataTableExample1').tableExport({type:'xml',escape:'false'});">
                                    <img src="assets/dist/img/xml.png" width="24" alt="logo"> XML</a>
                                 </li>
                                 <li><a href="#" onclick="$('#dataTableExample1').tableExport({type:'sql'});"> 
                                    <img src="assets/dist/img/sql.png" width="24" alt="logo"> SQL</a>
                                 </li>
                                 <li class="divider"></li>
                                 <li>
                                    <a href="#" onclick="$('#dataTableExample1').tableExport({type:'csv',escape:'false'});"> 
                                    <img src="assets/dist/img/csv.png" width="24" alt="logo"> CSV</a>
                                 </li>
                                 <li>
                                    <a href="#" onclick="$('#dataTableExample1').tableExport({type:'txt',escape:'false'});"> 
                                    <img src="assets/dist/img/txt.png" width="24" alt="logo"> TXT</a>
                                 </li>
                                 <li class="divider"></li>
                                 <li>
                                    <a href="#" onclick="$('#dataTableExample1').tableExport({type:'excel',escape:'false'});"> 
                                    <img src="assets/dist/img/xls.png" width="24" alt="logo"> XLS</a>
                                 </li>
                                 <li>
                                    <a href="#" onclick="$('#dataTableExample1').tableExport({type:'doc',escape:'false'});">
                                    <img src="assets/dist/img/word.png" width="24" alt="logo"> Word</a>
                                 </li>
                                 <li>
                                    <a href="#" onclick="$('#dataTableExample1').tableExport({type:'powerpoint',escape:'false'});"> 
                                    <img src="assets/dist/img/ppt.png" width="24" alt="logo"> PowerPoint</a>
                                 </li>
                                 <li class="divider"></li>
                                 <li>
                                    <a href="#" onclick="$('#dataTableExample1').tableExport({type:'png',escape:'false'});"> 
                                    <img src="assets/dist/img/png.png" width="24" alt="logo"> PNG</a>
                                 </li>
                                 <li>
                                    <a href="#" onclick="$('#dataTableExample1').tableExport({type:'pdf',pdfFontSize:'7',escape:'false'});"> 
                                    <img src="assets/dist/img/pdf.png" width="24" alt="logo"> PDF</a>
                                 </li>
                              </ul>
                           </div>
                           <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
						   <?php
$constant_url = $_SERVER['DOCUMENT_ROOT'] . "/functions/constants.php";
include_once($constant_url);

include(DATABASE_URL);
$db=new Database();

?>
                           <div class="table-responsive">
                              <table id="my-table-id" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>Sr.No</th>
                                       <th>Active Recruiter</th>
                                       <th>Email</th>
                                       <th>Mobile</th>
                                       <th>Position</th>
                                       <th>Emp ID</th>
                                       <th>Password</th>
									  <th>View New Report</th>
									   <th>View Employers</th>
									   <th>View Consultants</th>
									   
									   <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
								 <?php
									$query_select="Select * From recruiters order by id DESC";
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
										
									
									?>
                                    <tr>
									
                                       <td><?php echo $i++;?></td>
                                       <td><?php echo $name;?></td>
                                       <td><?php echo $email;?></td>
                                       <td><?php echo $number;?></td>
                                       <td><?php echo $address;?></td>
                                       <td><?php echo $empid;?></td>
                                       <td><?php echo $password;?></td>
									     <td><a href="manage-new-report.php?emp_email=<?php echo $email;?>&emp_id=<?php echo $empid;?>" class="label-custom label label-default">
                                          <?php
                                          $query_x="SELECT * FROM `recruiter_report` Where emp_email='$email' AND emp_id='$empid'";
                                          $run_x=$db->select($query_x);
                                          echo $count_x=$run_x->num_rows;
                                          
                                          
                                          ?>
                                          
                                          
                                          
                                          
                                      </a></td>
                                          <td><a href="manage-employer.php?emp_email=<?php echo $email;?>&emp_id=<?php echo $empid;?>" class="label-custom label label-default">
                                          <?php
                                          $query_y="SELECT * FROM `employers` Where emp_email='$email' AND emp_id='$empid'";
                                          $run_y=$db->select($query_y);
                                          echo $count_y=$run_y->num_rows;
                                          
                                          
                                          ?>
                                          
                                          
                                          
                                          
                                      </a></td>
                                      
                                          <td><a href="manage-consultant.php?emp_email=<?php echo $email;?>&emp_id=<?php echo $empid;?>" class="label-custom label label-default">
                                          <?php
                                          $query_z="SELECT * FROM `consultant` Where emp_email='$email' AND emp_id='$empid'";
                                          $run_z=$db->select($query_z);
                                          echo $count_z=$run_z->num_rows;
                                          
                                          
                                          ?>
                                          
                                          
                                          
                                          
                                      </a></td>
                                       <td>
                                        <a class="btn btn-add btn-sm" data-toggle="modal" href="user_list_edit.php?edit=<?php echo $id;?>" onclick="return verify1()" ><i class="fa fa-pencil"></i></a>
                                        <a type="button" class="btn btn-danger btn-sm" data-toggle="modal" href="user_list_delete.php?del=<?php echo $id;?>"  onclick="return verify2()" ><i class="fa fa-trash-o"></i> </a>
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
               <!-- customer Modal1 -->
               <div class="modal fade" id="customer1" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                           <h3><i class="fa fa-user m-r-5"></i> Update User</h3>
                        </div>
                        <div class="modal-body">
                           <div class="row">
                              <div class="col-md-12">
							  
							  
                                 <form class="form-horizontal" action="" method="POST">
                                    <fieldset>
                                       <!-- Text input-->
                                       <div class="col-md-4 form-group">
                                          <label class="control-label">User Name:</label>
                                          <input type="text" value="<?php echo $name;?>" placeholder="Customer Name" class="form-control">
                                       </div>
                                       <!-- Text input-->
                                       <div class="col-md-4 form-group">
                                          <label class="control-label">Email:</label>
                                          <input type="email" value="<?php echo $name;?>" placeholder="Email" class="form-control">
                                       </div>
                                       <!-- Text input-->
                                       <div class="col-md-4 form-group">
                                          <label class="control-label">Mobile</label>
                                          <input type="number" value="<?php echo $name;?>"placeholder="Mobile" class="form-control">
                                       </div>
                                       <div class="col-md-6 form-group">
                                          <label class="control-label">Address</label><br>
                                          <textarea name="address" value="<?php echo $name;?>"rows="3"></textarea>
                                       </div>
									   <div class="col-md-4 form-group">
                                          <label class="control-label">Emp ID</label>
                                          <input type="text" value="<?php echo $name;?>"placeholder="password" class="form-control">
                                       </div>
									    <div class="col-md-4 form-group">
                                          <label class="control-label">Password</label>
                                          <input type="text" value="<?php echo $name;?>"placeholder="password" class="form-control">
                                       </div>
                                      
                                       <div class="col-md-12 form-group user-form-group">
                                          <div class="pull-right">
                                             <button type="button" class="btn btn-danger btn-sm">Cancel</button>
                                             <button type="submit" class="btn btn-add btn-sm">Save</button>
                                          </div>
                                       </div>
                                    </fieldset>
                                 </form>
                              </div>
                           </div>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                        </div>
                     </div>
                     <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
               </div>
               <!-- /.modal -->
               <!-- Modal -->    
               <!-- Customer Modal2 -->
               <div class="modal fade" id="customer2" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                           <h3><i class="fa fa-user m-r-5"></i> Delete User</h3>
                        </div>
                        <div class="modal-body">
                           <div class="row">
                              <div class="col-md-12">
                                 <form class="form-horizontal">
                                    <fieldset>
                                       <div class="col-md-12 form-group user-form-group">
                                          <label class="control-label">Delete User</label>
                                          <div class="pull-right">
                                             <button type="button" class="btn btn-danger btn-sm">NO</button>
                                             <button type="submit" class="btn btn-add btn-sm">YES</button>
                                          </div>
                                       </div>
                                    </fieldset>
                                 </form>
                              </div>
                           </div>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                        </div>
                     </div>
                     <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
               </div>
               <!-- /.modal -->
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
      <script src="../cdn-cgi/scripts/0e574bed/cloudflare-static/email-decode.min.js"></script><script src="assets/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>
      <!-- jquery-ui --> 
      <script src="assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js" type="text/javascript"></script>
      <!-- Bootstrap -->
      <script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
      <!-- lobipanel -->
      <script src="assets/plugins/lobipanel/lobipanel.min.js" type="text/javascript"></script>
      <!-- Pace js -->
      <script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
      <!-- table-export js -->
      <script src="assets/plugins/table-export/tableExport.js" type="text/javascript"></script>
      <script src="assets/plugins/table-export/jquery.base64.js" type="text/javascript"></script>
      <script src="assets/plugins/table-export/html2canvas.js" type="text/javascript"></script>
      <script src="assets/plugins/table-export/sprintf.js" type="text/javascript"></script>
      <script src="assets/plugins/table-export/jspdf.js" type="text/javascript"></script>
      <script src="assets/plugins/table-export/base64.js" type="text/javascript"></script>
      <!-- dataTables js -->
      <script src="assets/plugins/datatables/dataTables.min.js" type="text/javascript"></script>
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
      
   </body>


</html>

