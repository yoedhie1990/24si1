<?php

require 'config.php';

$username = $_POST['username'];
$name = $_POST['name'];
$password = $_POST['password'];

//tambah data
$stmt = $conn->prepare("INSERT INTO users (username, name, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $name, md5($password));
$stmt->execute();

//redirect ke index
header("Location: index.php");

