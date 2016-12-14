<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysqli_connect("localhost", "root", "");
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($connection, $username);
$password = mysqli_real_escape_string($connection, $password);
// Selecting Database
$db = mysqli_select_db($connection, 'fantasy football');
// SQL query to fetch information of registerd users and finds user match.
$query = "select * from login where Password='$password' AND Username='$username'";
$results = mysqli_query($connection, $query);
$rows = mysqli_num_rows($results);
if ($rows == 1) {
$_SESSION['login_user']=$username; // Initializing Session
header("location: profile.php"); // Redirecting To Other Page
} else {
$error = "Username or Password is invalid";
}
mysqli_close($connection); // Closing Connection
}
}
if (isset($_POST['create'])) {
if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email']) || empty($_POST['team'])) {
$error = "Enter all fields to Create an account.";
}
else
{
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];
$email=$_POST['email'];
$team=$_POST['team'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysqli_connect("localhost", "root", "");
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$email = stripslashes($email);
$team = stripslashes($team);
$username = mysqli_real_escape_string($connection, $username);
$password = mysqli_real_escape_string($connection, $password);
$email = mysqli_real_escape_string($connection, $email);
$team = mysqli_real_escape_string($connection, $team);
// Selecting Database
$db = mysqli_select_db($connection, 'fantasy football');
// SQL query to fetch information of registerd users and finds user match.
$query = "insert into login (Email, Username, Password, TeamName) values ('$email', '$username', '$password', '$team')";
$results = mysqli_query($connection, $query);
if ($results) {
$_SESSION['login_user']=$username; // Initializing Session
header("location: profile.php"); // Redirecting To Other Page
} else {
$error = "Account not created.";
}
mysqli_close($connection); // Closing Connection
}
}
?>