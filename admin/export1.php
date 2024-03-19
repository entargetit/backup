<?php  
session_start();
if(!empty($_FILES["excel_file"]))  
{  
$connect = mysqli_connect("localhost", "entarget_enter", "Admin@#123", "entarget_enter");  
$file_array = explode(".", $_FILES["excel_file"]["name"]); 
if($file_array[1] == "xlsx")  
{  
include("PHPExcel-1.8/Classes/PHPExcel/IOFactory.php");  
$object = PHPExcel_IOFactory::load($_FILES["excel_file"]["tmp_name"]);  
foreach($object->getWorksheetIterator() as $worksheet)  
{  
$highestRow = $worksheet->getHighestRow();  
for($row=2; $row<=$highestRow; $row++)  
{  
 $name = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(0, $row)->getValue());  
 $email = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue());  
 $phone = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue());  
 $position = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(3, $row)->getValue());  
 $category = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(4, $row)->getValue());  
 $remark= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(5, $row)->getValue()); 
 $calling_date = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(6, $row)->getValue()); 
 $state = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(7, $row)->getValue()); 
 $company = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(8, $row)->getValue()); 
 $query = "Insert Into lead(name,email,phone,address,cat,empid,empName,empEmail,remark,calling_date,com_name,state) values ('$name','$email','$phone','$position','White','".$_SESSION['empid']."','".$_SESSION['empname']."','".$_SESSION['usssre']."','$remark','".date($format = 'Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($calling_date))."','".$_POST['com_name']."','$state')";  
 mysqli_query($connect, $query);  
}
}  
echo '<label class="text-success">Excel Has Been Imported Successfully</label>'; 
}  
else  
{  
echo '<label class="text-danger">Invalid File</label>';  
}  
}  
 ?>