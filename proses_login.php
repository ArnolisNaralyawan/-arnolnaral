<?php
session_start();
include 'koneksi.php'; // File koneksi ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Melakukan query untuk memeriksa kredensial pengguna
    $sql = "SELECT * FROM tb_user WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header("Location: ubah_produk1.php");
    } else {
        echo "Username atau password salah!";
    }
}
?>
