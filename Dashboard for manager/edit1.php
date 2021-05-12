<?php  
	$connect = mysqli_connect("localhost", "root", "", "system_manager");
	$house_id = $_POST["house_id"];  
	$text = $_POST["text"];  
	$column_name = $_POST["column_name"];  
	$sql = "UPDATE house_list SET ".$column_name."='".$text."' WHERE house_id='".$house_id."'";  
	if(mysqli_query($connect, $sql))  
	{  
		echo 'Data Edit Successfully';  
	}  
 ?>