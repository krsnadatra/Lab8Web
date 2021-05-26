<?php 
include "head.php";
include "akses.php"; 

if (isset($_POST['tambah'])){
	if(updatebarangbaru($_POST['notrans'], $_POST['tgl'], $_POST['idbarang'], $_POST['idsup'], $_POST['namabarang'], $_POST['harga'], ($_GET['id']))){
			header('location:barang_baru.php');
	}else{
		echo "Maaf Update data gagal";
	}
}
$result=tampilbarangbaru_per_id($_GET['id']);
while ($row=mysqli_fetch_assoc($result)) {

?>


<div class="body">
<br>
<center><p>Update Barang Baru<p></center>
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
			<td><input type="text" name="tgl" value="<?php echo $row['tgl'];?>" required ></td>
		</tr>

		<tr>
			<td>Id Barang</td>
			<td><input type="number" name="idbarang" value="<?php echo $row['id_barang'];?>"></td>
		</tr>

		<tr>
			<td>Id Supplier</td>
			<td><input type="text" name="idsup" required size="40" value="<?php echo $row['id_supplier'];?>"></td>
		</tr>

		<tr>
			<td>Nama Barang</td>
			<td><input type="text" name="namabarang" value="<?php echo $row['nama_barang'];?>"></td>
		</tr>

		<tr>
			<td>Harga Satuan</td>
			<td><input type="number" name="harga" required size="40" value="<?php echo $row['harga_satuan'];?>"></td>
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