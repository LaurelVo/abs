<?php  
	//include the file session.php
	include("./../utils/session.php");
	//include the file db_conn.php
	include("./../utils/db_conn.php");
	$id = $_POST["id"];  
	$text = $_POST["text"];  
	$column_name = $_POST["column_name"];  
	$sql = "UPDATE accommodations SET ".$column_name."='".$text."' WHERE id='".$id."'";  
	if(mysqli_query($connect, $sql))  
	{  
		echo 'Data Edit Successfully';  
	}  
 ?>