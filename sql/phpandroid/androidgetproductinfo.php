<?php
    if(isset($_POST['productid'])){
		$con = mysql_connect("localhost","root","");
		
		if (!$con){
			die('Could not connect: ' . mysql_error());
		}
		mysql_select_db("uppms", $con);
		
		$pid = $_POST['productid'];
       
		$result = mysql_query("SELECT * FROM equipment WHERE E_ID = '$pid' ") or die('Errant query:');

		$output = mysql_fetch_assoc($result);

		$report = mysql_query("SELECT * FROM report WHERE E_ID = '$pid' ORDER BY date_time DESC LIMIT 1");

		if (mysql_num_rows($report) == 0) {
			$output['status'] = "No reported history";
		} else {
			$fix = mysql_query("SELECT * FROM fixed WHERE E_ID = '$pid' ORDER BY date_time DESC LIMIT 1");

			$reportArray = mysql_fetch_array($report);
			$fixArray = mysql_fetch_array($fix);

			if ($reportArray['date_time'] > $fixArray['date_time']) {
				$output['status'] = "Reported";
			} else {
				$output['status'] = "Fixed";
			}
		}
		
		print(json_encode($output));
		
		mysql_close($con);
	} else {
		$output = "not found";
		print(json_encode($output));
	}
?>