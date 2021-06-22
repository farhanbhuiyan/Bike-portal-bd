<!DOCTYPE html>
<html>
<head>
<title>search</title>
</head>
<body>
<div class="searchbox">
<form action="middle.php" method="POST">
<table border="1">
<th>Name</th	><th>Driving licence</th>	<th>Phone number</th><th>username</th>	<th>approval</th>

<?php
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "bike_portal_bd";
$prefix = "";
$bd = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database1");
mysqli_select_db($bd, $mysql_database) or die("Could not select database2");


$qry2 = "select * from user where verification = 0";
$result2 = mysqli_query($bd, $qry2) or die("Failed to querry dataase".mysql_error());
while($row2=$result2->fetch_assoc()){
echo"<tr><td>".$row2['Name']."</td>		<td>".$row2['Driving_Licence_no']."</td>	<td>".$row2['Phone_number']."</td>	<td>".$row2['u_username']."</td>		<td>pending</td></tr>";	
echo"<br>";
}
?>
</table>

<p>enter a username to verify<p/>
<input type="text" name="user" placeholder="Enter username"><br>
<input type="submit" name="" value="submit">
<br>
</form>
</body>
</html>