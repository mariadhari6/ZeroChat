<?php
	session_start();
	
	require '../connection.php';
	// echo $_SESSION["$username"];
	if (isset($_POST['login'])) {
		# code...
		$username = $_POST['username'];
		$password = $_POST['password'];
		$succes_login = FALSE;
		echo $username;

		$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
			if (password_verify($password, $row["password"])) {
				# code...
				$_SESSION['login'] = TRUE;
				$_SESSION['username'] = $username;
				header("Location: ../views/app_chat");
				exit;
			}
		
		}

		$failed = TRUE;
		echo "<script>alert('Username or password is wrong !!!')</script>";
		// exit;
		if ($failed === TRUE) {
			echo "<script>window.open('../views/form_login.php', '_self');</script>";	
			# code...
		}
	}
?>