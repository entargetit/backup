<?php
$constant_url = $_SERVER['DOCUMENT_ROOT'] . "/functions/constants.php";
include_once($constant_url);

include(DATABASE_URL);
$db=new Database();


if(!empty($_GET['new_report']))
{
    $query_del="DELETE FROM new_report Where id='".$_GET['new_report']."'";
    $run_dal=$db->deleted($query_del);
    if($run_dal)
    {
    echo "<script>alert('Record Has Been Deleted..');open('add-new-report.php','_self')</script>";    
    }
    else
    {
       echo "<script>alert('Something went wrong, please try again...');open('add-new-report.php','_self')</script>";  
    }
}

if(!empty($_GET['recruiter_report']))
{
    $query_del="DELETE FROM recruiter_report Where id='".$_GET['recruiter_report']."'";
    $run_dal=$db->deleted($query_del);
    if($run_dal)
    {
    echo "<script>alert('Record Has Been Deleted..');open('total-new-report.php','_self')</script>";    
    }
    else
    {
       echo "<script>alert('Something went wrong, please try again...');open('total-new-report.php','_self')</script>";  
    }
}
if(!empty($_GET['consultant']))
{
    $query_del="DELETE FROM consultant Where id='".$_GET['consultant']."'";
    $run_dal=$db->deleted($query_del);
    if($run_dal)
    {
    echo "<script>alert('Record Has Been Deleted..');open('add-new-report.php','_self')</script>";    
    }
    else
    {
       echo "<script>alert('Something went wrong, please try again...');open('add-new-report.php','_self')</script>";  
    }
}


if(!empty($_GET['employers']))
{
    $query_del="DELETE FROM employers Where id='".$_GET['employers']."'";
    $run_dal=$db->deleted($query_del);
    if($run_dal)
    {
    echo "<script>alert('Record Has Been Deleted..');open('add-new-report.php','_self')</script>";    
    }
    else
    {
       echo "<script>alert('Something went wrong, please try again...');open('add-new-report.php','_self')</script>";  
    }
}



if(!empty($_GET['skill']))
{
    $query_del="DELETE FROM skill Where id='".$_GET['skill']."'";
    $run_dal=$db->deleted($query_del);
    if($run_dal)
    {
    echo "<script>alert('Record Has Been Deleted..');open('add-skills.php','_self')</script>";    
    }
    else
    {
       echo "<script>alert('Something went wrong, please try again...');open('add-skills.php','_self')</script>";  
    }
}

?>