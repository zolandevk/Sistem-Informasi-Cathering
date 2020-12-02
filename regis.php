<?php
ob_start();
	if (ISSET($_POST['submit'])) {
		$nama = $_POST['nama'];
		$notelp = $_POST['notelp'];
		$alamat = $_POST['alamat'];

		include 'config.php';
		$sql = "INSERT INTO pelanggan VALUES('','$nama','$alamat','$notelp')";
		$result = mysqli_query($connect, $sql);
			
		if ($result){
		?>
		<script type="text/javascript">
			alert("Berhasil!");
			setTimeout(function () { window.location.href= 'index.php'; },50);
		</script>
		<?php
		};
	};
 ob_end_flush();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body style="
	padding: 0px;
	margin: 0px;
	font-family: 'serif';
">
<main>
	<section style="
			width: 100%;
			height: 100vh;
			padding: 0px;
			margin: 0px; 
			background-image: url(img/bg.jpg);
		">

		<div style="width: 80%; 
		height: 65vh;
		position: relative;
		left: 20vh;
		top: 10vh;
		background-color: rgba(255, 255, 255, 0.9);
		border-radius: 20px;
		display: flex;
		flex-wrap: nowrap;
		justify-content: space-around;
		font-size: 15px;">

			<form action="regis.php" method="post" style="
				background-color: rgba(200,2,40,0.3);
				padding: 10px;
				margin: 10px;
				border-radius: 20px;
				width: 60vh;
			">
				<h1 style="
					font-size: 25px;
					color: white;
					letter-spacing: 1px;
					font-weight: bold;
					text-align: center;
				">REGISTRASI PELANGGAN</h1>
				<ul style="
					list-style: none;
					font-family: serif;
					font-weight: bold;
					color: white;
				">
					<li style="">
						<label for="fnama">Nama Lengkap</label></br>
						<input type="text" name="nama" placeholder="Nama Lengkap" style="
							outline: none;
							border: none;
							border-radius: 10px;
							font-size: 17px;
							background-color: #f9f9f9;
							padding: 10px 15px 10px 15px;
							margin-top: 5px;
							margin-bottom: 10px;
							width: 85%;
						">
					</li>
					<li>
						<label for="fnama">Alamat</label></br>
						<input type="text" name="alamat" placeholder="Alamat" style="
							outline: none;
							border: none;
							border-radius: 10px;
							font-size: 17px;
							background-color: #f9f9f9;
							padding: 10px 15px 10px 15px;
							margin-top: 5px;
							margin-bottom: 10px;
							width: 85%;
						">
					</li>
					<li>
						<label for="fnama">No. Handphone</label></br>
						<input type="text" name="notelp" placeholder="No. Handphone" style="
							outline: none;
							border: none;
							border-radius: 10px;
							font-size: 17px;
							background-color: #f9f9f9;
							padding: 10px 15px 10px 15px;
							margin-top: 5px;
							margin-bottom: 10px;
							width: 85%;
						">
					</li>
					
					
				</ul>
				<button type="submit" name="submit" style="
					outline: none;
							border: none;
							border-radius: 10px;
							font-size: 17px;
							background-color: #f9f9f9;
							padding:5px 10px 5px 10px;
							margin-top: 5px;
							margin-bottom: 10px;
							width: 30vh;
							margin-left: 15vh;
							margin-right: 15vh;
							cursor: pointer;

				">Registrasi</button>
			</form>

		</div>

	</section>
</main>
</body>
</html>
