<?php

$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "bike_portal_bd";
$prefix = "";
$bd = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database1");
mysqli_select_db($bd, $mysql_database) or die("Could not select database2");


$number = $_POST['vno'];

$number = stripcslashes($number);
$number = mysqli_real_escape_string($bd, $number);


$qry = "select * from vehicle v JOIN user u ON v.u_username_fk = u.u_username where v.serial_no = '$number'";
$result = mysqli_query($bd, $qry) or die("Failed to querry dataase".mysql_error());
$row = mysqli_fetch_array($result);
$username = $row['u_username_fk'];
$username = stripcslashes($username);
$username = mysqli_real_escape_string($bd, $username);

	
	header( "Location:http://localhost/user/puser.php?username=$username" );
	if($number==''){
		echo 'no input!!';
	}
	else if(!$row['u_username_fk']){
		echo 'no records!!';
	}
	

?> 