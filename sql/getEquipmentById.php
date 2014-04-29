<?php
	include("connect2DB.php");

	$result = mysqli_query($con, "select * from equipment where E_ID= '" . $_POST['E_ID'] . "' ");
	$query = mysqli_fetch_array($result);
?>