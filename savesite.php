<?php
session_start();
include('../connect.php');
$a = $_POST['sitename'];
$k = $_POST['sitelocation'];
$b = $_POST['phonenumber'];
$c = $_POST['site_id'];
// query


    
  //do your write to the database filename and other details   
$sql = "INSERT INTO sitee (sitename,sitelocation,phonenumber,site_id) VALUES (:a,:k,:b,:c)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':k'=>$k,':b'=>$b, ':c'=>$c));
header("location: sites.php");

	
?>