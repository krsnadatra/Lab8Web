<?php
include "akses.php";

if(isset($_GET['id'])){
	if(hapussupplier($_GET['id'])){
		header('location:supplier.php');
	}else{
		echo "Hapus data gagal";
	}
}


?>