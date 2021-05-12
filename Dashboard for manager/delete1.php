<?php  
	$connect = mysqli_connect("localhost", "root", "", "system_manager");
	$sql = "DELETE FROM house_list WHERE house_id = '".$_POST["house_id"]."'";  
	if(mysqli_query($connect, $sql))  
	{  
		echo 'Data Deleted';  
	}  
 ?>