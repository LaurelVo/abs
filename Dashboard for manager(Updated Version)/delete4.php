<?php  
	$connect = mysqli_connect("localhost", "root", "", "assignment2");
	$sql = "DELETE FROM reviews WHERE id = '".$_POST["id"]."'";  
	if(mysqli_query($connect, $sql))  
	{  
		echo 'Review Deleted';  
	}  
 ?>