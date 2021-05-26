<?php 
include "akses.php"; 
include "head.php";

if (isset($_POST['tambah'])){
	if(updatesupplier($_POST['idsup'], $_POST['tgl'], $_POST['nama'], $_POST['alamat'],$_POST['tlp'], ($_GET['id']))){
			header('location:supplier.php');
	}else{
		echo "Maaf Update data gagal";
	}
}
$result=tampilsupplier_per_id($_GET['id']);
while ($row=mysqli_fetch_assoc($result)) {

?>

<div class="body">
<br>
<center><p>Update Barang Masuk<p></center>
<br>
<div id="tabel">
<form action="" method="post">
	<table border="0" align="center" style="height:300;">
		<tr>
			<td>Id Supplier</td>
			<td><input type="number" name="idsup" value="<?php echo $row['id_supplier'];?>"></td>
		</tr>

		<tr>
			<td>Tanggal Gabung</td>
			<td><input type="date" name="tgl" value="<?php echo $row['tgl_gabung'];?>"></td>
		</tr>

		<tr>
			<td>Nama Supplier</td>
			<td><input type="text" name="nama" value="<?php echo $row['nama'];?>"></td>
		</tr>

		<tr>
			<td>Alamat Supplier</td>
			<td><input type="text" name="alamat" value="<?php echo $row['alamat'];?>"></td>
		</tr>

		<tr>
			<td>Telpon</td>
			<td><input type="number" name="tlp" value="<?php echo $row['tlp'];?>"></td>
		</tr>

		<tr>
			<td></td>
			<td><input type="submit" class="tombol" name="tambah" value="Update Data"></td>
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