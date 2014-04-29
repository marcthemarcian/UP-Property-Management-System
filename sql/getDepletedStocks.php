<?php
	include("connect2DB.php");

	$query = mysqli_query($con, 'select * from equipment where OHC_quantity = "0"');

	echo mysqli_error($con);
?>