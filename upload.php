<!DOCTYPEHT>
<html>
<head>
<title>upload image</title>
</head>
<body>
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select Image File to Upload:
    <input type="file" name="file"><br>
    <input type="submit" name="submit" value="Upload">
</form>

</body>
</html>

<?php
session_start();
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "bike_portal_bd";
$prefix = "";
$db = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database1");
mysqli_select_db($db, $mysql_database) or die("Could not select database2");


// File upload path
$targetDir = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
		$username=$_SESSION['user'];
            $insert = $db->query("UPDATE user set image = '".$fileName."' WHERE u_username='".$username."'");
            if($insert){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}

// Display status message
echo $statusMsg;
?>
