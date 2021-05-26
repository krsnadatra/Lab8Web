<div id="wrap">
<div id="header"></div>
	<div id="isi">
			<div class="kol1" id="satu">kolom 1</div>
			<div class="kol1" id="dua"> kolom 2</div>
			<div class="kol1" id="tiga">kolom 3</div>

			<div class="kol2" id="satu">kolom 1</div>
			<div class="kol2" id="dua"> kolom 2</div>
			<div class="kol2" id="tiga">kolom 3</div>
			
	</div>

<div id="footer"></div>
</div>

<style type="text/css">
	*{
		padding: 0; margin: 0; font-family: sans-serif;
	}
	

	#header{
		background-color: red;
		height: 80px;
		width: 100%
	}

	#wrap{
		border:1px solid black;
		width: 1350px;
		height: 700px;
	}

	#isi{
		margin: 5px 5px 5px 5px;
		padding: 5px 20px 10px 10px;
	}



	#satu{
		background-color: red;
	}

	#dua{
		background-color: yellow;
	}

	#tiga{
		background-color: blue;
	}

	.kol1{
	width: 25%;
	height: 200px;
	background-color: green;
	float: left;
	margin: 3%;
	border-radius: 20px;
	}

	.kol2{
	width: 25%;
	height: 200px;
	background-color: green;
	float: left;
	margin: 3%;
	border-radius: 20px;
	}

	#footer{
		clear: both;
		background-color: red;
		height: 80px;
		width: 100%
	}


</style>