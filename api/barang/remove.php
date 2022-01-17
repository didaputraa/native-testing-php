<?php
include '../../config.php';

$connect->query("DELETE FROM barang WHERE id={$_GET['id']}")or die($connect->error);