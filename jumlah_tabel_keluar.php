<?php
session_start();

include "akses.php";

$result=tampiljumlahkeluar();

?>
<div class="body">
<br>
<center><p>Tabel barang_keluar total</p></center>
<br>
<div id="tabel">
<form action="" method="post">
	<table border="1" cellspacing="0" class="tabel2" align="center">
		<tr bgcolor="#03A9F4" align="center">
			<td>No</td>
			<td>Id Barang</td>
			<td>Tanggal</td>
			<td>Nama Barang</td>
			<td>Harga Satuan</td>
			<td>Barang Keluar</td>

		</tr>

<?php
$no=1;
while ($row=mysqli_fetch_assoc($result)) { ?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $row['id_barang'];?></td>
			<td><?php echo $row['tgl'];?></td>
			<td><?php echo $row['nama_barang'];?></td>
			<td><?php echo $row['harga_satuan'];?></td>
			<td><?php echo $row['jumlah_barang'];?></td>

			<?php $no++;?>
		</tr>
		<?php }?>

	</table>
</form>
</div>
</div>
<div class="clear"/>


<?php include "foot.php";?>


<?php/*
	$sql = "SELECT barang_baru.id_barang, barang_baru.nama_barang, barang_baru.tgl, barang_baru.harga_satuan, barang_masuk.jumlah, barang_keluar.jumlah_barang, SUM(barang_masuk.jumlah) AS jumlah FROM barang_baru INNER JOIN barang_masuk ON barang_baru.id_barang=barang_masuk.id_barang INNER JOIN barang_keluar ON barang_baru.id_barang=barang_keluar.id_barang  group by barang_baru.id_barang";
	$result= mysqli_query($link, $sql) or die("Tampil data Gagal");
	return $result; */?>

	