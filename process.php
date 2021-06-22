<?php

$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "bike_portal_bd";
$prefix = "";
$bd = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database1");
mysqli_select_db($bd, $mysql_database) or die("Could not select database2");


$username = $_POST['user'];
$password = $_POST['pass'];

$username = stripcslashes($username);
$password = stripcslashes($password);
$username = mysqli_real_escape_string($bd, $username);
$password = mysqli_real_escape_string($bd, $password);

$flag=0;

$qry = "select * from user where u_username = '$username' and u_password = '$password'";
$result = mysqli_query($bd, $qry) or die("Failed to querry dataase".mysql_error());

	$row = mysqli_fetch_array($result);
	
	if($row['u_username'] == $username && $row['u_password'] == $password && $flag == 0){
		header( "Location:http://localhost/user/user.php?username=$username" );
	}
	else{
		$flag=1;
	}

if($flag == 1){
	$qry = "select * from police where p_username = '$username' and p_password = '$password'";
	$result = mysqli_query($bd, $qry) or die("Failed to querry dataase".mysql_error());
	
	
		$row = mysqli_fetch_array($result);
		if($row['p_username'] == $username && $row['p_password'] == $password){
			header( "Location:http://localhost/user/police.php" );
		}
		else{
			$flag = 2;
		}
	
}
if($flag == 2){
	$qry = "select * from admin where a_username = '$username' and a_password = '$password'";
	$result = mysqli_query($bd, $qry) or die("Failed to querry dataase".mysql_error());
	
	
		$row = mysqli_fetch_array($result);
		if($row['a_username'] == $username && $row['a_password'] == $password){
			header( "Location:http://localhost/admin/admin.php" );
		}
		else{
			echo "sorry, wrong info!";
		}
	
}
?>