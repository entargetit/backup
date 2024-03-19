<?php
$constant_url = $_SERVER['DOCUMENT_ROOT'] . "/functions/constants.php";
include_once($constant_url);

include(DATABASE_URL);
$db=new Database();

?>

<?php
						
						   if(isset($_POST['submit']))
						   {
							   $id=$_GET['vara'];
							$name=$_POST['name'];
							$email=$_POST['email'];
							   
							$number=$_POST['number'];
							   
							$address=$_POST['address'];
							   
							$empid=$_POST['empid'];
							$password=$_POST['password'];
							$passs=$password;
							
							
							$query1="Update recruiters set name='$name',email='$email',number='$number',address='$address',empid='$empid',password='$passs' where id='$id'";
							 $run=$db->update($query1);
							 if($run)
							 {
								echo "<script>alert('Data has been Updated')</script>";
								echo "<script>open('recruiter-list.php','_self')</script>";
							 }
							 else
							 {
							echo "<script>alert('Data has Not been Updated');</script>";
							echo "<script>open('recruiter-list.php','_self')</script>";
							 }
							   
							   
							 
							   
							   
							   
						   }
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						  
						   ?>