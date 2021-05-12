<?php  
$connect = mysqli_connect("localhost", "root", "", "system_manager");
$sql = "INSERT INTO booking_list(stay_period, payment, contact) VALUES('".$_POST["stay_period"]."', '".$_POST["payment"]."', '".$_POST["contact"]."')";  
if(mysqli_query($connect, $sql))  
{  
     echo 'Data Inserted';  
}  
 ?>