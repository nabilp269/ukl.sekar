<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Data Barang</title>
</head>
<body>
    <h2>Insert Data Barang</h2>
    <form action="insert_barang.php" method="post">
        Nama Pembeli: <input type="text" name="nama_pembeli"><br><br>
        Alamat: <input type="text" name="alamat"><br><br>
        Telepon: <input type="text" name="telepon"><br><br>
        Nama Kue: 
        <select name="kue">
        <option value="Pilih Kue">Pilih Kue</option>
            <option value="Kue Nastar         Rp100.000">Kue Nastar        Rp100.000</option>
            <option value="Kue Kastengel      Rp100.000">Kue Kastengel      Rp100.000</option>
            <option value="Kue Palm Chesee    Rp85.000">Kue Palm Chesee    Rp85.000</option>
            <option value="Kue Sagu Keju      Rp80.000">Kue Sagu Keju      Rp80.000</option>
            <option value="Kue Putri Salju    Rp100.000">Kue Putri Salju    Rp100.000</option>
            <option value="Kue Kembang Goyang Rp75.000">Kue Kembang Goyang Rp75.000</option>

        </select>
        <br><br>
        Harga: <input type="text" name="harga"><br><br>
        Stok: <input type="text" name="stok"><br><br>
        <input type="submit" value="Submit">

        <li><a href="halaman.php">Kembali</a></li>


    </form>
</body>
</html>



<?php
$hostname = "localhost";
$username = "root";
$password = ""; 
$database = "aa";

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
    $nama_barang = $_POST['nama_barang'];
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
}

// Close database connection
mysqli_close($conn);
?>