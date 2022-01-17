<?php
include '../config.php';

$u   = htmlspecialchars($_POST['username']);
$p   = md5($_POST['password']);
$sql = $connect->query("SELECT * FROM user WHERE username='{$u}' && password='{$p}'");


header('Content-Type:application/json');

if($sql->num_rows == 1)
{
	session_start();
	$_SESSION['log-user'] = $sql->fetch_array();
	
	echo json_encode([
		'login' => true
	]);
}
else
{
	echo json_encode([
		'login' => false
	]);
}