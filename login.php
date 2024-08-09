<?php
require 'functions.php';
include 'koneksi.php';

if (isset($_POST["login"]) ) {

    $username = $_POST["username"];
    $password = $_POST["password"];  

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");


// cek username
if ( mysqli_num_rows($result) === 1){

    // cek password
    $row = mysqli_fetch_assoc($result);
    if(password_verify($password, $row["password"])) {
        header("Location: home.html");
        exit;
        } 

    // set session
    $_SESSION["login"] = true;

        header("Location: home.html");
        exit;
     }
    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Smartskills</title>
    <link rel="stylesheet" href="style/login.css">
</head>
<body>
    <div class="kiri">
        <h2 style="padding-bottom: 213px; font-style: italic; color: #04ABFF;">Smartskills</h2>
        <div class="wrap">
            <h1>Sign In</h1>
            <p>Selamat datang kembali! Senang melihatmu kembali di sini</p>
            <?php if(isset($error) ) :   ?>

<p style="color:red; font-style:italic; font-size:12px; margin-left:40px;">
username atau password salah</p>

<?php endif; ?> 
            <form action="" method="post">
                <input type="text" name="username" id="username" placeholder="Username"> <br>
                <input type="password" name="password" id="password" placeholder="Password"> <br>
				<br><br>
				<a href="home.html"><input type="submit" name="login"value="Sign In"></a>
            </form>
            <p style="margin-left: 110px;">Create an account? <a href="register.php">Register now</a></p>
        </div>
    </div>
    <div class="kanan">
        <img src="assets/halo(2).png  " alt=""> <br>
        <p>Gak perlu panik belajar, gak perlu raguragu Curhat. <br> 
            Aplikasi ini siap nemenin kamu dengan santai dan enjoy!</p>
    </div>
</body>
</html>