<?php
session_start();
if(isset($_SESSION['id']))
{
	unset($_SESSION['id']);
	header('Location: http://localhost:8888/qminh/login.php');
}
?>
