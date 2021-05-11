<?php
//include the file session.php
include("./../utils/session.php");
//include the file db_conn.php
include("./../utils/db_conn.php");

header("Access-Control-Allow-Origin: *"); 
header('Content-type: application/json');

$email=$_POST['email'];
$name=$_POST['name'];
$password=$_POST['password'];
$hash = password_hash($password, PASSWORD_DEFAULT);
$address=$_POST['address'];
$dob=$_POST['dob'];
$phone=$_POST['phone'];
$campusId=$_POST['campusId'];
$gender=$_POST['gender'];
$studentId=$_POST['studentId'];
$staffId=$_POST['staffId'];
$expertise=$_POST['expertise'];
$qualificationId=$_POST['qualificationId'];

//query to check whether email is in the table (check whether the user has been signed up)
$query = "SELECT * FROM users WHERE email='$email'";

//execute query to the database and retrieve the result ($result)
$result = $mysqli->query($query);

//convert the result to array (the key of the array will be the column names of the table)
$row=$result->fetch_array(MYSQLI_ASSOC);

if($row['email']!=$email || $email=="") {
	if($studentId != "") {
		$sql = "SELECT * FROM users WHERE student_id = '$studentId'";
		$result=$mysqli->query($sql);
		$result_cnt = $result->num_rows;
		if ($result_cnt == 0) {
			// create a user
			$mysqli->query("INSERT INTO users (name, email, password, address, dob, phone, staff_id, student_id, campus_id, gender) VALUES ('$name', '$email', '$hash', '$address', '$dob', '$phone', '$staffId', '$studentId', '$campusId', '$gender')");
			//create student info for user
			$mysqli->query("INSERT INTO aStudent (id) VALUES ('$studentId')");
		} else {
			echo json_encode( 'ID existed' );
			return;
		}
	}

	if($staffId != "") {
		$sql = "SELECT * FROM users WHERE staff_id = '$staffId'";
		$result=$mysqli->query($sql);
		$result_cnt = $result->num_rows;
		if ($result_cnt == 0) {
			// create a user
			$mysqli->query("INSERT INTO users (name, email, password, address, dob, phone, staff_id, student_id, campus_id, gender) VALUES ('$name', '$email', '$hash', '$address', '$dob', '$phone', '$staffId', '$studentId', '$campusId', '$gender')");
			// every staff starts from tutor, so the role is default to 4
			//create staff info for user
			$mysqli->query("INSERT INTO aStaff (id, qualification_id, expertise, role_ids) VALUES ('$staffId', '$qualificationId', '$expertise', '4')");
		} else {
			echo json_encode( 'ID existed' );
			return;
		}
	}

	$_SESSION['session_user']=$email;
	if($studentId != "") {
		$_SESSION['session_role']= 0;
	} else {
		$staff_id=$staffId;
		$query = "SELECT * FROM aStaff WHERE id='$staff_id'";
		$result = $mysqli->query($query);
		$row=$result->fetch_array(MYSQLI_ASSOC);
		$_SESSION['session_role'] = 4;
	}
	echo json_encode( 'success' );
	
} else {
	echo json_encode( 'Email Exists' );
}

$mysqli->close();
?>