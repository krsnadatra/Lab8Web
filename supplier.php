<?php
session_start();
include "akses.php";
include "head.php";
if(isset($_POST['submit'])){
	if(tambahsupplier($_POST['idsup'], $_POST['date'], $_POST['nama'], $_POST['alamat'], $_POST['tlp'])){
		echo "<script language='javascript'>
			alert('DATA SUPPLIER MASUK BERHASIL DITAMBAH')
			</script>";
	}else{
		echo "<script language='javascript'>
			alert('Tambah Data Gagal')
			</script>";
	}
}

if(@$_SESSION['admin']){
?>

<div class="body">
<br>
<center><p>Tabel Data Supplier</p></center>
<div id="tabel">

<form action="supplier.php" method="post">
	<table class="tabel1">
		<tr>
			<td>Id Supplier</td>
			<td><input type="number" name="idsup" required></td>
		</tr>

		<tr>
			<td>Tgl Gabung</td>
			<td><input type="date" name="date" required></td>
		</tr>

		<tr>
			<td>Nama Supplier</td>
			<td><input type="text" name="nama" required></td>
		</tr>

		<tr>
			<td>Alamat</td>
			<td><input type="text" name="alamat" required></td>
		</tr>

		<tr>
			<td>Tlp</td>
			<td><input type="number" name="tlp" required></td>
		</tr>

		<tr>
			<td></td>
			<td><input type="submit" class="submit" name="submit" value="Simpan"></td>
		</tr>
	</table>
</form>
<form action="" method="get">
<input type="search" name="cari" placeholder="Cari nama supplier" class="cari">
</form>
<br><br>
<form>
	<table border="1" cellspacing="0" class="tabel2">
		<tr  bgcolor="#03A9F4" align="center">
			<td>No</td>
			<td>Id Supplier</td>
			<td>Tanggal Gabung</td>
			<td>Nama Supplier</td>
			<td>Alamat</td>
			<td>No Telepon</td>
			<td>Akses</td>
		</tr>

<?php
$no=1;
$result=tampilsupplier();
if(isset($_GET['cari'])){
$result=hasil_cari_sup($_GET['cari']);
}
while ($row=mysqli_fetch_assoc($result)) { ?>

		<tr>
			<td><?php echo $no;?></td>
			<td><?php echo $row['id_supplier'];?></td>
			<td><?php echo $row['tgl_gabung'];?></td>
			<td><?php echo $row['nama'];?></td>
			<td><?php echo $row['alamat'];?></td>
			<td><?php echo $row['tlp'];?></td>
			<td align="center"><a href="updatesupplier.php?id= <?php echo $row['id_supplier']; ?> "><img src="img/edit-black.png"></a> | 
			<a href="hapussupplier.php?id= <?php echo $row['id_supplier']; ?> "><img src="img/delete-black.png"></a></td>
		<?php $no++?>
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
<style type="text/css">
	.cari{
		float: right;
	}

	p{
		font-size: 30px;
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
		line-height: 40px;
		text-align: center;
	}

	.submit{
		background-color: #0FD40F;
		height: 30px;
		width: 100px;
		border:0px;
		color: white;
		border-radius: 10px;
	}

	.submit:hover{
		background-color: #71E671;
	}
</style>
