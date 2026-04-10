<?php

require 'config.php';

$id = $_POST['id'];
$username = $_POST['username'];
$name = $_POST['name'];
$password = md5($_POST['password']);

$stmt = $conn->prepare("UPDATE users SET username = ?, name = ?, password = ? WHERE id = ?");
$stmt->bind_param("sssi", $username, $name, $password, $id);

if ($stmt->execute()) {
    $_SESSION['message'] = "Data berhasil diupdate";
} else {
    $_SESSION['message'] = "Data gagal diupdate";
}
header("Location: index.php");
