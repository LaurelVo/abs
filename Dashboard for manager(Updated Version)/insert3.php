<?php  
$connect = mysqli_connect("localhost", "root", "", "assignment2");
$sql = "INSERT INTO users(first_name, last_name, mobile, email, password, access_level, postal_address, ABN) VALUES('".$_POST["first_name"]."', '".$_POST["last_name"]."', '".$_POST["mobile"]."', '".$_POST["email"]."', '".$_POST["password"]."', '".$_POST["access_level"]."', '".$_POST["postal_address"]."', '".$_POST["ABN"]."')";  
if(mysqli_query($connect, $sql))  
{  
     echo 'User Created';  
}  
 ?>