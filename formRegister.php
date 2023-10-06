<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="registerstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <div class="container">
        <div class="form-container login-container">
            <form action="" method="post" enctype="multipart/form-data">
                <h1>Form Register</h1>
                <div class="social-container">
                    <a href="https://id-id.facebook.com/login/device-based/regular/login/?login_attempt=1" class="social"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="" class="social"><i class="fa-brands fa-twitter"></i></a>
                </div>
                <span>Atau gunakan akunmu</span>
                <input type="text" placeholder="Masukan Nama Mu" name="nama">
                <input type="text" placeholder="Masukan Username" name="username">
                <input type="password" placeholder="Masukan Password" name="password">                
                <input type="file" placeholder="Masukan Foto" name="file">
                <a href="">Lupa Password</a>
                <button name="login">Sign In</button>
                <?php
                include "koneksi.php";
                if(isset($_POST['login'])){
                    $nama_pengguna = $_POST['nama'];
                    $username_pengguna = $_POST['username'];
                    $password_pengguna = $_POST['password'];
                    $foto = $_FILES['file']['name'];
                    $ekstensil = array('png', 'jpg', 'jpeg', 'svg');
                    $x = explode('.', $foto);
                    $ekstensi = strtolower(end($x));
                    $file_tmp = $_FILES['file']['tmp_name'];
                    if(in_array($ekstensi, $ekstensil) === true){
                        move_uploaded_file($file_tmp, 'Backend/img/'.$foto);
                    }else{
                        echo "<script>alert('Ekstensil Tidak Diperbolehkan')</script>";
                    }                  
                    $query = mysqli_query($koneksi, "INSERT INTO datapengguna(nama, username, password, foto) values('$nama_pengguna', '$username_pengguna', '$password_pengguna', '$foto')");
                    if($query > 0){
                        header('location: formLogin.php');
                    }
                }

                ?>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">       
                <div class="overlay-panel overlay-right">
                    <h1>Welcome To My Coffee Shop</h1>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magni exercitationem consectetur, aut ut ipsum, numquam odio blanditiis itaque dolorem accusamus animi assumenda illo maiores nesciunt deleniti laborum fugiat provident ea quos. Unde in quia iusto voluptatum! Ab quae aliquid quas consequuntur natus illum et cupiditate.</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>