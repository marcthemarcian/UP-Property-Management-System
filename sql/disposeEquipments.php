<?php
	include("connect2DB.php");

	$reports = $_POST['reports'];

	for ($i = 0; $i < sizeof($reports); $i++) {
		$eid = $reports[$i];

		$query = mysqli_query($con, "insert into disposed (`E_ID`) values (".$eid.")");
		$query2 = mysqli_query($con, "delete from report WHERE `E_ID` = ".$eid."");
		echo mysqli_error($con);
	}

	//header("Location: ../");
?>