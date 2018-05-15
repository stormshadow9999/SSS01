<?php
	//loged out function
	session_start();
	session_unset();
	session_destroy();
	//destroy session and uset all the variables
	unset($_COOKIE['session_cookie']);
	setcookie('PHPSESSID', '', time() - 3600, '/');
    setcookie('session_cookie', '', time() - 3600, '/');

	header("Location:index.php");
   	exit;


?>