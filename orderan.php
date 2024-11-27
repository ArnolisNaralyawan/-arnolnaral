<?php
include 'koneksi.php';  // Pastikan koneksi terhubung dengan benar

// Query untuk mengambil semua data dari tabel tb_pemesanan
$sql = "SELECT * FROM tb_pemesanan";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pembelian - Buah Segar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            margin: 20px auto;
            padding: 20px;
            max-width: 800px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        footer {
            text-align: center;
            padding: 10px 0;
            background-color: #4CAF50;
            color: white;
            position: relative;
            width: 100%;
        }

        header {
            background-color: #4CAF50;
            color: white;
            padding: 10px 0;
            text-align: center;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 10px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <header>
        <h1>Daftar Pembelian - Buah Segar</h1>
        <nav>
            <ul>
                <li><a href="tambah_produk.php">Tambah Produk</a></li>
                <li><a href="ubah_produk1.php">Daftar Produk</a></li>
                <li><a href="orderan.php">Pemesanan</a></li>
            </ul>
        </nav>
    </header>
    
    <div class="container">
        <h2>Daftar Pembelian</h2>
        <table>
            <thead>
                <tr>
                    <th>ID Pembelian</th>
                    <th>ID Produk</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Nama Pembeli</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>No Telepon</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['id']); ?></td>
                            <td><?php echo htmlspecialchars($row['id_produk']); ?></td>
                            <td><?php echo htmlspecialchars($row['nama_produk']); ?></td>
                            <td>Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></td>
                            <td><?php echo htmlspecialchars($row['nama']); ?></td>
                            <td><?php echo htmlspecialchars($row['alamat']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td><?php echo htmlspecialchars($row['telepon']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="9">Tidak ada data pembelian.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    
    <footer>
        <p>&copy; <?php echo date('Y'); ?> Buah Segar</p>
    </footer>

</body>
</html>
