<?php
include 'koneksi.php';  // Pastikan koneksi terhubung dengan benar

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Periksa apakah data yang diperlukan ada dalam $_POST
    $requiredFields = ['id_produk', 'nama_produk', 'harga', 'nama', 'alamat', 'email', 'telepon'];
    foreach ($requiredFields as $field) {
        if (!isset($_POST[$field])) {
            die("Error: Missing field $field");
        }
    }

    // Ambil data dari form
    $id_produk = $_POST['id_produk'];
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];

    // Siapkan statement SQL
    $stmt = $conn->prepare("INSERT INTO `tb_pemesanan` (id_produk, nama_produk, harga, nama, alamat, email, telepon) VALUES (?, ?, ?, ?, ?, ?, ?)");

    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("issssss", $id_produk, $nama_produk, $harga, $nama, $alamat, $email, $telepon);

    // Eksekusi query
    if ($stmt->execute()) {
        echo "<h2>Pembelian Berhasil!</h2>";
        echo "<p>Terima kasih, $nama. Pembelian Anda untuk produk '$nama_produk' dengan harga Rp " . number_format($harga, 0, ',', '.') . " telah berhasil.</p>";
    } else {
        echo "<h2>Terjadi Kesalahan</h2>";
        echo "<p>Gagal menyimpan data pembelian. Kesalahan: " . $stmt->error . "</p>";
    }

    // Tutup statement dan koneksi
    $stmt->close();
    $conn->close();
}
?>
