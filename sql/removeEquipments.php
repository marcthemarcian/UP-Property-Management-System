<?php
	include("connect2DB.php");

	$equipments = $_POST['equipments'];

	for ($i = 0; $i < sizeof($equipments); $i++) {
		$eid = $equipments[$i];
		echo $eid;
		$query = mysqli_query($con, "select * from equipment where E_ID= '" . $eid . "' ");
		$equipment = mysqli_fetch_array($query);

		$query2 = mysqli_query($con, "insert into removed_equipments (
		`E_ID`,
		`article`, 
		`description`, 
		`account_title`, 
		`date_acquired`,
		`property_number`,
		`location`, 
		`unit_measure`,
		`unit_value`,
		`balance`,
		`OHC_date`,
		`OHC_quantity`,
		`shortage_overage`,
		`remarks`,
		`qr_code`,
		`point_person`,
		`department`,
		`file_path`) values (
		'" . $equipment['E_ID'] . "', 
		'" . $equipment['article'] . "', 
		'" . $equipment['description'] . "', 
		'" . $equipment['account_title'] . "', 
		'" . $equipment['date_acquired'] . "', 
		'" . $equipment['property_number'] . "', 
		'" . $equipment['location'] . "', 
		'" . $equipment['unit_measure'] . "', 
		'" . $equipment['unit_value'] . "', 
		'" . $equipment['balance'] . "', 
		'" . $equipment['OHC_date'] . "', 
		'" . $equipment['OHC_quantity'] . "', 
		'" . $equipment['shortage_overage'] . "', 
		'" . $equipment['remarks'] . "',
		'" . $equipment['qr_code'] . "',
		'" . $equipment['point_person'] . "', 
		'" . $equipment['department'] . "',
		'" . $equipment['file_path'] . "')");

		$query3 = mysqli_query($con, 'DELETE FROM equipment WHERE E_ID = "'.$eid.'"');
	}

?>