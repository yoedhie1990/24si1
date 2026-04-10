<?php

require 'config.php';

//tampil data
$stmt = $conn->prepare("SELECT * FROM users");
$stmt->execute();
$result = $stmt->get_result();

if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}

echo "<a href='form_tambah.php'>Tambah Data</a><br><br>";
foreach ($result as $row) {
    echo $row['username'] . ' - ' . $row['name'] . ' - ' . $row['password'] . ' <a href="form_edit.php?id=' . $row['id'] . '">Edit</a>' . ' <a href="proses_hapus.php?id=' . $row['id'] . '" onclick="return confirm(\'Apakah Anda yakin ingin menghapus data ini?\');">Hapus</a>' . '<br>';
}