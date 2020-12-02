<?php
ob_start();
	if (ISSET($_POST['submit'])) {
		$username = $_POST['username'];
		$pass = $_POST['pass'];

		$password = md5($pass);

		include 'config.php';
		$sql = "SELECT * FROM penjual WHERE username = '$username' and password = '$password'";
		$result = mysqli_query($connect, $sql);
		$datapenjual = mysqli_fetch_array($result);
		
		// $id = md5($datapenjual['id_penjual']);
		$id = $datapenjual['id_penjual'];

		if ($datapenjual){
		header("Location: penjualpage.php?id=$id");
		};

		if(!$datapenjual){
		?>
		<script type="text/javascript">
			alert("Username atau Password salah!");
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
		height: 55vh;
		position: relative;
		left: 20vh;
		top: 10vh;
		background-color: rgba(255, 255, 255, 0.9);
		border-radius: 20px;
		display: flex;
		flex-wrap: nowrap;
		justify-content: space-around;
		font-size: 15px;">

			<form action="penjual.php" method="post" style="
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
				">LOGIN PENJUAL</h1>
				<ul style="
					list-style: none;
					font-family: serif;
					font-weight: bold;
					color: white;
				">
					<li style="">
						<label for="fusername">Username</label></br>
						<input type="text" name="username" placeholder="Nama Lengkap" style="
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
					<li style="">
						<label for="fusername">Password</label></br>
						<input type="password" name="pass" placeholder="Password" style="
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
				">Login</button>
			</form>
		</div>
	</section>
</main>
</body>
</html>