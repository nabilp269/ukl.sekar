<?php include 'database.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD Table</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px;
        }
    </style>
</head>
<body>

<h2>CRUD Table</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT id, username, email FROM users";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['username']}</td>
                        <td>{$row['email']}</td>
                        <td>
                            <a href='edit.php?id={$row['id']}'>Edit</a>
                            <a href='hapus.php?id={$row['id']}'>Hapus</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Tidak ada data</td></tr>";
        }
        ?>
    </tbody>
</table>

<li><a href="halaman.php">Kembali halaman</a></li>

</body>
</html>
<?php $conn->close(); ?>
