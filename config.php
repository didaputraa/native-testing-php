<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db	  = 'testing_native';

$base_url = "http://{$host}/testing/working/native-testing";

try
{
	$connect = @new mysqli($host, $user, $pass, $db);
	
	if($connect->connect_errno)
	{
		throw new Exception($connect->connect_error);
	}
}
catch(Exception $e)
{
	ob_end_clean();
	echo"<h3 align='center'>{$e->getMessage()}</h3>";
	exit;
}