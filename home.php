<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buah Segar</title>
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
            <div class="login">
                <a href="login.php">
                    <button>Login</button>
                </a>
            </div>
        </nav>
    </header>
    
    <div class="container">
        <h2>Selamat Datang di Buah Segar!</h2>
        <p>Tempat terbaik untuk membeli buah-buahan segar dan berkualitas. Kami berkomitmen untuk menyediakan produk terbaik dengan layanan yang ramah dan cepat.</p>
        
        <h2>Kenapa Berbelanja di Toko Kami?</h2>
        <ul>
            <li>Buah Segar Setiap Hari: Kami hanya menjual buah-buah yang dipetik segar setiap hari langsung dari kebun-kebun terbaik.</li>
            <li>Kualitas Terjamin: Kami menjamin setiap buah yang Anda terima dalam kondisi terbaik, segar, dan siap dinikmati.</li>
            <li>Harga Terjangkau: Dapatkan harga terbaik untuk setiap pembelian buah-buah favorit Anda.</li>
            <li>Pengiriman Cepat dan Aman: Pesanan Anda akan dikemas dengan rapi dan dikirimkan secepat mungkin agar tetap segar sampai di tangan Anda.</li>
        </ul>
    
        <h2>Pilihan Buah:</h2>
        <ul>
            <?php
                $buah = [
                    '🍏 Apel Merah & Hijau',
                    '🍌 Pisang Cavendish',
                    '🍍 Nanas Manis',
                    '🍓 Stroberi Segar',
                    '🍉 Semangka Tanpa Biji',
                    '🍇 Anggur Manis',
                    '🍊 Jeruk Sunkist',
                    '🥭 Mangga Harum'
                ];

                foreach ($buah as $item) {
                    echo "<li>$item</li>";
                }
            ?>
        </ul>
    </div>
    
    <footer>
        <p>&copy; <?php echo date('Y'); ?> Buah Segar. Semua hak cipta dilindungi.</p>
    </footer>
</body>
</html>
