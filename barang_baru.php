<?php
session_start();
include "head.php";

include "akses.php";



if(isset($_POST['submit'])){
	if(tambahbarang($_POST['notrans'],$_POST['date'], $_POST['idbarang'], $_POST['idsup'], $_POST['nama'], $_POST['harga'])){
		echo "<script language='javascript'>
			alert('DATA BARANG BERHASIL DITAMBAH')
			</script>";
	}else{
		echo "<script language='javascript'>
			alert('Tambah Data Gagal')
			</script>";
	}
}

if(@$_SESSION['admin'] || @$_SESSION['user']){
?>
<div class="body">
<br><div id="tabel">
<center><p>Tabel Barang Baru</p></center>
<br>
<form action="" method="post">
	<table class="tabel1">

		<tr>
			<td>No Transaksi</td>
			<td><input type="number" name="notrans" required/>
			<i>* No Transaksi dibuat berdasarkan tgl bulan tahun dan nomor urut data ex : 25111501</i></td>
		</tr>

		<tr>
			<td>Tanggal</td>
			<td><input type="date" name="date" required></td>
		</tr>

		<tr>
			<td>Id Barang baru</td>
			<td><input type="number" name="idbarang" required>
			<i>* 12 : Kode Kursi, 13 : Kode Meja + tgl + bulan + nomor urut (001 dst) ex : 122511001</i></td>
		</tr>

		<tr>
			<td>Nama Supplier</td>
			<td><select name="idsup" required>
					<option value=0 selected> </option>
				<?php
				$result=combo();
				while ($row=mysqli_fetch_assoc($result)) {
				echo "<option value=$row[id_supplier] selected>$row[nama]</option>";
				}

				?>
			</select>
			</td>
		</tr>

		<tr>
			<td>Nama Barang</td>
			<td><input type="text" name="nama" required></td>
		</tr>

		<tr>
			<td>Harga Satuan</td>
			<td><input type="number" name="harga" required></td>
		</tr>


		<tr>
			<td></td>
			<td><input type="submit" class="submit" name="submit" value="Simpan"></td>
		</tr>
	</table>
</form>
 

<?php
$result=tampilbarangbaru();
if(isset($_GET['cari'])){
$result=hasil_cari($_GET['cari']);
}

?>
<form action="" method="get">
<input type="search" name="cari" placeholder="Cari nama barang" class="cari">
</form>
<br><br>
<form action="" method="post">
	<table border="1" cellspacing="0" class="tabel2">
		<tr bgcolor="#03A9F4" align="center">
			<td>No</td>
			<td>No Trans</td>
			<td>Tanggal</td>
			<td>Id Barang</td>
			<td>Id Supplier</td>
			<td>Nama Barang</td>
			<td>Harga Barang</td>
			<td>Akses</td>
		</tr>

<?php

$no=1;
while ($row=mysqli_fetch_assoc($result)) { ?>

		<tr>
			<td><?php echo $no;?></td>
			<td><?php echo $row['no_trans'];?></td>
			<td><?php echo $row['tgl'];?></td>
			<td><?php echo $row['id_barang'];?></td>
			<td><?php echo $row['id_supplier'];?></td>
			<td><?php echo $row['nama_barang'];?></td>
			<td><?php echo $row['harga_satuan'];?></td>
			<td align="center"><a href="updatebarangbaru.php?id= <?php echo $row['id_barang']; ?> "><img src="img/edit-black.png"></a> | 
			<a href="hapusdatabaru.php?id= <?php echo $row['id_barang']; ?> "><img src="img/delete-black.png"></a></td>
			<?php $no++;?>
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
	header('location:login.php');
}
?>

<style type="text/css">
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
		text-align: center;
		line-height: 30px;
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

	.cari{
		float: right;
	}
</style>
