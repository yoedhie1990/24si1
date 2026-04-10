
<?php

session_start();
$_SESSION['login'] = true;

function cetakNavigasi(){
    echo "<ul>";
    echo "<li>Home</li>";
    echo "<li>Profil</li>";
    echo "<li>Kontak</li>";
    echo "<li>Berita</li>";
    echo "</ul>";
}

function cekLogin(){
    if(isset($_SESSION['login'])){
        return true;
    } else {
        return false;
    }
}

function hitungLuasPersegi($sisi){
    return $sisi * $sisi;
}

function cetakBR(){
    echo "<br>";
}
