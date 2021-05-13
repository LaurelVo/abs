<?php
//connect to mysql
$connect = new mysqli('localhost', 'root', 'root', 'assignment2_502');

if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}
?>