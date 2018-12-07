<!-- Destroys all the session automatically when directed to logout.php -->
<?php
	session_start();
	session_unset();
	session_destroy();
	header("Location: home.php");
	exit();
?>