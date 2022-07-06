<?php

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['nama'])) {
    header("Location: ../user/index.php");
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM tb_user WHERE username='$username' OR email='$username' AND password='$password'";

    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['nama'] = $row['nama'];
        header("Location: ../user/index.php");
    } else {

        $sql = "SELECT * FROM tb_kemahasiswaan WHERE username='$username' AND password='$password'";

        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['username'];
            header("Location: ../akademik/index.php");}
        else {
            
             $sql = "SELECT * FROM tb_admin WHERE username='$username' AND password='$password'";

        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['username'];
            header("Location: ../admin/index.php");}
        else {
            echo "<script>alert('Maaf! Username atau Password Anda Salah.')</script>";}
        }



            }
        }
    

    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Login IOM PNC</title>
        <link rel="shortcut icon" href="../images/Logo_PNC.png" type="image/png">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="form">
            <br>
            <a href="../index.php"><img src="../images/PNC.png" style="width: 200px;"></a>
            <h4>Login Akun IOM PNC</h4>
            <form action="" method="POST" class="login-email">

                <input type="text" name="username" placeholder="username/email" value="<?php echo $_POST['username']; ?>" required>
                <input type="password" name="password" placeholder="password" value="<?php echo $_POST['password']; ?>" required>

                <button name="submit">login</button>
                <p class="message">Belum daftar?<a href="daftar.php">Daftar</a></p>
               

            </form>
        </div>
    </body>
    </html>
