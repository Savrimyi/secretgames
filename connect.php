<?php
$db_host = "localhost";
$db_name = "login_info";
$db_user = "root";
$db_password = "CHANGE_ME";

$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
if($connection->connect_errno) {
	die("Failed to connect to database: " .mysqli_error($connection));
}

$db = mysqli_select_db($connection, $db_name) or die("Failed to select database: " .mysqli_error($connection));

if(isset($_POST['submit'])) {
	session_start();

	if(!empty($_POST['user'])) {
		$query = mysqli_query($connection, "SELECT * FROM UsernamePassword where username = '$_POST[user]' AND password = '$_POST[password]'");
		$row = mysqli_fetch_array($query, MYSQLI_BOTH);

		if(!empty($row['username']) AND !empty($row['password'])) {
			$_SESSION['user'] = $row['username'];
			header("Location: profile.php");
		} else {
			echo "Login unsuccessful.";
		}
	}
}
?>

