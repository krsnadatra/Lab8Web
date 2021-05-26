<?php 
include "akses.php"; 
include "head.php";

if (isset($_POST['tambah'])){
	if(updatebarangkeluar($_POST['notrans'], $_POST['tgl'], $_POST['jam'], $_POST['idbarang'],$_POST['jumlah'], ($_GET['id']))){
			header('location:barang_keluar.php');
	}else{
		echo "Maaf Update data gagal";
	}
}
$result=tampilbarangkeluar_per_id($_GET['id']);
while ($row=mysqli_fetch_assoc($result)) {

?>


<div class="body">
<br>
<center><p>Update Barang Keluar<p></center>
<br>
<div id="tabel">
<form action="" method="post">
	<table border="0" align="center" style="height:300;">
		<tr>
			<td>No Transaksi</td>
			<td><input type="number" name="notrans" value="<?php echo $row['no_trans'];?>"></td>
		</tr>

		<tr>
			<td>Tanggal</td>
			<td><input type="text" name="tgl" value="<?php echo $row['tgl'];?>"></td>
		</tr>

		<tr>
			<td>Jam</td>
			<td><input type="text" name="jam" value="<?php echo $row['jam'];?>"></td>
		</tr>

		<tr>
			<td>Id Barang</td>
			<td><input type="number" name="idbarang" value="<?php echo $row['id_barang'];?>"></td>
		</tr>

		<tr>
			<td>Jumlah</td>
			<td><input type="number" name="jumlah" value="<?php echo $row['jumlah_barang'];?>"></td>
		</tr>

		<tr>
			<td></td>
			<td><input type="submit" name="tambah" value="Update Data" class="tombol"></td>
		</tr>	
	</table>
</form>
<?php } ;?>
</div>
<?php include "foot.php";?>
<style type="text/css">
	p{
		font-size: 30px;
	}
	.body{
		background-color:white;
		height: 900px;
	}
	table{
		margin:5px auto;
		line-height: 40px;
	}

	.clear{
		clear: both;
	}

	.tombol{
		background-color: #0FC4D4;
		height: 30px;
		width: 80px;
		border:0px;
		border-radius: 10px;
		color: white;
	}

	.tombol:hover{
		background-color: #8FD8DE;
	}
</style>

