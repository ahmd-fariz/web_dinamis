<?php
include "koneksi.php";
$result = mysqli_query($koneksi, "SELECT * FROM tabel_produk_coffee WHERE kode_produk='$_GET[kode_produk]'");
while ($data = mysqli_fetch_array($result)) {
    $stok = $data['stok_produk'];
    $jenis = $data['jenis_produk'];
    $harga = $data['harga_produk']; 
    $deskripsi = $data['deskripsi_produk'];
}
?>

<?php
include "koneksi.php";
if (isset($_POST['submit'])) {
    $kodeProduk = $_GET['kode_produk'];
    $stok = $_POST['stok'];
    $jenis = $_POST['jenis'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $foto = $_POST['foto_produk'];

    $edit = mysqli_query($koneksi, "UPDATE tabel_produk_coffee set stok_produk='$stok', jenis_produk='$jenis', harga_produk='$harga', deskripsi_produk='$deskripsi', foto_produk='$foto' WHERE kode_produk = '$kodeProduk'");
    if ($edit) {
        header("Location: tables_produk.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Page Title - SB Admin</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Edit Data</h3>
                                </div>
                                <div class="card-body">
                                    <form method="post">
                                        <div class="form-group"><label class="small mb-1" for="inputUsernameAddress">Stok</label><input class="form-control py-4" id="inputNameAddress" type="Name" placeholder="Enter Stok Produk" name="stok" value="<?= @$stok ?>" /></div>
                                        <div class="form-group"><label class="small mb-1" for="inputNameAddress">Jenis</label><input class="form-control py-4" id="inputUsernameAddress" type="Username" placeholder="Enter Jenis Produk" name="jenis" value="<?= @$jenis ?>" /></div>
                                        <div class="form-group"><label class="small mb-1" for="inputPassword">Harga</label><input class="form-control py-4" id="inputPassword" type="text" placeholder="Enter Harga" name="harga" value="<?= @$harga ?>" /></div>
                                        <div class="form-group"><label class="small mb-1" for="inputPassword">Deskripsi</label><input class="form-control py-4" id="inputPassword" type="text" placeholder="Enter Deskripsi" name="deskripsi" value="<?= @$deskripsi ?>" /></div>
                                        <div class="form-group"><label class="small mb-1" for="inputConfirmPicture">Confirm Picture</label><input class="form-control py-4" id="inputConfirmPicture" type="file" placeholder="Confirm Picture" name="file"/></div>
                                        <div class="form-group">
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button class="btn btn-primary" type="submit" name="submit">Edit</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small"><a href="register.php">Need an account? Sign up!</a></div>
                                </div>   
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2019</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>