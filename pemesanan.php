<?php
ob_start();

	if (ISSET($_POST['submit'])){
		 include 'config.php';
		 $username = $_POST['nama'];
		 $menu = $_POST['menu'];
		 $totalbeli = $_POST['totalBeli'];

	switch ($menu) {
		case 'NLemak':
				$query = "SELECT * FROM makanan WHERE nama LIKE 'Nasi Lemak'";
				$sql = mysqli_query($connect, $query);
				$datamakanan = mysqli_fetch_array($sql);

				$menufix=$datamakanan['id_makanan'];
				$hargamakanan=$datamakanan['harga'];
				$stock=$datamakanan['stock'];
			break;
		case 'NAyam':
				$query = "SELECT * FROM makanan WHERE nama LIKE 'Nasi Ayam'";
				$sql = mysqli_query($connect, $query);
				$datamakanan = mysqli_fetch_array($sql);

				$menufix=$datamakanan['id_makanan'];
				$hargamakanan=$datamakanan['harga'];
				$stock=$datamakanan['stock'];
			break;
		case 'NGoreng':
				$query = "SELECT * FROM makanan WHERE nama LIKE 'Nasi Goreng'";
				$sql = mysqli_query($connect, $query);
				$datamakanan = mysqli_fetch_array($sql);

				$menufix=$datamakanan['id_makanan'];
				$hargamakanan=$datamakanan['harga'];
				$stock=$datamakanan['stock'];
			break;
		case 'SSemarang':
				$query = "SELECT * FROM makanan WHERE nama LIKE 'Soto Semarang'";
				$sql = mysqli_query($connect, $query);
				$datamakanan = mysqli_fetch_array($sql);

				$menufix=$datamakanan['id_makanan'];
				$hargamakanan=$datamakanan['harga'];
				$stock=$datamakanan['stock'];
			break;
		default:

			break;
	}

	 $query = "SELECT * FROM pelanggan WHERE full_name LIKE '%$username%'";
	 $sql = mysqli_query($connect, $query);
	 $datauser = mysqli_fetch_array($sql);

	 $pelanggan = $datauser['id_pelanggan'];
	 $totalharga = $totalbeli*$hargamakanan;
	 $stocknow = $stock-$totalbeli;
	 $timestamp = date('Y-m-d');

	 if($datauser) {
	 	$sql1 = "INSERT INTO transaksi VALUES('','$pelanggan','$menufix','$totalbeli', '$totalharga', '$timestamp')";
		 $result1 = mysqli_query($connect, $sql1);

		$sql2 = "UPDATE makanan SET stock='$stocknow' WHERE id_makanan=$menufix";
		 $result2 = mysqli_query($connect, $sql2);
				
		 if ($result1 and $result2){
		 ?>
		 <script type="text/javascript">
			alert("Pesanan Berhasil!\nSilahkan melakukan pembayaran melalui OVO di 082235451766.");
			window.location.href= 'index.php';
		 </script>
		 <?php
		 };
	 }
 	}
 ob_end_flush();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
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
		height: 60vh;
		position: relative;
		left: 20vh;
		top: 10vh;
		background-color: rgba(255, 255, 255, 0.9);
		border-radius: 20px;
		display: flex;
		flex-wrap: nowrap;
		justify-content: space-around;
		font-size: 15px;">

			<form action="pemesanan.php" method="post" style="
				background-color: rgba(200,20,40,0.3);
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
				">PEMESANAN CATHERING</h1>
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
					<li style="
				 		font-size: 15px;
				 		font-weight: bold;
				 		margin-bottom: 10px;
				 		margin-top: 5px;
				 	">
				 		<label for="fmenu">Pilih Menu</label><br>
				 		<select class="select" name="menu" style="
				 			width: 90%;
				 			outline: none;
				 			border: none;
				 			padding: 10px 15px 10px 15px;
				 			border-radius: 10px;
				 			cursor: pointer;
				 			background-color: #f9f9f9;
				 			margin-top: 5px;
				 		">
				 			<optgroup label="Menu Cathering">
				 				<option value="NLemak">Nasi Lemak</option>
				 				<option value="NAyam">Nasi Ayam</option>
				 				<option value="NGoreng">Nasi Goreng</option>
				 				<option value="SSemarang">Soto Semarang</option>
				 			</optgroup>
				 		</select>
				 	</li>
				 	<li style="">
						<label for="fjumlah">Jumlah beli</label></br>
						<input type="number" name="totalBeli" placeholder="Jumlah Beli" style="
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

				">Pesan</button>
			</form>

		</div>

	</section>
</main>
</body>
</html>