<?php
	include("connect2DB.php");

	$query = mysqli_query($con, "select * from report");

	echo mysqli_error($con);
?>