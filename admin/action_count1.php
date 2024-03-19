<?php
@session_start();
$constant_url = $_SERVER['DOCUMENT_ROOT'] . "/functions/constants.php";
include_once($constant_url);

include(DATABASE_URL);
$db=new Database();


if(!empty($_POST['x_data']))
{
$m_data=$_POST['x_data'];
if($m_data==1)
{
 $m_data;
 $requested=0;
 $submitabled=0;
 $end_clientd=0;
 $user_interviewd=0;
 $joiningd=0;
 
 
 $taday_mx=date('Y-m-d');
 $query_select1mx="SELECT * FROM recruiter_report where emp_email='".$_POST['emp_emailing']."' AND emp_id='".$_POST['emp_iding']."'";
 $runmx=$db->select($query_select1mx);
 while($rowmx=$runmx->fetch_assoc())
 {
 $requested=$requested+$rowmx['request'];
 $submitabled=$submitabled+$rowmx['submitable'];
 $end_clientd=$end_clientd+$rowmx['end_client'];
 $user_interviewd=$user_interviewd+$rowmx['user_interview'];
 $joiningd=$joiningd+$rowmx['joining'];

 
 }
?>
<div class="col-md-2">
                   No of requirements
                   <p align="center"><?php echo $requested;?><p>
                    </div>
                    <div class="col-md-2">
                    No of submittal
                     <p align="center"><?php echo $submitabled;?><p>
                    </div>
                    <div class="col-md-2">
                    No Of Client
                     <p align="center"><?php echo $end_clientd;?><p>
                    </div>
                    <div class="col-md-2">
                    No Of Interviews
                     <p align="center"><?php echo $user_interviewd;?><p>
                    </div>
                    <div class="col-md-2">
                    No Of Joining
                     <p align="center"><?php echo $joiningd;?><p>
                    </div>
<?php

 

} 
else if($m_data==2)
{
 $m_data;
 $requested=0;
 $submitabled=0;
 $end_clientd=0;
 $user_interviewd=0;
 $joiningd=0;
 $taday_mx=date('Y-m-d');
 $query_select1mx="SELECT * FROM recruiter_report where emp_email='".$_POST['emp_emailing']."' AND emp_id='".$_POST['emp_iding']."' AND created_date LIKE '%".$taday_mx."%'";
 $runmx=$db->select($query_select1mx);
 while($rowmx=$runmx->fetch_assoc())
 {
 $requested=$requested+$rowmx['request'];
 $submitabled=$submitabled+$rowmx['submitable'];
 $end_clientd=$end_clientd+$rowmx['end_client'];
 $user_interviewd=$user_interviewd+$rowmx['user_interview'];
 $joiningd=$joiningd+$rowmx['joining'];
}
?>
<div class="col-md-2">
                   No of requirements
                   <p align="center"><?php echo $requested;?><p>
                    </div>
                    <div class="col-md-2">
                    No of submittal
                     <p align="center"><?php echo $submitabled;?><p>
                    </div>
                    <div class="col-md-2">
                    No Of Client
                     <p align="center"><?php echo $end_clientd;?><p>
                    </div>
                    <div class="col-md-2">
                    No Of Interviews
                     <p align="center"><?php echo $user_interviewd;?><p>
                    </div>
                    <div class="col-md-2">
                    No Of Joining
                     <p align="center"><?php echo $joiningd;?><p>
                    </div>
<?php
} 
else if($m_data==3)
{
 $m_data;
 $requested=0;
 $submitabled=0;
 $end_clientd=0;
 $user_interviewd=0;
 $joiningd=0;
 $taday_mx=date('Y-m-d');
 $query_select1mx="SELECT * FROM recruiter_report where emp_email='".$_POST['emp_emailing']."' AND emp_id='".$_POST['emp_iding']."' AND created_date between date_sub(now(),INTERVAL 7 DAY) and now()";
 $runmx=$db->select($query_select1mx);
 while($rowmx=$runmx->fetch_assoc())
 {
 $requested=$requested+$rowmx['request'];
 $submitabled=$submitabled+$rowmx['submitable'];
 $end_clientd=$end_clientd+$rowmx['end_client'];
 $user_interviewd=$user_interviewd+$rowmx['user_interview'];
 $joiningd=$joiningd+$rowmx['joining'];
 }
?>
<div class="col-md-2">
                   No of requirements
                   <p align="center"><?php echo $requested;?><p>
                    </div>
                    <div class="col-md-2">
                    No of submittal
                     <p align="center"><?php echo $submitabled;?><p>
                    </div>
                    <div class="col-md-2">
                    No Of Client
                     <p align="center"><?php echo $end_clientd;?><p>
                    </div>
                    <div class="col-md-2">
                    No Of Interviews
                     <p align="center"><?php echo $user_interviewd;?><p>
                    </div>
                    <div class="col-md-2">
                    No Of Joining
                     <p align="center"><?php echo $joiningd;?><p>
                    </div>
<?php

 

} 
else if($m_data==4)
{
 $m_data;
 $requested=0;
 $submitabled=0;
 $end_clientd=0;
 $user_interviewd=0;
 $joiningd=0;
 $query_select1mx="SELECT * FROM recruiter_report where emp_email='".$_POST['emp_emailing']."' AND emp_id='".$_POST['emp_iding']."' AND created_date between date_sub(now(),INTERVAL 30 DAY) and now()";
 $runmx=$db->select($query_select1mx);
 while($rowmx=$runmx->fetch_assoc())
 {
     extract($rowmx);
 $requested=$requested+$request;
 $submitabled=$submitabled+$submitable;
 $end_clientd=$end_clientd+$end_client;
 $user_interviewd=$user_interviewd+$user_interview;
 $joiningd=$joiningd+$joining;
 }
?>
<div class="col-md-2">
                   No of requirements
                   <p align="center"><?php echo $requested;?><p>
                    </div>
                    <div class="col-md-2">
                    No of submittal
                     <p align="center"><?php echo $submitabled;?><p>
                    </div>
                    <div class="col-md-2">
                    No Of Client
                     <p align="center"><?php echo $end_clientd;?><p>
                    </div>
                    <div class="col-md-2">
                    No Of Interviews
                     <p align="center"><?php echo $user_interviewd;?><p>
                    </div>
                    <div class="col-md-2">
                    No Of Joining
                     <p align="center"><?php echo $joiningd;?><p>
                    </div>
<?php
} 
}
?>