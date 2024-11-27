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
            background-image: url("background.jpeg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            height: 100%;
            font-family: Arial, sans-serif; 
            margin: 0;
            color: #333;
        }
        header { 
            background-color: rgba(255, 99, 71, 0.8); 
            color: white; 
            text-align: center; 
            padding: 20px 0; 
            position: relative;
            backdrop-filter: blur(5px);
        }
        nav { 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            padding: 0 20px;
            z-index: 1000;
        }
        nav ul { 
            list-style-type: none; 
            padding: 0; 
            margin: 0; 
            display: flex;
        }
        nav ul li { 
            margin: 0 15px; 
        }
        nav ul li a { 
            color: white; 
            text-decoration: none; 
            font-weight: bold;
            transition: color 0.3s;
        }
        nav ul li a:hover {
            color: #ffeb3b;
        }
        .login a {
            text-decoration: none;
        }
        .login button {
            background-color: black;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .login button:hover {
            background-color: white;
            color: black;
            border: 1px solid black;
        }
        .container { 
            width: 80%; 
            margin: auto; 
            background: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(5px);
        }
        h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
        }
        h2 {
            font-size: 2em;
            margin-top: 20px;
        }
        p {
            font-size: 1.1em;
            line-height: 1.6;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        ul li {
            font-size: 1.2em;
            margin: 10px 0;
        }
        footer { 
            background-color: rgba(255, 99, 71, 0.8); 
            color: white; 
            text-align: center; 
            padding: 10px 0; 
            position: relative;
            bottom: 0;
            width: 100%;
            backdrop-filter: blur(5px);
        }
        @media (max-width: 768px) {
            nav ul { 
                flex-direction: column; 
                align-items: flex-start;
            }
            nav ul li { 
                margin: 10px 0; 
            }
            .container {
                width: 90%;
            }
        }
        @media (max-width: 480px) {
            .product { 
                width: 100%; 
            }
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #ff6347;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }
        .modal-content {
            background-color: #fff;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.25);
            border-radius: 8px;
            animation: slideDown 0.3s ease-in-out;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }
        .close:hover,
        .close:focus {
            color: black;
        }
        .cancel-button {
            background-color: #e74c3c;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }
        .cancel-button:hover {
            background-color: #c0392b;
            transform: scale(1.05);
        }
        footer p {
            margin: 0;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        @keyframes slideDown {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Daftar Pembelian - Buah Segar</h1>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="produk.php">Produk</a></li>
                <li><a href="kontak.php">Kontak</a></li>
                <li><a href="order.php">Pemesanan</a></li>
            </ul>
            <div class="login">
                <a href="login.php">Login</a>
            </div>
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
                    <th>Aksi</th>
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
                            <td>
                                <button class="cancel-button" data-id="<?php echo $row['id']; ?>">Batalkan</button>
                            </td>
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

    <!-- Modal Konfirmasi Pembatalan -->
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Konfirmasi Pembatalan</h2>
            <p>Apakah Anda yakin ingin membatalkan pembelian ini?</p>
            <form id="deleteForm" action="batal_pembelian.php" method="post">
                <input type="hidden" id="deleteId" name="id">
                <button type="submit" class="cancel-button">Ya</button>
                <button type="button" id="cancelDelete" class="cancel-button">Tidak</button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var modal = document.getElementById('deleteModal');
            var span = document.getElementsByClassName('close')[0];
            var cancelDelete = document.getElementById('cancelDelete');

            var deleteButtons = document.querySelectorAll('.cancel-button');
            deleteButtons.forEach(function (button) {
                button.addEventListener('click', function () {
                    var id = this.getAttribute('data-id');
                    document.getElementById('deleteId').value = id;
                    modal.style.display = 'block';
                });
            });

            span.onclick = function () {
                modal.style.display = 'none';
            }

            cancelDelete.onclick = function () {
                modal.style.display = 'none';
            }

            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = 'none';
                }
            }
        });
    </script>
</body>
</html>
