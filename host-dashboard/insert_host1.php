<?php  
//include the file session.php
include("./../utils/session.php");
//include the file db_conn.php
include("./../utils/db_conn.php");
$sql = "INSERT INTO accommodations(type, description, max_guests, total_rooms, total_bathrooms, address, published_at, price_per_night, created_at, updated_at, house_name, city, has_garage, has_internet, allow_pet, allow_smoke, owner_id, image_url, available_from, available_to) VALUES('".$_POST["type"]."', '".$_POST["description"]."', '".$_POST["max_guests"]."', '".$_POST["total_rooms"]."', '".$_POST["total_bathrooms"]."', '".$_POST["address"]."', '".$_POST["published_at"]."', '".$_POST["price_per_night"]."', '".$_POST["created_at"]."', '".$_POST["updated_at"]."', '".$_POST["house_name"]."', '".$_POST["city"]."', '".$_POST["has_garage"]."', '".$_POST["has_internet"]."', '".$_POST["allow_pet"]."', '".$_POST["allow_smoke"]."', '".$_POST["owner_id"]."', '".$_POST["image_url"]."', '".$_POST["available_from"]."', '".$_POST["available_to"]."')";  
if(mysqli_query($connect, $sql))  
{  
     echo 'Details Inserted';  
}  
 ?>