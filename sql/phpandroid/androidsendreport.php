<?php
    if(isset($_POST['productid'])){
		$con = mysql_connect("localhost","root","");
		
		if (!$con){
			die('Could not connect: ' . mysql_error());
		}
		mysql_select_db("uppms", $con);
		
		$pid = $_POST['productid'];

		$remark = $_POST['remark'];
		
		$sql = ("INSERT INTO report (E_ID, remark) VALUES ('$pid', '$remark')");
		  
		$result = mysql_query($sql) or die('Errant query:');
		
		echo "Report Sent";
		
		mysql_close($con);
	}
?>