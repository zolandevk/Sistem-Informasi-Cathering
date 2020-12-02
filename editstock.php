<?php
$idpenjual = $_GET['idpenjual'];
$idmakanan = $_GET['idmak'];
include 'config.php';

$query = "SELECT * FROM makanan WHERE id_makanan='$idmakanan'";
$sql = mysqli_query($connect, $query);
$datamakanan = mysqli_fetch_array($sql);
$nama = $datamakanan['nama'];
$harga = $datamakanan['harga'];
$stock = $datamakanan['stock'];

if (ISSET($_POST['submit'])) {
	$namaafter =$_POST['nama'];
    $hargaafter =$_POST['harga'];
    $stockafter =$_POST['stock'];
    $idmak = $_POST['idmakan'];
    $idpenjual = $_POST['idpenjual'];

	$result = mysqli_query($connect, "UPDATE makanan SET id_penjual='$idpenjual', nama='$namaafter', harga='$hargaafter', stock='$stockafter' WHERE id_makanan='$idmak'");

	header("Location: penjualpage.php?id=$idpenjual");
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
		height: 40vh;
		position: relative;
		left: 20vh;
		top: 10vh;
		background-color: rgba(255, 255, 255, 0.9);
		border-radius: 20px;
		display: flex;
		flex-wrap: nowrap;
		justify-content: space-around;
		font-size: 15px;">

			<form action="editstock.php" method="post" style="
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
						<table width='100%' border="1">
						    <table border="0">
					            <tr> 
					                <td>Nama</td>
					                <td><input type="text" style="width: 100%" name="nama" value="<?php echo $nama;?>"></td>
					            </tr>
					            <tr> 
					                <td>Harga</td>
					                <td><input type="text" style="width: 100%" name="harga" value="<?php echo $harga;?>"></td>
					            </tr>
					            <tr> 
					                <td>Stock</td>
					                <td><input type="text" style="width: 100%" name="stock" value="<?php echo $stock;?>"></td>
					            </tr>
					            <tr>
					                <td><input type="hidden" name="idmakan" value=<?php echo $_GET['idmak'];?>></td>
					                <td><input type="hidden" name="idpenjual" value=<?php echo $_GET['idpenjual'];?>></td>
					            </tr>
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
				">Update</button>
			</form>
		</div>
	</section>
</main>
</body>
</html>