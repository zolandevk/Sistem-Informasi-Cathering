<?php
$id = $_GET['id'];
include 'config.php';

$query = "SELECT * FROM makanan ORDER BY id_makanan DESC";
$sql = mysqli_query($connect, $query);

$query2 = "SELECT * FROM transaksi ORDER BY id_transaksi";
$sql2 = mysqli_query($connect, $query2);

if (ISSET($_POST['submit'])) {
	?>
	<script type="text/javascript">
		alert("Berhasil Logout!");
		window.location.href= 'index.php';
	 </script>
	 <?php
}
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
		height: 80vh;
		position: relative;
		left: 10vh;
		top: 10vh;
		background-color: rgba(255, 255, 255, 0.9);
		border-radius: 20px;
		display: flex;
		flex-wrap: nowrap;
		justify-content: space-around;
		font-size: 15px;">

			<form action="penjualpage.php" method="post" style="
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
				">EDIT STOCK</h1>
				<ul style="
					list-style: none;
					font-family: serif;
					font-weight: bold;
					color: white;
				">
					<li style="">
						<table width='90%' border="1">
						    <tr>
						        <th>Nama</th> <th>Harga</th> <th>Stock</th> <th>Update</th>
						    </tr>
						    <?php  
						    while($datamakanan = mysqli_fetch_array($sql)) {
						        echo "<tr>";
						        echo "<td>".$datamakanan['nama']."</td>";
						        echo "<td>".$datamakanan['harga']."</td>";
						        echo "<td>".$datamakanan['stock']."</td>";    
						        echo "<td><a href='editstock.php?idmak=$datamakanan[id_makanan]&idpenjual=$id'>Edit</a></td></tr>";        
						    }
						    ?>
						    </table>
					</li>
				</ul>

				<h1 style="
					font-size: 25px;
					color: white;
					letter-spacing: 1px;
					font-weight: bold;
					text-align: center;
				">Data Transaksi</h1>
				<ul style="
					list-style: none;
					font-family: serif;
					font-weight: bold;
					color: white;
				">
					<li style="">
						<table width='100%' border="1">
						    <tr>
						        <th>Nama Pelanggan</th> <th>Nama Makanan</th> <th>Total Beli</th> <th>Total harga</th> <th>Hapus Transaksi</th>
						    </tr>
						    <?php  
						    while($datatransaksi = mysqli_fetch_array($sql2)) {  
						    	$idpel = $datatransaksi['id_pelanggan'];
						    	$idmak = $datatransaksi['id_makanan'];

						    	$queryPEL = "SELECT * FROM pelanggan WHERE id_pelanggan = $idpel";
								$sqlPEL = mysqli_query($connect, $queryPEL);
								$dataPEL = mysqli_fetch_array($sqlPEL);

								$queryMAK = "SELECT * FROM makanan WHERE id_makanan = $idmak";
								$sqlMAK = mysqli_query($connect, $queryMAK);
								$dataMAK = mysqli_fetch_array($sqlMAK);

						        echo "<tr>";
						        echo "<td>".$dataPEL['full_name']."</td>";
						        echo "<td>".$dataMAK['nama']."</td>";
						        echo "<td>".$datatransaksi['total_beli']."</td>";
						        echo "<td>".$datatransaksi['total_harga']."</td>";
						        echo "<td><a href='deletetrans.php?idtrans=$datatransaksi[id_transaksi]&idpenjual=$id'>Delete</a></td>";
						        echo "</tr>";        
						    }
						    ?>
						    </table>
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
				">Logout</button>
			</form>
		</div>
	</section>
</main>
</body>
</html>