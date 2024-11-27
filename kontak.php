<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak - Buah Segar</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
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
        .footer-content p, .footer-content ul {
            margin: 0;
        }
        .footer-content ul {
            list-style: none;
            display: flex;
            padding: 0;
        }
        .footer-content ul li {
            margin: 0 10px;
        }
        .footer-content ul li a {
            color: white;
            text-decoration: none;
            transition: color 0.3s;
        }
        .footer-content ul li a:hover {
            color: #ffd1d1;
        }
    </style>
</head>
<body>
    <header>
        <h1>Kontak Kami</h1>
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
        <h2>Silakan Hubungi Kami Lewat Whatsapp dan Email di bawah : </h2>
        <div class="contact-info">
            <p>Alamat: Jl. Pattimura No. 123, Masohi</p>
            <p>Telepon: <a href="https://wa.me/6285216521240">081234567890 (Frans Mapusa)</a></p>
            <p>Email: <a href="mailto:info@buahsegar.com">info@buahsegar.com</a></p>
        </div>
    </div>
    
    <footer>
        <div class="footer-content">
            <p>&copy; <?php echo date('Y'); ?> Buah Segar</p>
            <ul>
                <li><a href="https://www.facebook.com">Facebook</a></li>
                <li><a href="https://www.twitter.com">Twitter</a></li>
                <li><a href="https://www.instagram.com">Instagram</a></li>
            </ul>
        </div>
    </footer>
</body>
</html>
