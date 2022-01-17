<?php
include '../../config.php';

if(isset($_POST))
{
	$connect->query("UPDATE barang SET 
		kode_barang = '$_POST[kode_barang]',
		nama_barang = '$_POST[nama_barang]',
		id_type		= '$_POST[type_barang]',
		keterangan  = '$_POST[keterangan]',
		harga_awal  = '$_POST[hAwal]',
		harga_jual  = '$_POST[hJual]'
		WHERE id='$_POST[id]'
	");
}