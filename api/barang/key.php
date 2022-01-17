<?php
include '../../config.php';

header('Content-Type:application/json');

if(isset($_GET['item']))
{
	$result = $connect->query("SELECT kode_barang from barang WHERE kode_barang ='$_GET[item]'")->num_rows;
	
	if($result == 0) {
		
		echo json_encode([
			'error' => false
		]);
		
	} else {
		
		echo json_encode([
			'error' => true
		]);
		
	}
}
else
{
	echo json_encode([
		'error' => true
	]);
}