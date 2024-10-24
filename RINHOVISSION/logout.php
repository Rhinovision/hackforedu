<?php 
	session_start();
	include("acceso_bd.php");

	session_destroy();
	header("Location: index.php");
 ?>