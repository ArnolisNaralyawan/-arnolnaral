<?php
include 'koneksi.php'; // File koneksi ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];

    // Melakukan query untuk menyimpan data pengguna baru
    $sql = "INSERT INTO tb_user (username, email, password, alamat, telepon) VALUES ('$username', '$email', '$password', '$alamat', '$telepon')";

    if ($conn->query($sql) === TRUE) {
        echo "Pendaftaran berhasil! <a href='login.php'>Login</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>