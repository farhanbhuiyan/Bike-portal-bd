<!DOCTYPE html>
<html>
<head>
<title> Login to Bikers portal BD</title>
</head>
<link rel="stylesheet" type="text/css" href="login.css">
<body>
<div class="loginbox">
<img src="avatar.png" class="avatar">
<h1> Login Here</h1>
<form action="process.php" method="POST">
<p>username<p/>
<input type="text" name="user" placeholder="Enter Username">
<p> password</p>
<input type="password" name="pass" placeholder="Enter Password">
<input type="submit" name="" value="Login">
<a href="http://localhost/login/lostpassword.php">Lost your password?</a><br>
<a href="http://localhost/signup/signup.php">Signup</a>
</form>
</body>
</html>