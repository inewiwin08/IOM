<?php

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['id'])) {
    header("Location: ../index.php");
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM tb_admin WHERE username='$username' AND password='$password'";

    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: ../index.php");
    } else {
            echo "<script>alert('Maaf! Username atau Password Anda Salah.')</script>";}
        
    }

    ?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin IOM PNC</title>
    <link rel="shortcut icon" href="../images/Logo_PNC.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="form">
        <br>
        <a href="../index.php"><img src="../images/PNC.png" style="width: 200px;"></a>
    <h4>Login Akun Admin IOM PNC</h4>
    <form>
        <input type="text" name="username" placeholder="username">
        <input type="password" name="password" placeholder="password">
        <button>login admin</button>
        <p class="message"><a href="login.php">Masuk sebagai user</a></p>
       
    </form>
    </div>
</body>
</html>
