<?php
include 'database.php'; 

$id = intval($_GET['id']); // Mengkonversi id menjadi integer untuk keamanan

$sql = "DELETE FROM users WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("Location: tabel.php"); 
exit(); 
?>
