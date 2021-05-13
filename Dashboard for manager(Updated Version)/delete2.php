<?php  
	$connect = mysqli_connect("localhost", "root", "", "assignment2");
	$sql = "DELETE FROM bookings WHERE id = '".$_POST["id"]."'";  
	if(mysqli_query($connect, $sql))  
	{  
		echo 'Booking Canceled';  
	}  
 ?>