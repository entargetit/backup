<?php
$constant_url = $_SERVER['DOCUMENT_ROOT'] . "/functions/constants.php";
include_once($constant_url);

include(DATABASE_URL);
$db=new Database();

?>
<?php
$del=$_GET['del'];
$query="Delete from recruiters where id='$del'";
$run=$db->deleted($query);
if($run)
							 {
								echo "<script>alert('Data has been Deleted')</script>";
								echo "<script>open('recruiter-list.php','_self')</script>";
							 }
							 else
							 {
							echo "<script>alert('Data has Not been Deleted');</script>";
							echo "<script>open('recruiter-list.php','_self')</script>";
							 }


?>