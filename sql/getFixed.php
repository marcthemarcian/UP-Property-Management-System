<?php
	include("connect2DB.php");

	$query = mysqli_query($con, "select * from fixed");

	echo mysqli_error($con);
?>