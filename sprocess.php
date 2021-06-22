 <?php
session_start();
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "bike_portal_bd";
$prefix = "";
$bd = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database1");
mysqli_select_db($bd, $mysql_database) or die("Could not select database2");


$name = $_POST['name'];
$username = $_POST['user'];
$password = $_POST['pass'];
$licence = $_POST['licence'];
$nid = $_POST['nid'];
$phn = $_POST['phn'];

$name = stripcslashes($name);
$username = stripcslashes($username);
$password = stripcslashes($password);
$licence = stripcslashes($licence);
$nid = stripcslashes($nid);
$phn = stripcslashes($phn);
$name = mysqli_real_escape_string($bd, $name);
$username = mysqli_real_escape_string($bd, $username);
$password = mysqli_real_escape_string($bd, $password);
$licence = mysqli_real_escape_string($bd, $licence);
$nid = mysqli_real_escape_string($bd, $nid);
$phn = mysqli_real_escape_string($bd, $phn);

$user_check_query = "SELECT * FROM user WHERE u_username='$username' OR Driving_Licence_no='$licence'";
  $result = mysqli_query($bd, $user_check_query) ;
  $user = mysqli_fetch_array($result);
  
  if ($user) { // if user exists
    if ($user['u_username'] === $username) {
      echo "Username already exists";
    }

    else if ($user['Driving_Licence_no'] === $licence) {
      echo "licence already exists";
    }
  }

else{
$qry = 'INSERT INTO user (u_username, Driving_Licence_no, u_password, Phone_number, NID, Name) VALUES ("'.$username.'","'.$licence.'","'.$password.'","'.$phn.'","'.$nid.'","'.$name.'")';
mysqli_query($bd, $qry);
if($username){
header( "Location:http://localhost/user/upload.php" );
}
}
$_SESSION['user']=$username;



?>