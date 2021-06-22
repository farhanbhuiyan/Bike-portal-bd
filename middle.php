 <?php
 session_start();
 $username = $_POST['user'];
 $_SESSION['u']=$username;
 if(1){
 header( "Location:http://localhost/admin/approve.php" );
 }
 ?>