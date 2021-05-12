<?php  
	$connect = mysqli_connect("localhost", "root", "", "system_manager");
	$sql = "DELETE FROM review_list WHERE review_id = '".$_POST["review_id"]."'";  
	if(mysqli_query($connect, $sql))  
	{  
		echo 'Review Deleted';  
	}  
 ?>