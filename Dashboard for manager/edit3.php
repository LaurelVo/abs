<?php  
	$connect = mysqli_connect("localhost", "root", "", "system_manager");
	$user_id = $_POST["user_id"];  
	$text = $_POST["text"];  
	$column_name = $_POST["column_name"];  
	$sql = "UPDATE user_list SET ".$column_name."='".$text."' WHERE user_id='".$user_id."'";  
	if(mysqli_query($connect, $sql))  
	{  
		echo 'User Edit Successfully';  
	}  
 ?>