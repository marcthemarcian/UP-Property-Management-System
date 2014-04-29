<?php
  include("connect2DB.php");
  $allowedExts = array("csv");
  $temp = explode(".", $_FILES["file"]["name"]);
  $extension = end($temp);

  if ($_FILES["file"]["type"] == "application/vnd.ms-excel" && ($_FILES["file"]["size"] < 20000) && in_array($extension, $allowedExts)) {
    if ($_FILES["file"]["error"] > 0) {
      echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    } else {
      echo "Upload: " . $_FILES["file"]["name"] . "<br>";
      echo "Type: " . $_FILES["file"]["type"] . "<br>";
      echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
      echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

      $file = fopen($_FILES["file"]["tmp_name"], "r");
            
      while(!feof($file)) {
        print_r(fgetcsv($file));
      }

      fclose($file);
    }
  } else {
    echo "Invalid file";
  }
?>