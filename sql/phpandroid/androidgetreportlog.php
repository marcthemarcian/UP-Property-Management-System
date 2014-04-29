<?php
    if(isset($_POST['productid'])){
		$con = mysql_connect("localhost","root","");
		
		if (!$con){
			die('Could not connect: ' . mysql_error());
		}
		mysql_select_db("uppms", $con);
		
		$pid = $_POST['productid'];
       
		$report = mysql_query("SELECT * FROM report WHERE E_ID = '$pid' ORDER BY date_time DESC LIMIT 1");
		$result = mysql_query("SELECT * FROM equipment WHERE E_ID = '$pid' ");

		$resultArray = mysql_fetch_array($result);

		$equpName = $resultArray['article'];

		if (mysql_num_rows($report) == 0) {
			$reportDate = "No reported history";
			$fixedDate = "No reported history";
		} else {
			$fix = mysql_query("SELECT * FROM fixed WHERE E_ID = '$pid' ORDER BY date_time DESC LIMIT 1");
			$reportArray = mysql_fetch_array($report);
			$reportDate = $reportArray['date_time'];
			
			if (mysql_num_rows($fix) == 0) {
				$fixedDate = "No reported history";
			} else {
				$fixArray = mysql_fetch_array($fix);
				$fixedDate = $fixArray['date_time'];
			}
		}
		
		$return = array("equpName" => $equpName, "reportDate" => $reportDate, "fixedDate" => $fixedDate);
		
		print(json_encode($return));
		
		mysql_close($con);
	} else {
		$output = "not found";
		print(json_encode($output));
	}
?>