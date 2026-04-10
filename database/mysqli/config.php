<?php

session_start();

$conn = new mysqli('localhost', 'root', 'dhifamedia2021', '24si1');

if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
}