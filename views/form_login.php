<?php
	session_start();
	if (isset($_SESSION['login'])) {
		header("Location: app_chat");
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/style_selection.css">
	<link rel="shortcut icon" type ="image/x-icon" href="../image/Logo.ico">
	<title>ZeroChat</title>
	<?php
		include '../connection.php';
	?>
</head>
<body>
	<div class="wrapper">
		<header>
			<nav class="navbar">
				<img src="../image/Logo.png" alt="Logo" class="logo ">
				<ul>
					<li><a class="active" href="../index.php">Home</a></li>
					<li><a href="#">About</a></li>
					<li><a href="#">Services</a></li>
					<li><a href="#">Contact</a></li>
					<li><a href="#">Feedback</a></li>
				</ul>
			</nav>
		</header>
		<div class="center">
			<div class="box-login">
				<h2>Login</h2>
				<form action="/ZeroChat/actions/login.php" method="post">
					<div class="input-login">
						<input type="text" name="username" required="">
						<label for="">Username</label>
					</div>
					<div class="input-login">
						<input type="password" name="password" required="">
						<label for="">Password</label>
					</div>
					<div>
						<input type="submit" name="login" value="login">
					</div>
				</form>
			</div>
			
		</div>
	</div>
</body>
</html>