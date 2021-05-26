<?php
include "akses.php";

if(isset($_GET['id'])){
	if(hapusbarangkeluar($_GET['id'])){
		header('location:barang_keluar.php');
	}else{
		echo "Hapus data gagal";
	}
}


?>