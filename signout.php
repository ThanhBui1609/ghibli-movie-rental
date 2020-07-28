<?php
	session_start(); 
	session_destroy();
	setcookie ("accounts",  "",  time() - 3600);	
	header("Location: trangchu.html");
	
?>
