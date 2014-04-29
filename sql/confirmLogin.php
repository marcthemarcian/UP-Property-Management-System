<?php
	include("connect2DB.php");

	$password = $_POST['password'];

	$query = "select * from user where username='".$_POST['username']."' and password = '$password'";
	$result = mysqli_query($con, $query);
	
	$data = mysqli_fetch_array($result);

	if (isset($data['username'])) {
		session_start();
		$_SESSION['logged_in'] = true;
		$_SESSION['user']['uid'] = $_POST['username'];
		$_SESSION['user']['role'] = $data['user_type'];
		header ("Location: http://localhost/uppms3/");
	} else {
		header("Location: http://localhost/uppms3/login.php?error=incorrectlogin");
	}

	

?>