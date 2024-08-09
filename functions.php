<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "smartskills";

// $conn = new mysqli($servername, $username, $password, $dbname);

// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// // CREATE
// if (isset($_POST['register'])) {
//     $username = $_POST['username'];
//     $password = $_POST['password'];
//     $email = $_POST['email'];
//     $notelp = $_POST['notelp'];

//     $sql = "INSERT INTO user (username, password, email, notelp) VALUES ('$username', '$password', '$email', '$notelp')";
    
//     if ($conn->query($sql) === TRUE) {
//         echo "User registered successfully";
//     } else {
//         echo "Error: " . $sql . "<br>" . $conn->error;
//     }
// }

// // READ
// $result = $conn->query("SELECT * FROM user");
// if ($result->num_rows > 0) {
//     while ($row = $result->fetch_assoc()) {
//         echo "ID: " . $row["id"] . " - Username: " . $row["username"] . " - Email: " . $row["email"] . " - No.Telp: " . $row["notelp"] . "<br>";
//     }
// } else {
//     echo "0 results";
// }


// $conn->close();


// // function registrasi
// function registrasi($data) {
//     global $conn;

//     $username = strtolower(stripslashes($data["username"]));
//     $password = mysqli_real_escape_string($conn,$data["password"]);
//     $email = strtolower(stripslashes($data["email"]));
//     $notelp = $data["notelp"];
    
//     // enkripsi password
//     $password = password_hash($password, PASSWORD_DEFAULT);

//     // tambahkan userbaru ke database
//     mysqli_query($conn, "INSERT INTO user VALUES('','$username','$password','$email','$notelp')");
        
//     return mysqli_affected_rows($conn);

//     // cek username sudah tersedia atau tidak
//     $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
//     if (mysqli_num_rows($result)) {
//         echo "<script>
//         alert('Username sudah terdaftar!');
//         </script>";
//         return false;

//     }
// }

$conn = mysqli_connect("localhost", "root", "", "smartskills");


function query($query) {
    global $conn; 
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ( $row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}



// tambah.php
function tambah($data) {
    global $conn;
     // ambil data dari tiap elemen from
     $nrp = htmlspecialchars($data["nrp"]);
     $nama = htmlspecialchars($data["nama"]);
     $email = htmlspecialchars($data["email"]);
     $jurusan = htmlspecialchars($data["jurusan"]);
     

    //  uploud gambar
    $gambar = upload();
    if( !$gambar) {
        return false;
    }

     // query inser data
    $query = "INSERT INTO mahasiswa
    VALUES
    ('','$nrp','$nama','$email','$jurusan',
    '$gambar')
    ";
mysqli_query($conn,$query);

return mysqli_affected_rows($conn);
}


// tambah2.php
function tambah2($data) {
    global $conn;
     // ambil data dari tiap elemen from
     $username = htmlspecialchars($data["username"]);
     $password = htmlspecialchars($data["password"]);
     $email = htmlspecialchars($data["email"]);
     $notelp = htmlspecialchars($data["notelp"]);
     

    //  uploud gambar
    // $gambar = upload();
    // if( !$gambar) {
    //     return false;
    // }

     // query inser data
    $query = "INSERT INTO user
    VALUES
    ('','$username','$password','$email','$notelp')
    ";
mysqli_query($conn,$query);

return mysqli_affected_rows($conn);
}



// transaksi.php
function transaksi($data) {
    global $conn;
     // ambil data dari tiap elemen from
     $nama = htmlspecialchars($data["nama"]);
     $notelp = htmlspecialchars($data["notelp"]);
     $alamat = htmlspecialchars($data["alamat"]);
     $layanan = $data["layanan"];
     $berat = htmlspecialchars($data["berat"]);
     

    //  uploud gambar
    // $gambar = upload();
    // if( !$gambar) {
    //     return false;
    // }

     // query inser data
    $query = "INSERT INTO transaksi
    VALUES
    ('','$nama','$notelp','$alamat','$layanan','$berat')
    ";
mysqli_query($conn,$query);

return mysqli_affected_rows($conn);
}


// upload
// function upload() {
//     $namaFile = $_FILES['gambar']['name'];
//     $ukuranFile = $_FILES['gambar']['size'];
//     $error = $_FILES['gambar']['error'];
//     $tmpName = $_FILES['gambar']['tmp_name'];

//     // cek apakah tidak ada gambar yang diupload
//     if($error === 4){
//         echo "<script>
//             alert('Pilih gambar terlebih dahulu!');
//         </script>";

//         return false;
//     }

//     // cek apakah yang diupload adalah gambar
//     $ekstensiGambarValid = ['jpg','jpeg','png'];
//     $ekstensiGambar = explode('.',$namaFile);
//     $ekstensiGambar = strtolower(end($ekstensiGambar));
//     if( !in_array($ekstensiGambar,$ekstensiGambarValid)) {
//         echo "<script>
//             alert('yang anda upload bukan gambar!');
//         </script>";

//         return false;
//     }

//     // cek jika ukurannya terlalu besar
//     if ( $ukuranFile > 1000000){
//         echo "<script>
//         alert('ukuran gambar anda terlalu besar!');
//     </script>";
//     }

//     // lolos pengecekan, gambar siap upload
//     // generate nama gambar baru
//     $namaFileBaru= uniqid();
//     $namaFileBaru .= '.';
//     $namaFileBaru .= $ekstensiGambar;
      

//     move_uploaded_file($tmpName,'img/'. $namaFileBaru);

//     return $namaFileBaru;
// }





// hapus.php
function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}

