<?php  
	$connect = mysqli_connect("localhost", "root", "", "assignment2");
	$id = $_POST["id"];  
	$text = $_POST["text"];  
	$column_name = $_POST["column_name"];  
	$sql = "UPDATE bookings SET ".$column_name."='".$text."' WHERE id='".$id."'";  
	if(mysqli_query($connect, $sql))  
	{  
		echo 'Booking Edit Successfully';  
	}  
 ?>