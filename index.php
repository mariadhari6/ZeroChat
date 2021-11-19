<?php
	session_start();
	if(isset($_SESSION['login'])){
		header("Location: views/app_chat/index.php");
		exit;
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/style_selection.css">
	<link rel="shortcut icon" type ="image/x-icon" href="image/Logo.ico">
	<title>ZeroChat</title>
	<?php
		include 'connection.php';
	?>
</head>
<body>
	<div class="wrapper">
		<header>
			<nav class="navbar">
				<img src="image/Logo.png" alt="Logo" class="logo ">
				<ul>
					<li><a class="active" href="?page=home">Home</a></li>
					<li><a href="#">About</a></li>
					<li><a href="#">Services</a></li>
					<li><a href="#">Contact</a></li>
					<li><a href="#">Feedback</a></li>
				</ul>
			</nav>
		</header>
		<div class="center">
			<?php
				$get_page = @$_GET['page'];
				if ($get_page == '' || $get_page =='home') {
					include "views/landing.php";
				}
				else if ($get_page == 'form_login') {
					echo "<script>window.open('views/form_login.php', '_self')</script>";
				}
				elseif ($get_page == 'form_register') {
					echo "<script>window.open('views/form_register.php', '_self')</script>";
				}
			?>
		</div>
	</div>
</body>
</html>