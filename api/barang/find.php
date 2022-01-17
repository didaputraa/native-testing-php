<?php
include '../../config.php';

$id = $_GET['id'];

$sql = $connect->query("SELECT * FROM barang WHERE id='{$id}' limit 1");

header('Content-Type:application/json');

echo json_encode([
	$sql->fetch_assoc()
]);