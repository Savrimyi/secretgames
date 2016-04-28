<?php
session_start();
if(isset($_SESSION['user'])) {
	$username = $_SESSION['user'];
} else {
	header("Location: login.html");
}

$db_host = "localhost";
$db_name = "login_info";
$db_user = "root";
$db_password = "CHANGE_ME";

$connection = mysqli_connect($db_host, $db_user, $db_password, $db_name);
if($connection->connect_errno) {
	die("Failed to connect to database: " .mysqli_error($connection));
}
$db = mysqli_select_db($connection, $db_name) or die("Failed to select database: " .mysqli_error());

if(isset($_POST['submit'])) {
	if(!empty($_POST['password'])) {
		$query = mysqli_query($connection, "SELECT * FROM UsernamePassword where username = '$username' AND password = '$_POST[password]'");
		$row = mysqli_fetch_array($query, MYSQLI_BOTH);

		if(!empty($row['username']) AND !empty($row['password'])) {
			$query = mysqli_query($connection, "UPDATE UsernamePassword SET password = '$_POST[newpassword]' WHERE username = '$username'");
		}
	}

	header("Location: editprofile.php");
}
?>

