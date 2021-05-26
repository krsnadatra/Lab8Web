<?php
include "akses.php";

if(isset($_GET['id'])){
	if(hapusbarangmasuk($_GET['id'])){
		header('location:barang_masuk.php');
	}else{
		echo "Hapus data gagal";
	}
}


?>