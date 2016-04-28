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
		<title><?php echo $username ?>'s Profile</title>
	</head>
	<body>
		<div>
			Hello! You are logged in as <?php echo $username ?>
			<br />
			<a href="editprofile.php">Edit Profile</a> 
		</div>
	</body>
</html>

