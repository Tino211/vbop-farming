<?php
//session_start();
$Servername = "localhost";
$Username = "root";
$Password = "";
$dbName = "test";

$link = mysqli_connect($Servername, $Username, $Password, $dbName);

if(!$link)
{
    die('connection failed:'.mysql_connect_error());
}

?>