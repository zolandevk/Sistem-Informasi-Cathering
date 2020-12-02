<?php
$idpenjual = $_GET['idpenjual'];
$idtrans = $_GET['idtrans'];
include 'config.php';

$result = mysqli_query($connect, "DELETE FROM transaksi WHERE id_transaksi=$idtrans");

if($result){
header("Location: penjualpage.php?id=$idpenjual");
}
?>