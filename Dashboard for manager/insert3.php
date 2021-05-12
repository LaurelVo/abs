<?php  
$connect = mysqli_connect("localhost", "root", "", "system_manager");
$sql = "INSERT INTO user_list(name, access, info) VALUES('".$_POST["name"]."', '".$_POST["access"]."', '".$_POST["info"]."')";  
if(mysqli_query($connect, $sql))  
{  
     echo 'User Created';  
}  
 ?>