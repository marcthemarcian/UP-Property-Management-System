<?php
	include("connect2DB.php");

	$query = mysqli_query($con, "select * from disposed");

	echo mysqli_error($con);
?>