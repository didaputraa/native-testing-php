<?php
include 'config.php';

session_start();

if(isset($_SESSION['log-user']))
{
	$action = @$_GET['action'];

	if(isset($action)) {
		
		$path = "module/{$action}/view.php";
		
		include 'layout.php';
	}else{
		
		header('location:index.php?action=home');
	}
}
else
{
	unset($_SESSION['log-user']);
	header('location:login.php');
}