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
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Create Account</h3>
                                </div>
                                <div class="card-body">
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group"><label class="small mb-1" for="inputFirstName">Name</label><input class="form-control py-4" id="inputFirstName" type="text" placeholder="Enter first name" name="nama" /></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group"><label class="small mb-1" for="inputUsername">Username</label><input class="form-control py-4" id="inputUsername" type="text" placeholder="Enter Username" name="username" /></div>
                                            </div>
                                        </div>
                                        <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Email</label><input class="form-control py-4" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address" /></div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group"><label class="small mb-1" for="inputPassword">Password</label><input class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" name="password" /></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group"><label class="small mb-1" for="inputConfirmPicture">Confirm Picture</label><input class="form-control py-4" id="inputConfirmPicture" type="file" placeholder="Confirm Picture" name="file" /></div>
                                            </div>
                                        </div>
                                        <div class="form-group mt-4 mb-0"><input type="submit" class="btn btn-primary btn-block" name="login"></input></div>

                                        <?php
                                        include "koneksi.php";
                                        if (isset($_POST['login'])) {
                                            $nama_pengguna = $_POST['nama'];
                                            $username_pengguna = $_POST['username'];
                                            $password_pengguna = $_POST['password'];
                                            $foto = $_FILES['file']['name'];
                                            $ekstensil = array('png', 'jpg', 'jpeg', 'svg');
                                            $x = explode('.', $foto);
                                            $ekstensi = strtolower(end($x));
                                            $file_tmp = $_FILES['file']['tmp_name'];
                                            if (in_array($ekstensi, $ekstensil) === true) {
                                                move_uploaded_file($file_tmp, 'img/' . $foto);
                                            } else {
                                                echo "<script>alert('Ekstensil Tidak Diperbolehkan')</script>";
                                            }
                                            $query = mysqli_query($koneksi, "INSERT INTO datapengguna(nama, username, password, foto) values('$nama_pengguna', '$username_pengguna', '$password_pengguna', '$foto')");
                                            if ($query > 0) {
                                                header('location: login.php');
                                            }
                                        }

                                        ?>
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small"><a href="register.html">Have an account? Go to login</a></div>
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