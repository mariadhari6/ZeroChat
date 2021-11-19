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
					<h2>Register</h2>
					<form action="/ZeroChat/actions/register.php" method="post">
						<div class="input-login">
							<input type="text" name="full_name" required="">
							<label for="">Full Name</label>
						</div>
						<div class="input-login">
							<input type="text" name="username" required="">
							<label for="">Username</label>
						</div>
						<div class="input-login">
							<input type="text" name="email" required="">
							<label for="">Email</label>
						</div>
						<div class="input-login">
							<input type="password" name="password" required="">
							<label for="">Password</label>
						</div>
						<div class="select-box1" style="font-size: 19px; font-family: 'Amarant	e';">
							Gender
							<label for="male">
								<input type="radio" value="male" id="male" name="gender">
								Male
								<span></span>
							</label>
							<label for="female">
								<input type="radio" value="female" id="female" name="gender">
								Female
								<span></span>
							</label>
						</div>
						<div class="select-country">
							<!-- <label for="country">Select Your Country </label> -->
							<select name="country" id="country">
								<?php
									$negara = "Select Your Country";
									if ($conn->connect_error) {
										die("Connection failed: " . $conn->connect_error);
									}
									$sql = "SELECT * FROM country";
									$result = $conn->query($sql);
									echo '<option value="">'. $negara. '</option>';
									if ($result->num_rows>0) {
										while($row = $result->fetch_assoc()){
											echo '<option value="'.$row['id'].'">'. $row['country_name']. '</option>';
										}
									}			
								?>
							</select>
						</div>
						<div>
							<input type="submit" name="register" value="register">
						</div>
					</form>

				</div>	
			</div>
		</div>
	</body>
</html>