<?php
include "koneksi.php";
if(isset($_POST['login'])){
    $username = $_POST ['username'];
    $password = $_POST ['password'];
    $query = mysqli_query($koneksi, "select * from datapengguna where username= '$username' and password='$password'");
    if(mysqli_num_rows($query)>0){
        header("Location: Backend/index.php");
    }else{
        header("Location: formLogin.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="kopistyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <div class="container">
        <div class="form-container login-container">
            <form action="" method="post">
                <h1>Form Login</h1>
                <div class="social-container">
                    <a href="https://id-id.facebook.com/login/device-based/regular/login/?login_attempt=1" class="social"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="" class="social"><i class="fa-brands fa-twitter"></i></a>
                </div>
                <span>Atau gunakan akunmu</span>
                <input type="text" placeholder="Masukan Username" name="username">
                <input type="password" placeholder="Masukan Password" name="password">
                <a href="">Lupa Password</a>
                <button name="login">Login</button>
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