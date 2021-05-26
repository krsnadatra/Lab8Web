<?php
session_start();
include "head.php";
include "akses.php";
if(isset($_POST['submit'])){
	if(barangmasuk($_POST['notrans'], $_POST['date'], $_POST['time'], $_POST['idbarang'], $_POST['idsup'], $_POST['jumlah'])){
		echo "<script language='javascript'>
			alert('DATA BARANG MASUK BERHASIL DITAMBAH')
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
<br>
<center><p>Tabel Barang Masuk</p></center>
<div id="tabel">
<form action="" method="post">
	<table class="tabel1">
		<tr>
			<td>No Transaksi</td>
			<td><input type="number" name="notrans" required> <i>* No Transaksi dibuat berdasarkan tgl bulan tahun dan nomor urut data ex : 25111501</i></td>
		</tr>

		<tr>
			<td>Tanggal</td>
			<td><input type="date" name="date" required></td>
		</tr>

		<tr>
			<td>Jam</td>
			<td><input type="time" name="time" required></td>
		</tr>

		<tr>
			<td>Nama Barang</td>
			<td><select name="idbarang"required>
					<option value=0 selected> </option>
				<?php
				$result=combomasuk();
				while ($row=mysqli_fetch_assoc($result)) {
				echo "<option value=$row[id_barang] selected>$row[nama_barang]</option>";
				}

				?>
			</select>
			</td>
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
			<td>Jumlah Barang</td>
			<td><input type="number" name="jumlah" required></td>
		</tr>


		<tr>
			<td></td>
			<td><input type="submit" name="submit" class="submit" value="Simpan"></td>
		</tr>
	</table>
</form>

<form action="" method="get">
<input type="search" name="cari" placeholder="Cari id barang" class="cari">
</form>
<br><br>
<form>
	<table border="1" cellspacing="0" class="tabel2">
		<tr bgcolor="#03A9F4" align="center">
			<td>No</td>
			<td>No Trans</td>
			<td>Tanggal</td>
			<td>Jam</td>
			<td>Id Barang</td>
			<td>Id Supplier</td>
			<td>Jumlah Barang</td>
			<td>Akses</td>
		</tr>

<?php
$no=1;
$result=tampilbarangmasuk();
if(isset($_GET['cari'])){
$result=hasil_cari_masuk($_GET['cari']);
}
while ($row=mysqli_fetch_assoc($result)) { ?>

		<tr>
			<td><?php echo $no;?></td>
			<td><?php echo $row['no_trans'];?></td>
			<td><?php echo $row['tgl'];?></td>
			<td><?php echo $row['jam'];?></td>
			<td><?php echo $row['id_barang'];?></td>
			<td><?php echo $row['id_supplier'];?></td>
			<td><?php echo $row['jumlah'];?></td>
			<td align="center"><a href="updatebarangmasuk.php?id= <?php echo $row['no_trans']; ?> "><img src="img/edit-black.png"></a> | 
			<a href="hapusdatamasuk.php?id= <?php echo $row['no_trans']; ?> "><img src="img/delete-black.png"></a></td>
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
		line-height: 30px;
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
