<?php
include("./utils/session.php");
//destroy the sessions saved before.
session_destroy();
//automatically go back to signin form
header('Location: ./index.php');
?>