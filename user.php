<!Doctype>
<html>
<head>
<title>profile</title>
<body>

<h1>Profile Details-</h1><br>
<?php
session_start();
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "bike_portal_bd";
$prefix = "";
$bd = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database1");
mysqli_select_db($bd, $mysql_database) or die("Could not select database2");

$username = $_GET['username'];
$username = stripcslashes($username);
$username = mysqli_real_escape_string($bd, $username);

$qry = "select * from user where u_username = '$username'";
$result = mysqli_query($bd, $qry) or die("Failed to querry dataase".mysql_error());
$row = mysqli_fetch_array($result);
$image = $row['image'];
    echo "<img src='uploads/$image' >";
	echo"<br><br>";
echo"name- ".$row['Name']."<br>Phone number- ".$row['Phone_number']."<br>NID- ".$row['NID']."<br>Driving Licence no- ".$row['Driving_Licence_no']."<br>";
if($row['verification']==0){
	echo"approval- pending";
}
else if($row['verification']==1){
	echo"approval- verified";
}
else if($row['verification']==2){
	echo"approval- rejected";
}
//echo"<img src= 'signup/uploads/".$row['image']."'/>";
 
echo"<h1>Vehicle Details-</h1><br>";
$qry2 = "select * from vehicle where u_username_fk = '$username'";
$result2 = mysqli_query($bd, $qry2) or die("Failed to querry dataase".mysql_error());
//$row2 = mysqli_fetch_array($result2);

while($row2=$result2->fetch_assoc()){
echo" Serial no- ".$row2['Serial_no']."<br>Taxtoken no-".$row2['Taxtoken_no']."<br>Current Cases-".$row2['Case_Count']."<br>Insurance no- ".$row2['Insurance_no']."<br>";	
echo"<br>";
}
/*if(isset($_SESSION['add'])){
	header( "Location:http://localhost/user/add.php?username=$username" );
	
}*/
$_SESSION['username']=$username;
?>
<br><br>
<form action="add.php" method="POST">
<button type="submit" name="add">Add vehicle</button>
</form>

</body>
</html>