<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Submission</title>
</head>
<body>
    <?php
    $hostname = "localhost";
    $username = "root";
    $password = ""; 
    $database = "aaa";

    // Create connection
    $conn = mysqli_connect($hostname, $username, $password, $database);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if form data is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $nama_pembeli = $_POST['nama_pembeli'];
        $alamat = $_POST['alamat'];
        $telepon = $_POST['telepon'];
        $nama_barang = $_POST['kue']; // 'kue' diubah dari 'nama_barang'
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];

        // Insert data into barang table
        $sql_barang = "INSERT INTO barang (nama_barang, harga, stok) VALUES ('$nama_barang', $harga, $stok)";
        if (mysqli_query($conn, $sql_barang)) {
            echo "New record created in barang table successfully<br>";
        } else {
            echo "Error: " . $sql_barang . "<br>" . mysqli_error($conn);
        }

        // Get the id_barang of the newly inserted record
        $id_barang = mysqli_insert_id($conn);

        // Insert data into pembeli table
        $sql_pembeli = "INSERT INTO pembeli (nama_pembeli, alamat, telepon, id_barang) VALUES ('$nama_pembeli', '$alamat', '$telepon', $id_barang)";
        if (mysqli_query($conn, $sql_pembeli)) {
            echo "New record created in pembeli table successfully<br>";
        } else {
            echo "Error: " . $sql_pembeli . "<br>" . mysqli_error($conn);
        }

        // Display order summary
        echo "<h2>Order Summary</h2>";
        echo "<p><strong>Nama Pembeli:</strong> $nama_pembeli</p>";
        echo "<p><strong>Alamat:</strong> $alamat</p>";
        echo "<p><strong>Telepon:</strong> $telepon</p>";
        echo "<p><strong>Nama Barang:</strong> $nama_barang</p>";
        echo "<p><strong>Harga:</strong> $harga</p>";
        echo "<p><strong>Stok:</strong> $stok</p>";
    }

    // Close database connection
    mysqli_close($conn);
    ?>

    <!-- Back button to go to the previous page -->
    <form>
        <button type="button" onclick="history.back()">Kembali</button>
    </form>
</body>
</html>
