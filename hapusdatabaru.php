<?php
include "akses.php";

if(isset($_GET['id'])){
	if(hapusbarangbaru($_GET['id'])){
		header('location:barang_baru.php');
	}else{
		echo "Hapus data gagal";
	}
}


?>