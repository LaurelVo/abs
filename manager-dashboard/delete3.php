<?php  
	//include the file session.php
	include("./../utils/session.php");
	//include the file db_conn.php
	include("./../utils/db_conn.php");
	
	$sql = "DELETE FROM users WHERE id = '".$_POST["id"]."'";  
	if(mysqli_query($connect, $sql))  
	{  
		echo 'User Deleted';  
	}  
 ?>