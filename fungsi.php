<?php
function tambahbarang($notrans ,$date, $idbarang, $idsup, $nama, $harga){
	global $link;

	$query="INSERT INTO barang_baru(no_trans,tgl,id_barang,id_supplier,nama_barang,harga_satuan)
	VALUES ('$notrans' ,'$date', '$idbarang', '$idsup', '$nama', '$harga')";
	if(mysqli_query($link,$query) or die("Tambah data dagal, Id barang telah digunakan")){
		return true;
	}else{
		return false;
	}
}

function barang_keluar($notrans ,$date, $time, $idbarang, $jumlah){
	global $link;

	$query="INSERT INTO barang_keluar(no_trans,tgl,jam,id_barang,jumlah_barang)
	VALUES ('$notrans' ,'$date','$time', '$idbarang', '$jumlah')";
	if(mysqli_query($link,$query) or die("Tambah data gagal")){
		return true;
	}else{
		return false;
	}
}

function barangmasuk($notrans ,$date, $time, $idbarang, $idsup, $jumlah){
	global $link;

	$query="INSERT INTO barang_masuk(no_trans,tgl,jam,id_barang,id_supplier,jumlah)
	VALUES ('$notrans' ,'$date', '$time', '$idbarang', '$idsup', '$jumlah')";
	if(mysqli_query($link,$query) or die("Tambah data dagal, No Transaksi telah digunakan")){
		return true;
	}else{
		return false;
	}
}

function tambahsupplier($idsup ,$date, $nama, $alamat, $tlp){
	global $link;

	$query="INSERT INTO data_supplier(id_supplier,tgl_gabung,nama,alamat,tlp)
	VALUES ('$idsup' ,'$date', '$nama', '$alamat', '$tlp')";
	if(mysqli_query($link,$query) or die("Tambah data dagal, Id barang telah digunakan")){
		return true;
	}else{
		return false;
	}
}

function combo(){
	global $link;

	$query= "SELECT * FROM data_supplier";
	$result= mysqli_query($link, $query) or die("Tampil data Gagal");
	return $result;
}

function combomasuk(){
	global $link;

	$query= "SELECT * FROM barang_baru";
	$result= mysqli_query($link, $query) or die("Tampil data Gagal");
	return $result;
}

function tampilbarangmasuk(){
	global $link;

	$query= "SELECT * FROM barang_masuk";
	$result= mysqli_query($link, $query) or die("Tampil data Gagal");
	return $result;
}

function tampilbarangkeluar(){
	global $link;

	$query= "SELECT * FROM barang_keluar";
	$result= mysqli_query($link, $query) or die("Tampil data Gagal");
	return $result;
}

function tampilbarangbaru(){
	global $link;

	$query= "SELECT * FROM barang_baru";
	$result= mysqli_query($link, $query) or die("Tampil data Gagal");
	return $result;
}

function tampilsupplier(){
	global $link;

	$query= "SELECT * FROM data_supplier";
	$result= mysqli_query($link, $query) or die("Tampil data Gagal");
	return $result;
}

function tampilmaster(){
	global $link;

	$sql= "SELECT barang_baru.id_barang, barang_keluar.tgl, barang_baru.nama_barang, barang_baru.harga_satuan, barang_masuk.jumlah, barang_keluar.jumlah_barang, SUM(barang_masuk.jumlah) AS jumlah FROM barang_baru INNER JOIN barang_masuk ON barang_baru.id_barang=barang_masuk.id_barang INNER JOIN barang_keluar ON barang_baru.id_barang=barang_keluar.id_barang GROUP BY barang_baru.id_barang";
	$result=mysqli_query($link,$sql) or die("Tampil data gagal yah");
	return $result;

}

function tampiljumlahkeluar(){
	global $link;

	$sql= "SELECT barang_baru.id_barang, barang_keluar.tgl, barang_baru.nama_barang, barang_baru.harga_satuan, barang_keluar.jumlah_barang, SUM(barang_keluar.jumlah_barang) AS jumlah_barang FROM barang_baru INNER JOIN barang_keluar ON barang_baru.id_barang=barang_keluar.id_barang GROUP BY barang_baru.id_barang";
	$result=mysqli_query($link,$sql) or die("Tampil data gagal yah");
	return $result;

}

function tampilbarangbaru_per_id($id){
	global $link;

	$query= "SELECT * FROM barang_baru WHERE id_barang=$id";
	$result= mysqli_query($link, $query) or die("Update data Gagal");
	return $result;
}

