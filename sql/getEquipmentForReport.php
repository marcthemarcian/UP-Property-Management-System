<?php
	include("connect2DB.php");

	$query2 = mysqli_query($con, "select * from equipment where E_ID= '" . $report['E_ID'] . "' ");
	$item = mysqli_fetch_array($query2);
?>