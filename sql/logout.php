<?php
	session_start();
	$_SESSION['logged_in'] = false;
	session_unset($_SESSION['logged_in']);
	session_destroy();

	header ("Location: http://localhost/uppms3/login.php");
?>