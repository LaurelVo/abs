<?php
//starting session
session_start();

//if the session for username has not been set, initialise it
if(!isset($_SESSION['session_user'])){
	$_SESSION['session_user']="";
}
if(!isset($_SESSION['session_role'])){
	$_SESSION['session_role']="";
}
$session_user = $_SESSION['session_user'];
$session_role = $_SESSION['session_role'];
$session_userId = $_SESSION['session_userId'];
?>