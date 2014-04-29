<?php
//sql/addInput
include("connect2DB.php");
mysqli_query($con, "UPDATE `uppms`.`equipment` SET
	 `article` = '" . $_POST['article'] . "',
	 `description` = '" . $_POST['description'] . "',
	 `account_title` = '" . $_POST['account_title'] . "',
	 `property_number` = '" . $_POST['property_number'] . "',
	 `location` = '" . $_POST['location'] . "', 
	 `unit_measure` = '" . $_POST['unit_measure'] . "', 
	 `unit_value` = '" . $_POST['unit_value'] . "',
	 `OHC_quantity` = '" . $_POST['quantity'] . "',
	 `remarks` = '" . $_POST['remarks'] . "',
	 `point_person` = '" . $_POST['point_person'] . "', 
	 `department` = '" . $_POST['department'] . "',
	 `date_acquired` = '" . $_POST['date_acquired'] . "', 
	 `ohc_date` = '" . $_POST['ohc_date'] . "'
	WHERE `equipment`.`E_ID` = '" . $_POST['E_ID'] . "'");
echo mysqli_error($con);
?>



