<?php  
	$connect = mysqli_connect("localhost", "root", "", "assignment2");
	$sql = "DELETE FROM users WHERE id = '".$_POST["id"]."'";  
	if(mysqli_query($connect, $sql))  
	{  
		echo 'User Deleted';  
	}  
 ?>