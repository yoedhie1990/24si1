<?php

require 'config.php';

$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    $_SESSION['message'] = "Data berhasil dihapus";
} else {
    $_SESSION['message'] = "Data gagal dihapus";
}
header("Location: index.php");

