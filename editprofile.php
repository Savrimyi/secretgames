<?php
session_start();
if(isset($_SESSION['user'])) {
	$username = $_SESSION['user'];
} else {
	header("Location: login.html");
}
?>

<html>
	<head>
		<title>Edit Profile: <?php echo $username ?></title>
	</head>
	<body>
		Edit <?php echo $username ?>'s Profile
		<hr />
		<form method="POST" action="changeusername.php">
			Change Username
			<br>
			<input type="text" name="newusername" size="40">
			<br>
			<input id="button" type="submit" name="submit" value="ChangeUsername">
		</form>
		<br>
		<br>
		<form method="POST" action="changepassword.php">
			Change Password
			<br>
			Current Password: <input type="password" name="password" size="40">
			<br>
			New Password: <input type="password" name="newpassword" size="40">
			<br>
			<input id="button" type="submit" name="submit" value="ChangePassword">
		</form>
		<hr>
		<form method="POST" action="logout.php">
			<input type="submit" value="Log Out">
		</form>
	</body>
</html>

