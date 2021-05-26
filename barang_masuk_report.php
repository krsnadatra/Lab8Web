<?php
include "akses.php";?>

<center><h2>Laporan Barang Masuk</h2></center>
Di cetak pada <script type="text/javascript" src="almanak.js"></script>
<form>

	<table border="1" cellspacing="0" class="tabel2" align="center">
		<tr bgcolor="#03A9F4" align="center">
			<td>No Trans</td>
			<td>Tanggal</td>
			<td>Jam</td>
			<td>Id Barang</td>
			<td>Id Supplier</td>
			<td>Jumlah Barang</td>
		</tr>

<?php
$result=tampilbarangmasuk();
while ($row=mysqli_fetch_assoc($result)) { ?>

		<tr>
			<td><?php echo $row['no_trans'];?></td>
			<td><?php echo $row['tgl'];?></td>
			<td><?php echo $row['jam'];?></td>
			<td><?php echo $row['id_barang'];?></td>
			<td><?php echo $row['id_supplier'];?></td>
			<td><?php echo $row['jumlah'];?></td>
		</tr>
		<?php }?>
		<input type="submit" name="submit" value="Cetak" class="cetak" onclick="window.print();">	
		<br><br>
	</table>
</form>


<style type="text/css">
	body{
		font-family: sans-serif;
	}
	#tabel{
		padding: 100px 10px;
	}


	.tabel2{
		width: 900px;
		line-height: 30px;
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
