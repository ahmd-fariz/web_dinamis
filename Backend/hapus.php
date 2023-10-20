<?php
include "koneksi.php";
$hapus = mysqli_query($koneksi, "DELETE FROM dataPengguna WHERE idPengguna = '$_GET[idPengguna]'");
if($hapus){
    header("Location: tables.php");
}
