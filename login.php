<?php
session_start();
mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_select_db("aql") or die (mysql_error());

$user=@$_POST['nama'];
$pass=@$_POST['password'];
$login=@$_POST['login'];

if(isset($_POST['login'])){
	if($user=="" || $pass=="") {
		echo "<script type='text/javascript'>alert('Username / Password tidak boleh kosong')</script>";
	} else {
		$sql = mysql_query(" SELECT * FROM login WHERE nama='$user' and password=md5('$pass') ") or die(mysql_error());
		$data =mysql_fetch_array($sql);
		$cek = mysql_num_rows($sql);
		if($cek >= 1){ 
			if($data['level']=="admin") {$_SESSION['admin']=$data['id_login']; header("location:barang_baru.php");}
			elseif($data['level']=="user") {$_SESSION['user']=$data['id_login']; header("location:barang_baru.php");}

		}	else{echo "login gagal";}

 	}
}


?>


<div id="wrap">
	<div id="login">

		<form action="" method="post">
		<table>
			<tr>
				<td>User</td>
				<td><input type="text" name="nama" placeholder="admin" required></td>
			</tr>

			<tr>
				<td>Password</td>
				<td><input type="password" name="password" required placeholder="admin"></td>
			</tr>

			<tr>
				<td colspan="2"><input type="submit" name="login" value="Login" class="tombol"></td>
			</tr>
		</table>
		</form>
	</div>
</div>

<style type="text/css">
	*{
		padding: 0; margin: 0; font-family: sans-serif;
	}

	img{
		border-radius: 10px;
	}

	body{
		background:url(img/a.jpg);
		background-repeat: no-repeat;
		background-size: 100%;
	}

	#wrap{
		border-color: 1px solid black;
		width: 500px;
		height: 300px;
		margin: 5px auto;
		padding: 160 60 10 60;
	}

	#login{
		border-color: 1px solid black;
		width: 500px;
		height: 250px;
		background-color: #2196F3;
		padding: 10px 20px 60px 20px;
		border-radius: 50px;
	}

	table{
		border:0px solid black;
		margin :5px auto;
		height: 200px;
		width: 300px;
		font-size: 20px;
		color: white;
	}

	.tombol{
		width: 280;
		height: 40;
		background-color:#00D424;
		color: white;
		font-size: 20px;
		border-radius: 10px;
		border: 0px;
	}

	.tombol:hover{
		background-color: #00D47C;
	}
</style>