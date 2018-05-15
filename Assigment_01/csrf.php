<?php
	//reply to the json request with the CSRF token save in the server side
	session_start();
	if(isset($_POST["request"]))
	{
		$data["token"]=$_SESSION['CSRF_Token'];
		echo json_encode($data);	
	}
?>