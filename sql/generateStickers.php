<?php
	include("connect2DB.php");

	$query = mysqli_query($con, "select E_ID FROM equipment WHERE E_ID = (select max(E_ID) FROM equipment)");
	$equipment = mysqli_fetch_array($query);
	$eid = $equipment['E_ID'];
	$filename = "UPPMS_".$eid.".png";
	$data = "UPPMS_".$eid;
	$level = "H";
	$size = 10;

    $file_path = "../qrcodes/".$filename;
    mysqli_query($con, "update equipment set file_path = '".$file_path."' WHERE E_ID = '".$eid."'");


    $PNG_TEMP_DIR = "C:\\xampp\\htdocs\\UPPMS3\\qrcodes\\";
    $PNG_WEB_DIR = '../qrcodes/';

    include "../phpqrcode/qrlib.php";
    
    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);    
    $filename = $PNG_TEMP_DIR.$filename;

    $errorCorrectionLevel = 'L';
    if (isset($level) && in_array($level, array('L','M','Q','H')))
        $errorCorrectionLevel = $level;    

    $matrixPointSize = 4;
    if (isset($size))
        $matrixPointSize = min(max((int)$size, 1), 10);


    if (isset($data)) { 
        if (trim($data) == '')
            die('data cannot be empty! <a href="?">back</a>');
        QRcode::png($data, $filename, $errorCorrectionLevel, $matrixPointSize, 2);            
    }

?>