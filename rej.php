<?php
session_start();
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "bike_portal_bd";
$prefix = "";
$bd = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database1");
mysqli_select_db($bd, $mysql_database) or die("Could not select database2");
$username=$_SESSION['u'];

$qry3 = "UPDATE user SET verification = 2 where u_username = '$username'";
$result3 = mysqli_query($bd, $qry3) or die("Failed to querry dataase".mysql_error());
header( "Location:http://localhost/admin/admin.php" );
?>