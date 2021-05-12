<?php
//include the file session.php
include("./../utils/session.php");
//include the file db_conn.php
include("./../utils/db_conn.php");

header("Access-Control-Allow-Origin: *"); 
header('Content-type: application/json');

$email=$_POST['email'];
$firstName=$_POST['firstName'];
$lastName=$_POST['lastName'];
$password=$_POST['password'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$access=2;
$abn=$_POST['abn'];

//query to check whether email is in the table (check whether the user has been signed up)
$query = "SELECT * FROM users WHERE email='$email'";

//execute query to the database and retrieve the result ($result)
$result = $mysqli->query($query);

//convert the result to array (the key of the array will be the column names of the table)
$row=$result->fetch_array(MYSQLI_ASSOC);

if($row['email']!=$email || $row['email']=="") {
		// create a user
		$mysqli->query("INSERT INTO users (first_name, last_name, mobile, email, password, access_level, postal_address, ABN) VALUES ('$firstName','$lastName','$phone', '$email', '$password', '$access', '$address', '$abn')");

	$_SESSION['session_user']=$email;
	$_SESSION['session_role']= $access;

	echo json_encode( 'success' );
	
} else {
	echo json_encode( 'Email Exists' );
}

$mysqli->close();
?>