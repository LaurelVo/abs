<?php  
	$connect = mysqli_connect("localhost", "root", "", "system_manager");
	$booking_id = $_POST["booking_id"];  
	$text = $_POST["text"];  
	$column_name = $_POST["column_name"];  
	$sql = "UPDATE booking_list SET ".$column_name."='".$text."' WHERE booking_id='".$booking_id."'";  
	if(mysqli_query($connect, $sql))  
	{  
		echo 'Booking Edit Successfully';  
	}  
 ?>