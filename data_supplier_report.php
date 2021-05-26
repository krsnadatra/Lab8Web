<?php
include "akses.php";

?>
<center><h2>Laporan Data Supplier</h2></center>
Di cetak pada <script type="text/javascript" src="almanak.js"></script>
<form>
	<table border="1" cellspacing="0" class="tabel2" align="center">
		<tr  bgcolor="#03A9F4" align="center">
			<td>No</td>
			<td>Id Supplier</td>
			<td>Tanggal Gabung</td>
			<td>Nama Supplier</td>
			<td>Alamat</td>
			<td>No Telepon</td>
		</tr>

<?php
$no=1;
$result=tampilsupplier();
while ($row=mysqli_fetch_assoc($result)) { ?>

		<tr>
			<td align="center"><?php echo $no; ?></td>
			<td><?php echo $row['id_supplier'];?></td>
			<td><?php echo $row['tgl_gabung'];?></td>
			<td><?php echo $row['nama'];?></td>
			<td><?php echo $row['alamat'];?></td>
			<td><?php echo $row['tlp'];?></td>
		</tr>
		<?php $no++;?>
		<?php }?>
		<input type="submit" name="submit" value="Cetak" class="cetak" onclick="window.print();">
		<br><br>
	</table>
</form>
</div>
</div>

<style type="text/css">
	body{
		font-family: sans-serif;
	}
	#tabel{
		padding: 100px 10px;
	}

	.clear{
		clear: both;
	}

	.tabel1{
		line-height: 30px;
	}

	.tabel2{
		width: 900px;
		line-height: 40px;
	}

	.cetak{
		background-color: #0FD4AD;
		height: 30px;
		width: 80px;
		border:0px;
		border-radius: 10px;
	}

	.cetak:hover{
		background-color: #95DACC;
	}
</style>
