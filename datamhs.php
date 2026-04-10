<?php
//soal Quiz
// Buatkan Halaman Form untuk Input data nama, nim, jurusan, yang akan dikirim ke file datamhs.php dan disimpan di file mhs.txt
//tulis data baru
$databaru = "\n091112881; Dani;SI";
file_put_contents('mhs.txt', $databaru, FILE_APPEND);


//baca data dari mhs txt
$students = file('mhs.txt');

echo "<table border=1><tr><th>No</th><th>NIM</th><th>Nama</th><th>Jurusan</th></tr>";
$i = 1;
foreach ($students as $student) {
    $data = explode(";", $student);
    echo "<tr>";
    echo "<td>" . $i++ . "</td>";
    echo "<td>" . $data[0] . "</td>";
    echo "<td>" . $data[1] . "</td>";
    echo "<td>" . $data[2] . "</td>";
    echo "</tr>";
}
echo "</table>";
