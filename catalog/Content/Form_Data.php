<?php
$connection = mysql_connect("localhost", "root", ""); // Establishing Connection with Server..
$conn = mysql_select_db("bhuwan99_tracsec", $connection); // Selecting Database

   mysql_set_charset('utf8');
   //query for insert data into tables

   $no = $_POST['device_no'];
   $imei =$_POST['device_imei'];


$query = "INSERT INTO `tbl_device` 
         (`device_no`,`device_imei`,`device_status`)
         VALUES
         ('$no','$imei',0)";
         $query_run= mysql_query($query);
        // $retval=mysql_query($query,$conn);
          if ($query_run)
          { 
                echo 'It is working';
          }

?>