<?php
include 'koneksi.php';  // Pastikan ini terhubung dengan benar

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["nama_produk"]) && isset($_POST["harga"]) && isset($_POST["deskripsi"])) {
        $nama = $_POST["nama_produk"];
        $harga = $_POST["harga"];
        $deskripsi = $_POST["deskripsi"];  // Mengambil deskripsi produk

        // Mengambil informasi gambar
        if (isset($_FILES["gambar"]) && $_FILES["gambar"]["error"] == 0) {
            $gambar = $_FILES["gambar"]["name"];
            $gambar_tmp = $_FILES["gambar"]["tmp_name"];
            $gambar_path = "uploads/" . $gambar;

            // Memindahkan gambar ke folder uploads
            if (move_uploaded_file($gambar_tmp, $gambar_path)) {
                $sql = "INSERT INTO produk (nama_produk, harga, deskripsi, gambar) VALUES ('$nama', '$harga', '$deskripsi', '$gambar')";

                if ($conn->query($sql) === TRUE) {
                    header("Location: ubah_produk1.php");
                        exit(); 
                } else {
                    // Hapus pesan error
                    // echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                // Hapus pesan error
                // echo "Gagal mengunggah gambar.";
            }
        } else {
            // Hapus pesan error
            // echo "Gambar belum diunggah dengan benar.";
        }
    } else {
        // Hapus pesan error
        // echo "Data produk belum lengkap.";
    }
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk - Buah Segar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            overflow-x: hidden; /* Optional: prevents horizontal scroll */
        }

        .container {
            margin: 20px auto;
            padding: 20px;
            max-width: 600px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            overflow-y: auto; /* Allows vertical scrolling */
            min-height: 400px; /* Ensures enough height for content */
        }

        footer {
            text-align: center;
            padding: 10px 0;
            background-color: #4CAF50;
            color: white;
            position: relative; /* Changed from fixed to relative */
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
        form {
            display: flex;
            flex-direction: column;
        }
        form label {
            margin: 10px 0 5px;
        }
        form input[type="text"], form input[type="number"], form input[type="file"], form textarea {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        form input[type="submit"] {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        form input[type="submit"]:hover {
            background-color: #45a049;
        }
        
    </style>
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
        <h2>Tambah Produk</h2>
        <form action="tambah_produk.php" method="post" enctype="multipart/form-data">
            <label for="nama_produk">Nama Produk:</label>
            <input type="text" id="nama_produk" name="nama_produk" required>
            
            <label for="harga">Harga (Rp):</label>
            <input type="number" id="harga" name="harga" required>

            <label for="deskripsi">Deskripsi Produk:</label>
            <textarea id="deskripsi" name="deskripsi" rows="4" required></textarea>
            
            <label for="gambar">Gambar:</label>
            <input type="file" id="gambar" name="gambar" accept="image/*" required>
            
            <input type="submit" value="Tambah Produk">
        </form>
    </div>
    
    <footer>
        <p>&copy; <?php echo date('Y'); ?> Buah Segar</p>
    </footer>
    
</body>
</html>
