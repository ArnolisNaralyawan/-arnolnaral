<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_buah";

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Menjalankan query untuk mengambil data produk
$sql = "SELECT * FROM produk";
$result = $conn->query($sql);

if ($result === false) {
    // Menangani kesalahan query
    echo "Terjadi kesalahan saat menjalankan query: " . $conn->error;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk - Buah Segar</title>
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
        .product-list { 
            display: grid; 
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); 
            gap: 20px; 
            margin-top: 20px;
        }
        .product { 
            background-color: white; 
            border-radius: 10px; 
            box-shadow: 0 4px 8px rgba(0,0,0,0.2); 
            overflow: hidden; 
            display: flex; 
            flex-direction: column; 
            align-items: center; 
            padding: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .product img { 
            width: 100%; 
            height: 200px; 
            object-fit: cover; 
            border-radius: 10px; 
            margin-bottom: 15px;
        }
        .product:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.2);
        }
        .product-details { 
            text-align: center;
        }
        .product .price { 
            font-size: 1.5em; 
            color: #ff6347; 
            margin: 10px 0;
        }
        .product .description {
            font-size: 0.9em;
            color: #666;
            line-height: 1.5;
        }
        .login a{
            text-decoration: none;
        }
        .login button{
            background-color: black;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .login button:hover {
            background-color: white;
            color: black;
            border: 1px solid black;
        }
        /* Modal styles */
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
            background-color: #fefefe; 
            padding: 20px; 
            border: 1px solid #888; 
            width: 100%; 
            max-width: 500px; 
            border-radius: 8px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
            position: relative; 
            margin: 5% auto;
        }
        .close, .close-success {
            color: #aaa; 
            position: absolute; 
            top: 10px; 
            right: 10px; 
            font-size: 28px; 
            font-weight: bold;
        }
        .close:hover,
        .close:focus,
        .close-success:hover,
        .close-success:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"], input[type="email"], input[type="tel"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button[type="submit"] {
            background-color: #ff6347;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #e5533d;
        }
    </style>
</head>
<body>
    <header>
        <h1>Buah Segar</h1>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="produk.php">Produk</a></li>
                <li><a href="kontak.php">Kontak</a></li>
                <li><a href="order.php">Pemesanan</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <h2>Produk Kami</h2>
        <div class="product-list">
            <?php if (isset($result) && $result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="product" data-id="<?php echo htmlspecialchars($row['id_produk']); ?>" data-name="<?php echo htmlspecialchars($row['nama_produk']); ?>" data-price="<?php echo htmlspecialchars($row['harga']); ?>">
                        <img src="uploads/<?php echo htmlspecialchars($row['gambar']); ?>" alt="<?php echo htmlspecialchars($row['nama_produk']); ?>">
                        <div class="product-details">
                            <h3><?php echo htmlspecialchars($row['nama_produk']); ?></h3>
                            <p class="price">Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?>/kg</p>
                            <p class="description"><?php echo htmlspecialchars($row['deskripsi']); ?></p>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>Belum ada produk yang tersedia.</p>
            <?php endif; ?>
        </div>
    </div>
    <!-- Modal -->
    <div id="purchaseModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Form Pembelian</h2>
            <form id="purchaseForm" action="pembelian.php" method="post">
                <input type="hidden" id="productId" name="id_produk">
                <input type="hidden" id="productName" name="nama_produk">
                <input type="hidden" id="productPrice" name="harga">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" required>
                <label for="alamat">Alamat:</label>
                <input type="text" id="alamat" name="alamat" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <label for="telepon">No Telepon:</label>
                <input type="tel" id="telepon" name="telepon" required>
                <label for="displayProductName">Nama Buah:</label>
                <input type="text" id="displayProductName" name="displayProductName" readonly>
                <label for="displayProductPrice">Harga:</label>
                <input type="text" id="displayProductPrice" name="displayProductPrice" readonly>
                <button type="submit">Kirim</button>
            </form>
        </div>
    </div>

    <!-- Modal Scripts -->
    <script>
        // Script untuk menampilkan modal
        const productElements = document.querySelectorAll('.product');
        const modal = document.getElementById('purchaseModal');
        const closeModal = document.querySelector('.close');
        const purchaseForm = document.getElementById('purchaseForm');
        
        productElements.forEach(product => {
            product.addEventListener('click', () => {
                // Ambil data produk dari elemen yang diklik
                const id = product.getAttribute('data-id');
                const name = product.getAttribute('data-name');
                const price = product.getAttribute('data-price');

                // Isi form modal dengan data produk
                document.getElementById('productId').value = id;
                document.getElementById('productName').value = name;
                document.getElementById('productPrice').value = price;
                document.getElementById('displayProductName').value = name;
                document.getElementById('displayProductPrice').value = `Rp ${parseFloat(price).toFixed(2)}`;

                // Tampilkan modal
                modal.style.display = 'block';
            });
        });

        closeModal.addEventListener('click', () => {
            modal.style.display = 'none';
        });

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        };
    </script>

    <footer>
        <p>&copy; 2024 Buah Segar. Semua hak cipta dilindungi.</p>
    </footer>
</body>
</html>