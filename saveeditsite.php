<?php
// configuration
include('../connect.php');

// new data
$id = $_POST['memi'];
$a = $_POST['sitename'];
$h = $_POST['sitelocation'];
$b = $_POST['phonenumber'];
$c = $_POST['site_id'];

$sql = "UPDATE sitee 
        SET sitename=?, sitelocation=?, phonenumber=?, site_id=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$h,$b,$c,$id));
header("location: sites.php");

?>