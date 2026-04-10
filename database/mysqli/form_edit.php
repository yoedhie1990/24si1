<?php

require 'config.php';

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

?>

<html>

<body>
    <form action="proses_edit.php" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="<?= $row['username'] ?>">
        <br>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="<?= $row['name'] ?>">
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <br>
        <input type="hidden" name="id" value="<?= $row['id'] ?>">
        <input type="submit" value="Edit">
    </form>
</body>

</html>