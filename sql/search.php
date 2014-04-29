<?php
	include("connect2DB.php");
	$keyword = $_POST['hello'];
	$sql = "SELECT * FROM `equipment` WHERE 
	(`article` LIKE '%$keyword%') OR 
	(`description` LIKE '%$keyword%') OR 
	(`account_title` LIKE '%$keyword%') OR 
	(`property_number` LIKE '%$keyword%') OR 
	(`location` LIKE '%$keyword%') OR 
	(`unit_measure` LIKE '%$keyword%') OR 
	(`unit_value` LIKE '%$keyword%') OR 
	(`OHC_quantity` LIKE '%$keyword%') OR 
	(`remarks` LIKE '%$keyword%') OR 
	(`point_person` LIKE '%$keyword%') OR
	(`department` LIKE '%$keyword%') OR 
	(`date_acquired` LIKE '%$keyword%') OR 
	(`ohc_date` LIKE '%$keyword%')";
	
	$obj = mysqli_query($con, $sql);
	$results = array();
	while($i = mysqli_fetch_array($obj)) {
		array_push($results, $i);
	}

	echo json_encode($results);
?> 