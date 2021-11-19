<?php
	session_start();
	if (isset($_SESSION["login"])) {
		header("Location: app_chat.php");
	}
	header("Location: form_login.php");
?>