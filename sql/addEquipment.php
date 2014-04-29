<?php
	include("connect2DB.php");
	
	mysqli_query($con, "insert into equipment (
		`article`, 
		`description`, 
		`account_title`, 
		`property_number`,
		`location`, 
		`unit_measure`,
		`unit_value`,
		`OHC_quantity`,
		`remarks`,
		`point_person`,
		`department`,
		`date_acquired`,
		`ohc_date`) values (
		'" . $_POST['article'] . "', 
		'" . $_POST['description'] . "', 
		'" . $_POST['accountTitle'] . "', 
		'" . $_POST['property_number'] . "', 
		'" . $_POST['location'] . "', 
		'" . $_POST['unit_measure'] . "', 
		'" . $_POST['unit_value'] . "', 
		'" . $_POST['quantity'] . "',
		'" . $_POST['remarks'] . "',
		'" . $_POST['point_person'] . "', 
		'" . $_POST['department'] . "',
		'" . $_POST['date_acquired'] . "',
		'" . $_POST['ohc_date'] . "')");

	include("generateStickers.php");

	echo mysqli_error($con);
?>