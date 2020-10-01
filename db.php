<?php
//this db.php is used to connect database with the php using mysql
$servername = "localhost";
$username = "root";
$password = "";
$db = "stationeryshop";

// Create connection
$conn = mysql_connect($servername, $username, $password) or die("connection failed".mysql_connect_error());
mysql_select_db($db,$conn);
?>
