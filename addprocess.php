  <?php
session_start();
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "bike_portal_bd";
$prefix = "";
$bd = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database1");
mysqli_select_db($bd, $mysql_database) or die("Could not select database2");

$username = $_SESSION['username'];
$serial = $_POST['serial'];
$tax = $_POST['tax'];
$insurance = $_POST['insurance'];

$serial = stripcslashes($serial);
$tax = stripcslashes($tax);
$insurance = stripcslashes($insurance);

$serial = mysqli_real_escape_string($bd, $serial);
$tax = mysqli_real_escape_string($bd, $tax);
$insurance = mysqli_real_escape_string($bd, $insurance);

$user_check_query = "SELECT * FROM vehicle WHERE u_username_fk='$username' ";
  $result = mysqli_query($bd, $user_check_query) ;
  $user = mysqli_fetch_array($result);
  
  if ($user) { // if user exists
    if ($user['Serial_no'] == $serial) {
      echo "this already exists";
    }
  }


else if($user['Serial_no'] != $serial){
$qry = 'INSERT INTO vehicle (Serial_no, Taxtoken_no, Case_Count, Insurance_no, u_username_fk) VALUES ("'.$serial.'","'.$tax.'",0,"'.$insurance.'","'.$username.'")';
mysqli_query($bd, $qry);
echo"Successfully added!";
}



?>