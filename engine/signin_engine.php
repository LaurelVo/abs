<?php
//include the file session.php
include("./../utils/session.php");
//include the file db_conn.php
include("./../utils/db_conn.php");

header("Access-Control-Allow-Origin: *"); 
header('Content-type: application/json');


//receive the email data from the form (in signin_form.php)
$email=$_POST['email'];
//receive the password data from the form (in signin_form.php)
$password=$_POST['password'];

//query to check whether email is in the table (check whether the user has been signed up)
$query = "SELECT * FROM users WHERE email='$email'";
//execute query to the database and retrieve the result ($result)
$result = $connect->query($query);

//convert the result to array (the key of the array will be the column names of the table)
	$row=$result->fetch_array(MYSQLI_ASSOC);

//if the email from table is not same as the email data from the form
if($row['email']!=$email || $email=="")
{
	//automatically pass the error message
	echo json_encode( 'Wrong email or password' );
}
//if the email is same as the email data from the form 
else {
	//if the password from table is same as the password data from the form
	if (strcmp($password, $row['password'] == 0)) {
		//save the email in the session
		$session_user=$row['email'];
		$session_userId=$row['id'];
		$session_role=$row['access_level'];
		$_SESSION['session_user']=$session_user;
		$_SESSION['session_userId']=$session_userId;
		$_SESSION['session_role']= $session_role;

		echo json_encode( $session_role );
	
	}//if the password from table does not match with the password data from the signin form
	else{

		//automatically pass the error message
		echo json_encode( 'Wrong email or password' );
	}
}
?>