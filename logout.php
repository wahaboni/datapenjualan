<?php 
if (!isset($_COOKIE['username'])) {
    header('location:login.php');
} else {
	setcookie("username","", time()-3600);
	header('location:login.php');
}
?>