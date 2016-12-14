<?php
include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: profile.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Fantasy Football Database</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="main">
<h1>Fantasy Football Tool</h1>
<div id="login">
<h2>Login</h2>
<form action="" method="post">
<label>User Name:</label>
<input id="name" name="username" placeholder="username" type="text" required>
<label>Password:</label>
<input id="password" name="password" placeholder="**********" type="password" required>
<label>Email:</label>
<input id="email" name="email" placeholder="email" type="text">
<label>Team Name:</label>
<input id="team" name="team" placeholder="Team Name" type="text">
<input name="submit" type="submit" value=" Login ">
<input name="create" type="submit" value=" Create Account ">
<span><?php echo $error; ?></span>
</form>
</div>
</div>
</body>
</html>
