<?php
	// session_start();
	require '../connection.php';
	
	if (isset($_POST['register'])) {
		# code...
		//Create data new user
		$full_name = $_POST['full_name'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$gender = $_POST['gender'];
		$country = $_POST['country'];
		$status_login = 0;
		$status_online = 0;
		$succes = FALSE;
		// $password = stripcslashes($password);	
		if ($gender == '' && $country == '') {
			# code...
			echo "<script>alert('Select your gender & country')</script>";
		}
		elseif ($gender == '' || $country == '') {
			# code...
			if ($gender == '') {
				echo "<script>alert('Select your gender')</script>";
			}
			else if ($country == '') {
				echo "<script>alert('Select your country')</script>";
			}
			header("location:../views/form_register.php");
		}
		$check_data = "SELECT * FROM user WHERE email = '$email', username = '$username'";
		$run_data = mysqli_query($conn, $check_data);
		if (mysqli_num_rows($run_data)) {
			$succes = FALSE;
			echo "<script>alert('Email already exist, please try again!!!')</script>";
		}
		$password = password_hash ($password, PASSWORD_DEFAULT);
		$register = "INSERT INTO user SET full_name='$full_name', username='$username', email='$email', password='$password', gender='$gender', country='$country', status_login='$status_login', status_online='$status_online'";
		if (mysqli_query($conn, $register)) {
			echo "<script>alert('Registration succes')</script>";
			$chatting_room = "_chatting_rooms";
			$user_chatting_room = $username . $chatting_room;
			$table = "CREATE TABLE ".$user_chatting_room." (
				id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
				id_room int,
				FOREIGN KEY (id_room) REFERENCES chat_rooms(id_room)
			)";
			if ($conn->query($table) === TRUE) {
				$friends = "_friends";
				$user_friends = $username . $friends;
				$table = "CREATE TABLE ".$user_friends." (
					id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
					id_friends int,
					pfofile TEXT,
					FOREIGN KEY (id_friends) REFERENCES user(id_user)
				)";
				if ($conn->query($table) === TRUE){
					$succes = TRUE;
					echo "<script>window.open('../views/form_login.php', '_self');</script>";	
					// exit;
				}
				else{
					echo "<script>alert('cannot create table friends')</script>";
				}
			}
		}
		if ($succes === FALSE) {
			echo "<script>alert('Register failed')</script>";
			echo "<script>window.open('../views/form_register.php', '_self');</script>";	
			// exit();
		}
	}
	else {
		header("Location: ../views");
	}
?>