// hapus2.php
function hapus2($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM user WHERE id = $id");
    return mysqli_affected_rows($conn);
}
// hapus2.php
function hapus3($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM user WHERE id = $id");
    return mysqli_affected_rows($conn);
}



// ubah.php
function ubah($data) {
    global $conn;

    // ambil data dari tiap elemen from
    $id = $data["id"];
    $nrp = htmlspecialchars($data["nrp"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);
    
    //  cek apakah user pilih gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;

    }else {
        $gambar = upload();
    }
    

    // query inser data
   $query = "UPDATE mahasiswa SET
                nrp = '$nrp',
                nama = '$nama',
                email = '$email',
                jurusan = '$jurusan',
                gambar = '$gambar'
            WHERE id = $id
                ";
mysqli_query($conn,$query);

return mysqli_affected_rows($conn);
}


// ubah2.php
function ubah2($data) {
    global $conn;

    // ambil data dari tiap elemen from
    $id = $data["id"];
    $username = htmlspecialchars($data["username"]);
    $password = htmlspecialchars($data["password"]);
    $email = htmlspecialchars($data["email"]);
    $notelp = htmlspecialchars($data["notelp"]);
    
    
    //  cek apakah user pilih gambar baru atau tidak
    // if ($_FILES['gambar']['error'] === 4) {
    //     $gambar = $gambarLama;

    // }else {
    //     $gambar = upload();
    // }
    

    // query inser data
   $query = "UPDATE user SET
                username = '$username',
                password = '$password',
                email = '$email',
                notelp = '$notelp'
                
            WHERE id = $id
                ";
mysqli_query($conn,$query);

return mysqli_affected_rows($conn);
}



// search
function cari($keyword) {
    $query = "SELECT * FROM mahasiswa 
            WHERE
            nama LIKE '%$keyword%' OR
            nrp LIKE '%$keyword%' OR
            email LIKE '%$keyword%' OR
            jurusan LIKE '%$keyword%'

            ";
            return query($query);
}
// registrasi
function registrasi($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn,$data["password"]);
    $email = strtolower(stripslashes($data["email"]));
    $notelp = $data["notelp"];

// cek username sudah ada atau belom
$result = mysqli_query($conn, "SELECT username FROM user WHERE
    username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert ('username yang dipilih sudah terdaftar');
        </script>";
        
        return false;
    }


    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('','$username','$password','$email','$notelp')");
        
    return mysqli_affected_rows($conn);


}





?>
