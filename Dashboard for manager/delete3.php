<?php  
	$connect = mysqli_connect("localhost", "root", "", "system_manager");
	$sql = "DELETE FROM user_list WHERE user_id = '".$_POST["user_id"]."'";  
	if(mysqli_query($connect, $sql))  
	{  
		echo 'User Deleted';  
	}  
 ?>