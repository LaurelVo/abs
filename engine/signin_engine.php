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
$result = $mysqli->query($query);

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
	if (password_verify($password, $row['password'])) {
		//save the email in the session
		$session_user=$row['email'];
		$_SESSION['session_user']=$session_user;

		// if($row['student_id']!="" && $row['student_id'] != 0) {
		// 	$_SESSION['session_role']= 0;
		// } else {
		// 	$staff_id=$row['staff_id'];
		// 	$query = "SELECT * FROM aStaff WHERE id='$staff_id'";
		// 	$result = $mysqli->query($query);
		// 	$row=$result->fetch_array(MYSQLI_ASSOC);
		// 	$r_ids = explode(",", $row['role_ids']);
		// 	$_SESSION['session_role'] = min($r_ids); //get lowest number => highest role
		// }
		
		echo json_encode( 'success' );
	
	}//if the password from table does not match with the password data from the signin form
	else{

		//automatically pass the error message
		echo json_encode( 'Wrong email or password' );
	}
}
?>