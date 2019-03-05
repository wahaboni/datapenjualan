<?php 
session_start();
if (!isset($_SESSION['userLogin'])) {
    header('location:login.php');
} else {
		// remove all session variables
	session_unset(); 

	// destroy the session 
	session_destroy(); 
	sleep(1);
	header('location:login.php');
}
?>