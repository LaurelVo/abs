<?php  
//include the file session.php
include("./../utils/session.php");
//include the file db_conn.php
include("./../utils/db_conn.php");
$sql = "INSERT INTO bookings(user_id, price, start_date, end_date, created_at, no_guests, is_accepted, rejected_reason, checkout_date) VALUES('".$_POST["user_id"]."', '".$_POST["price"]."', '".$_POST["start_date"]."', '".$_POST["end_date"]."', '".$_POST["created_at"]."', '".$_POST["no_guests"]."', '".$_POST["is_accepted"]."', '".$_POST["rejected_reason"]."', '".$_POST["checkout_date"]."')";  
if(mysqli_query($connect, $sql))  
{  
     echo 'Details Inserted';  
}  
 ?>