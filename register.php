
<?php
require 'functions.php';

if( isset($_POST["register"])) {

	if (registrasi($_POST) > 0 ) {
		echo "<script>
		alert('user baru berhasil ditambahkan')
		document.location.href = 'login.php';
		</script>";

	} else {
		echo mysqli_error($conn);
	}
	
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Smartskills</title>
    <link rel="stylesheet" href="style/register.css">
</head>
<body>
    <div class="kiri">
        <h2 style="padding-bottom: 135px; font-style: italic; color: #04ABFF;">Smartskills</h2>
        <div class="wrap">
            <h1>Sign Up</h1>
            <p>Ayo gabung! dengan akunmu, banyak keseruan dan informasi menarik menanti!</p>
            <form action="" method="post">
                <input type="text" name="username" id="username" placeholder="Username"> <br>
                <input type="password" name="password" id="password" placeholder="Password"> <br>
				<input type="email" name="email" id="email" placeholder="Email"> <br>
				<input type="text" name="notelp" id="notelp" placeholder="No.Telp">
				<br><br>
				<input type="submit" name="register"value="Sign Up">
            </form>
            <p style="margin-left: 110px;">Already have an account? <a href="login.php">Login now</a></p>
        </div>
    </div>
    <div class="kanan">
        <img src="assets/Register-removebg.png  " alt=""> <br>
        <p>Gak perlu panik belajar, gak perlu raguragu Curhat. <br> 
            Aplikasi ini siap nemenin kamu dengan santai dan enjoy!</p>
    </div>
</body>
</html>