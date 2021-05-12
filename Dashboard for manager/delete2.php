<?php  
	$connect = mysqli_connect("localhost", "root", "", "system_manager");
	$sql = "DELETE FROM booking_list WHERE booking_id = '".$_POST["booking_id"]."'";  
	if(mysqli_query($connect, $sql))  
	{  
		echo 'Booking Canceled';  
	}  
 ?>