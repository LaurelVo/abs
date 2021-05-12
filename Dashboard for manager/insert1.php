<?php  
$connect = mysqli_connect("localhost", "root", "", "system_manager");
$sql = "INSERT INTO house_list(owner, location, status) VALUES('".$_POST["owner"]."', '".$_POST["location"]."', '".$_POST["status"]."')";  
if(mysqli_query($connect, $sql))  
{  
     echo 'Data Inserted';  
}  
 ?>