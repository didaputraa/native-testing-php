<?php
include '../../config.php';

$connect->query("INSERT INTO barang VALUES (NULL,
		'$_POST[kode_barang]', 
		'$_POST[nama_barang]',
		'$_POST[type_barang]', 
		'$_POST[hAwal]', 
		'$_POST[hJual]', 
		'$_POST[keterangan]', 1)");