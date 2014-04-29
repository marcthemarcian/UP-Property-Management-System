<?php
	include("connect2DB.php");

	$query = mysqli_query($con, "select * from equipment where E_ID = '".$equipments[$i]."'");
	$item = mysqli_fetch_array($query);

	echo mysqli_error($con);
?>