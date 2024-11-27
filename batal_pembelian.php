<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $sql = "DELETE FROM tb_pemesanan WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Pembelian berhasil dibatalkan";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: order.php");
    exit();
}
?>

