<?php
include 'koneksi.php';  // Pastikan ini terhubung dengan benar

$sql = "SELECT * FROM produk";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk - Buah Segar</title>
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

        button {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
    <script>
        function confirmDelete(id) {
            if (confirm('Apakah Anda yakin ingin menghapus produk ini?')) {
                deleteProduct(id);
            }
        }

        function deleteProduct(id) {
            fetch('hapus_produk.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'id=' + id
            })
            .then(response => response.text())
            .then(data => {
                if (data === 'success') {
                    alert('Produk berhasil dihapus.');
                    location.reload();  // Refresh halaman setelah produk dihapus
                } else {
                    alert('Gagal menghapus produk.');
                }
            })
            .catch(error => console.error('Error:', error));
        }
    </script>
</head>
<body>
    <header>
        <h1>Buah Segar</h1>
        <nav>
            <ul>
                <li><a href="tambah_produk.php">Tambah Produk</a></li>
                <li><a href="ubah_produk1.php">Daftar Produk</a></li>
                <li><a href="orderan.php">Pemesanan</a></li>
            </ul>
        </nav>
    </header>
    
    <div class="container">
        <h2>Daftar Produk</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id_produk']; ?></td>
                    <td><?php echo $row['nama_produk']; ?></td>
                    <td><?php echo $row['harga']; ?></td>
                    <td><?php echo $row['deskripsi']; ?></td>
                    <td><img src="uploads/<?php echo $row['gambar']; ?>" alt="Gambar Produk" style="max-width: 100px; max-height: 100px;"></td>
                    <td><a href="ubah_produk.php?id=<?php echo $row['id_produk']; ?>"><button>Ubah</button></a>
                    <button onclick="confirmDelete(<?php echo $row['id_produk']; ?>)">Hapus</button></td>
                </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">Tidak ada produk yang ditemukan.</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
    
    <footer>
        <p>&copy; <?php echo date('Y'); ?> Buah Segar</p>
    </footer>
</body>
</html>
