<?php
include "koneksi.php";
$hapus = mysqli_query($koneksi, "DELETE FROM tabel_produk_coffee WHERE kode_produk = '$_GET[idPengguna]'");
if($hapus){
    header("Location: tables_produk.php");
}
?>