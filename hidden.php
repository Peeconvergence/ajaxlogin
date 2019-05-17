<?php
session_start();


if(isset($_SESSION['loggedIn'])){
	header('location:login.php');
	exit();
}
?>

<a href="logout.php">Log out</a>
You are Logged IN!