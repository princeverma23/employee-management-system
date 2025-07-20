<?php
session_start();

// remove the all session variables
session_unset();
//
//destory the session

session_destroy();
header('location:index.php');

?>
