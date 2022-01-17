<?php
include '../../config.php';

$sql = $connect->query('select * from `type`');
$tmp = [];

header('Content-Type:application/json');

while($d = $sql->fetch_assoc())
{
	$tmp[] = $d;
}

echo json_encode([
	'data' => $tmp
]);