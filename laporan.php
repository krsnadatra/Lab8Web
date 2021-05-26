<?php
session_start();
include 'akses.php';

if(@$_SESSION['admin']){
?>
<link rel="stylesheet" type="text/css" href="style.css">
<div id="wrap">
	<div id="head">
		<div id="pt">
		<center><img src="img/b.jpg" width="400" height="150"></center>
		<center><p class="aql">Aplikasi Pengadaan Barang PT AQL Furniture</p></center>
		</div>
	</div>
	<div id="menu">
		<ul>
			<li><a href="barang_baru.php">BARANG BARU</a></li>
			<li><a href="barang_masuk.php">BARANG MASUK</a></li>
			<li><a href="barang_keluar.php">BARANG KELUAR</a></li>
			<li><a href="supplier.php">DATA SUPPLIER</a></li>
			<li><a href="master.php">MASTER BARANG</a></li>
			<li><a href="laporan.php">LAPORAN</a></li>
			<li><a href="keluar.php"><img src="img/power-black.png"> KELUAR</a></li>
		</ul>
	</div>
	<div id="isi">
	<br>

		<div id="laporan">
			<iframe src="barang_baru_report.php"></iframe>
			<br><br>
			<iframe src="barang_masuk_report.php"></iframe>
			<br><br>
			<iframe src="barang_keluar_report.php"></iframe>
			<br><br>
			<iframe src="data_supplier_report.php"></iframe>
			<br><br>
			<iframe src="master_report.php"></iframe>
			<br><br>
		</div>


	</div>

	<div id="footer">
		<center><p style="color:white">&copy; PT AQL Furniture 2015 | Program di buat dengan Niat kemauan usaha & Doa</p></center>
	</div>
</div>
<?php
} else{
	header("location:login.php");
}
?>
<style type="text/css">

	*{
		padding: 0; margin: 0; font-family: sans-serif;
	}

	body{
		background-color: #92EF8C;
	}

	.aql{
		background-color:rgba(16,231,239,0.7);
		width: 700px;
		height: 40px;
	}

	#wrap{
		width: 1000;
		height: auto;
		border:0px solid black;
		margin: 5px auto;
	}

	#head{
		border:0px solid black;
		width: 1000;
		height: 200;
		background-color: #03A9F4;
		color: white;
	}

	#pt{
		padding: 10;
		font-size: 30;
	}

	#menu{
		border:0px solid black;
		width: 1000;
		height: 50;
		background-color: #03DEF4;
		color: white;
	}

	#menu ul li{
		float: left;
		list-style: none;
	}

	#menu ul li a{
		text-decoration: none;
		color: black;
	}

	#menu ul li{
		padding: 15px 10px 18px 15px;
	}

	#menu ul li:hover{
		background-color: #ABEAF1;
	}

	#menu ul li a:hover{
		color: white;
	}

	#isi{
		clear: both;
		width: 1000;
		height: auto;
		border:0px solid black;
		background-color: white;

	}

	#clear{
		clear: both;
	}
	#footer{
		background-color: #03A9F4;
		height: 24;
		padding: 10px;
	}
	#laporan{
		text-align: center;
	}

	iframe{
		width: 800px;
		height: 500px;
		border-radius: 20px;
		border: 5px solid #03A9F4;
	}
</style>