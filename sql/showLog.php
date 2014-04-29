<?php
	include("connect2DB.php");

	$query = "select * from removed_equipments";
	$sql = mysqli_query($con, $query);
	echo mysqli_error($con);

?>