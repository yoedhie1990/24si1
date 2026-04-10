<?php

session_start();
//kiriman dari form login
$username = $_POST['username'];
$password = $_POST['password'];

//proses login
if ($username == 'admin' && $password == 'admin') {
    //login berhasil
    $_SESSION['username'] = $username;
    header('Location: index.php');
} else {
    //login gagal
    $_SESSION['error'] = "Username atau Password salah";
    //REDIRECT KE LOGIN KEMBALI
    header('Location: login.php');
}