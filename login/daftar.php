<?php 

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['nama'])) {
    header("Location: ../index.php");
}

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
     $nim = $_POST['nim'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if ($password == $cpassword) {
        $sql = "SELECT * FROM tb_user WHERE nim='$nim'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO tb_user ( nama, nim, email, username, password)
                    VALUES ('$nama', '$nim', '$email', '$username', '$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Selamat! Pendaftaran User Selesai.')</script>";
                $email= "";
                $username= "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            } else {
                echo "<script>alert('Maaf! Sesuatu Ada Yang Salah.')</script>";
            }
        } else {
            echo "<script>alert('Maaf! NIM Sudah Ada.')</script>";
        }
        
    } else {
        echo "<script>alert('Password Tidak Sama.')</script>";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar IOM PNC</title>
    <link rel="shortcut icon" href="../images/Logo_PNC.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="form">
   <br>
        <a href="../index.php"><img src="../images/PNC.png" style="width: 200px;"></a>
    <h4>Daftar Akun IOM PNC</h4>
   <form action="" method="POST" class="login-email">
        <input type="text" name="nama" placeholder="nama lengkap" value="<?php echo $nama; ?>" required>

         <input type="text" name="nim" placeholder="NIM" value="<?php echo $nim; ?>" required>

        <input type="text" name="email" placeholder="contoh@gmail.com" value="<?php echo $email; ?>" required>

        <input type="text" name="username" placeholder="username" value="<?php echo $username; ?>" required>

        <input type="password" name="password" placeholder="password" value="<?php echo $_POST['password']; ?>" required>

        <input type="password" placeholder="konfirmasi password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>

        <button name="submit">Daftar</button>
        <p class="message">Sudah daftar?<a href="login.php">Login</a></p>
    </form>
    </div>
</body>
</html>
