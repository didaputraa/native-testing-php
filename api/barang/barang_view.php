<?php
include '../../config.php';

$sql = $connect->query("SELECT b.*,t.nama as jenis 
					 FROM barang b,`type` t 
					 WHERE t.id = b.id_type");
$tmp = [];

header('Content-Type:application/json');

while($d = $sql->fetch_array()) {
	$tmp[] = $d;
}
echo json_encode([
	'data' => $tmp
]);