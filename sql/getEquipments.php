<?php
	include("connect2DB.php");

	$query = mysqli_query($con, "select * from equipment");

	echo mysqli_error($con);
?>