function tampilbarangmasuk_per_id($id){
	global $link;

	$query= "SELECT * FROM barang_masuk WHERE no_trans=$id";
	$result= mysqli_query($link, $query) or die("Update data Gagal");
	return $result;
}

function tampilbarangkeluar_per_id($id){
	global $link;

	$query= "SELECT * FROM barang_keluar WHERE no_trans=$id";
	$result= mysqli_query($link, $query) or die("Update data Gagal");
	return $result;
}

function tampilsupplier_per_id($id){
	global $link;

	$query= "SELECT * FROM data_supplier WHERE id_supplier=$id";
	$result= mysqli_query($link, $query) or die("Update data Gagal");
	return $result;
}

function updatebarangbaru($notrans, $tgl, $idbarang, $idsup, $namabarang, $harga, $id){
	global $link;

	$query="UPDATE barang_baru SET no_trans='$notrans', tgl='$tgl', id_barang='$idbarang', id_supplier='$idsup', nama_barang='$namabarang', harga_satuan='$harga'
	WHERE id_barang='$id'";
	if(mysqli_query($link,$query) or die("Update Data Gagal")){
		return true;
	}else{
		return false;
	}
}

function updatebarangmasuk($notrans, $tgl, $jam, $idbarang, $idsup, $jumlah, $id){
	global $link;

	$query="UPDATE barang_masuk SET no_trans='$notrans', tgl='$tgl', jam='$jam', id_barang='$idbarang', id_supplier='$idsup', jumlah='$jumlah'	 
	WHERE no_trans='$id'";
	if(mysqli_query($link,$query) or die("Update Data Gagal mah")){
		return true;
	}else{
		return false;
	}
}

function updatebarangkeluar($notrans, $tgl, $jam, $idbarang, $jumlah, $id){
	global $link;

	$query="UPDATE barang_keluar SET no_trans='$notrans', tgl='$tgl', jam='$jam', id_barang='$idbarang', jumlah_barang='$jumlah'	 
	WHERE no_trans='$id'";
	if(mysqli_query($link,$query) or die("Update Data Gagal mah")){
		return true;
	}else{
		return false;
	}
}

function updatesupplier($idsup, $tgl, $nama, $alamat, $tlp, $id){
	global $link;

	$query="UPDATE data_supplier SET id_supplier='$idsup', tgl_gabung='$tgl', nama='$nama', alamat='$alamat', tlp='$tlp'	 
	WHERE id_supplier='$id'";
	if(mysqli_query($link,$query) or die("Update Data Gagal mah")){
		return true;
	}else{
		return false;
	}
}

function hapusbarangbaru($id){
	global $link;

	$query="DELETE FROM barang_baru WHERE id_barang=$id"; 
	if(mysqli_query($link,$query) or die("Hapus data gagal") ){
		return true;
	}else{
		return false;
	}
}

function hapusbarangmasuk($id){
	global $link;

	$query="DELETE FROM barang_masuk WHERE no_trans=$id"; 
	if(mysqli_query($link,$query) or die("Hapus data gagal") ){
		return true;
	}else{
		return false;
	}
}

function hapusbarangkeluar($id){
	global $link;

	$query="DELETE FROM barang_keluar WHERE no_trans=$id"; 
	if(mysqli_query($link,$query) or die("Hapus data gagal") ){
		return true;
	}else{
		return false;
	}
}

function hapussupplier($id){
	global $link;

	$query="DELETE FROM data_supplier WHERE id_supplier=$id"; 
	if(mysqli_query($link,$query) or die("Hapus data gagal") ){
		return true;
	}else{
		return false;
	}
}

function hasil_cari($cari){
	global $link;
	$query="SELECT * FROM barang_baru where nama_barang LIKE '%$cari%'";
	if($result=mysqli_query($link, $query) or die('Akses Gagal')){
		return $result;
}
}

function hasil_cari_masuk($cari){
	global $link;
	$query="SELECT * FROM barang_masuk where id_barang LIKE '%$cari%'";
	if($result=mysqli_query($link, $query) or die('Akses Gagal')){
		return $result;
}
}

function hasil_cari_keluar($cari){
	global $link;
	$query="SELECT * FROM barang_keluar where id_barang LIKE '%$cari%'";
	if($result=mysqli_query($link, $query) or die('Akses Gagal')){
		return $result;
}
}

function hasil_cari_sup($cari){
	global $link;
	$query="SELECT * FROM data_supplier where nama LIKE '%$cari%'";
	if($result=mysqli_query($link, $query) or die('Akses Gagal')){
		return $result;
}
}

function result($query){
	global $link;
	if($result=mysqli_query($link, $query) or die('Akses Gagal')){
		return $result;
	}
}
?>