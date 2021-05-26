<?php
session_start();
include "head.php";
include "akses.php";

$result=tampilmaster();

if(@$_SESSION['admin']){
?>
<div class="body">
<br>
<center><p>Tabel Pengadaan Barang</p></center>
<br>
<div id="tabel">
<form action="" method="post">
	<table border="1" cellspacing="0" class="tabel2">
		<tr bgcolor="#03A9F4" align="center">
			<td>Id Barang</td>
			<td>Tanggal</td>
			<td>Nama Barang</td>
			<td>Harga Satuan</td>
			<td>Barang Masuk</td>
			<td>Barang Keluar</td>
			<td>Total Stok</td>
		</tr>

<?php

while ($row=mysqli_fetch_assoc($result)) { ?>
<?php
$jumlah=$row['jumlah'];
$jumlah_barang=$row['jumlah_barang'];

$total=$jumlah-$jumlah_barang;
?>
		<tr>
			<td><?php echo $row['id_barang'];?></td>
			<td><?php echo $row['tgl'];?></td>
			<td><?php echo $row['nama_barang'];?></td>
			<td><?php echo $row['harga_satuan'];?></td>
			<td><?php echo $row['jumlah'];?></td>
			<td><?php echo $row['jumlah_barang'];?></td>
			<td><?php echo $total; ?></td>
		</tr>
		<?php }?>

	</table>
</form>
</div>
</div>
<div class="clear"/>


<?php include "foot.php";?>

<?php
} else{
	header("location:login.php");
}
?>
<?php/*
	$sql = "SELECT barang_baru.id_barang, barang_baru.nama_barang, barang_baru.tgl, barang_baru.harga_satuan, barang_masuk.jumlah, barang_keluar.jumlah_barang, SUM(barang_masuk.jumlah) AS jumlah FROM barang_baru INNER JOIN barang_masuk ON barang_baru.id_barang=barang_masuk.id_barang INNER JOIN barang_keluar ON barang_baru.id_barang=barang_keluar.id_barang  group by barang_baru.id_barang";
	$result= mysqli_query($link, $sql) or die("Tampil data Gagal");
	return $result; */?>

	<style type="text/css">
	p{
		font-size: 30px
	}
	.body{
		background-color:white;
		height: 900px;
	}
	#tabel{
		padding: 10px 10px;
	}

	.clear{
		clear: both;
	}

	.tabel1{
		line-height: 30px;
	}

	.tabel2{
		width: 100%;
		line-height: 30px;
		text-align: center;
	}

	.submit{
		background-color: #0FD40F;
		height: 30px;
		width: 80px;
		border:0px;
	}

	.submit:hover{
		background-color: #71E671;
	}
</style>