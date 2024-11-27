<?php
include 'koneksi.php';  // Pastikan ini terhubung dengan benar

// Mengambil ID produk dari URL dan memastikan ID adalah integer
$id_produk = isset($_GET['id']) ? intval($_GET['id']) : 1;

// Mengambil data produk dari database jika ID ada
if ($id_produk > 0) {
    $sql = "SELECT * FROM produk WHERE id_produk = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_produk);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        die("Produk tidak ditemukan.");
    }
} else {
    die("ID produk tidak valid.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama_produk"];
    $harga = $_POST["harga"];
    $deskripsi = $_POST["deskripsi"];  // Mengambil deskripsi produk

    // Memeriksa apakah ada gambar baru yang diupload
    if (isset($_FILES["gambar"]) && $_FILES["gambar"]["error"] == 0) {
        $gambar = $_FILES["gambar"]["name"];
        $gambar_tmp = $_FILES["gambar"]["tmp_name"];
        $gambar_path = "uploads/" . $gambar;

        // Memindahkan gambar ke folder uploads
        if (move_uploaded_file($gambar_tmp, $gambar_path)) {
            // Mengupdate gambar jika ada gambar baru
            $sql = "UPDATE produk SET nama_produk = ?, harga = ?, deskripsi = ?, gambar = ? WHERE id_produk = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssi", $nama, $harga, $deskripsi, $gambar, $id_produk);
        } else {
            echo "Gagal mengunggah gambar.";
            exit();
        }
    } else {
        // Mengupdate data tanpa mengubah gambar
        $sql = "UPDATE produk SET nama_produk = ?, harga = ?, deskripsi = ? WHERE id_produk = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $nama, $harga, $deskripsi, $id_produk);
    }

    if ($stmt->execute()) {
        // Pengalihan ke halaman produk setelah data berhasil diubah
        header("Location: ubah_produk1.php");
        exit();  // Pastikan script berhenti setelah pengalihan
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Produk - Buah Segar</title>
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
        
    </header>
    
    <div class="container">
        <h2>Ubah Produk</h2>
        <form action="ubah_produk.php?id=<?php echo $id_produk; ?>" method="post" enctype="multipart/form-data">
            <label for="nama_produk">Nama Produk:</label>
            <input type="text" id="nama_produk" name="nama_produk" value="<?php echo htmlspecialchars($product['nama_produk']); ?>" required>
            
            <label for="harga">Harga (Rp):</label>
            <input type="number" id="harga" name="harga" value="<?php echo htmlspecialchars($product['harga']); ?>" required>

            <label for="deskripsi">Deskripsi Produk:</label>
            <textarea id="deskripsi" name="deskripsi" rows="4" required><?php echo htmlspecialchars($product['deskripsi']); ?></textarea>
            
            <label for="gambar">Gambar Baru (Opsional):</label>
            <input type="file" id="gambar" name="gambar" accept="image/*">
            
            <label for="current_image">Gambar Saat Ini:</label>
            <img src="uploads/<?php echo htmlspecialchars($product['gambar']); ?>" alt="Gambar Produk" style="max-width: 200px; max-height: 200px;">

            <input type="submit" value="Update Produk">
        </form>
    </div>
    
    <footer>
        <p>&copy; <?php echo date('Y'); ?> Buah Segar</p>
    </footer>
    
</body>
</html>
