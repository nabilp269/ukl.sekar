<?php
include 'database.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];

    $sql = "UPDATE users SET username='$username', email='$email' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: tabel.php");
}

$sql = "SELECT id, username, email FROM users WHERE id=$id";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>

<h2>Edit User</h2>
<form action="edit.php?id=<?php echo $id; ?>" method="POST">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" value="<?php echo $user['username']; ?>" required>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required>
    <button type="submit">Update</button>
</form>

</body>
</html>

<?php $conn->close(); ?>
