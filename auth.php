<?php
	
    include '../config.php';
   session_start();
   
   // Check whether the session variable SESS_MEMBER_ID is present or not
   if(!isset($_SESSION['SESS_MEMBER_ID']) || empty($_SESSION['SESS_MEMBER_ID'])) {
      header("location: ../index.php");
      exit();
   }
   
   $SESS_MEMBER_ID = $_SESSION['SESS_MEMBER_ID'];
   
   // Set the session variable to the value of $SESS_MEMBER_ID
   $_SESSION['SESS_MEMBER_ID'] = $SESS_MEMBER_ID;
   
   if(isset($_GET['logout'])){
      unset($_SESSION['SESS_MEMBER_ID']);
      session_destroy();
      header('location:../index.php');
   }
?>

