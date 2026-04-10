<?php

$mahasiswa = [
    'nama' => 'yudhistira',
    'nim' => '091112751',
    'Prodi' => 'SI'
];

foreach ($mahasiswa as $key => $mhs) {
    echo $key . " -> " . $mhs . '<br>';
}

$data = [90, 80, 70, 60];

for ($i = 0; $i < count($data); $i++) {
    echo $data[$i] . '<br>';
}
echo "<hr>";
foreach ($data as $nilai) {
    echo $nilai . '<br>';
}


?>
<table border="1">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Nilai1</th>
        <th>Nilai2</th>
        <th>Nilai3</th>
        <th>Nilai4</th>
        <th>Rata-rata</th>
    </tr>


    <?php
    // echo "<table border='1'>";
// echo "<tr><th>No</th><th>Nama</th><th>Nilai1</th><th>Nilai2</th><th>Nilai3</th><th>Nilai4</th></tr>";
    $dataNilai = [
        'Dimas' => [90, 80, 70, 60],
        'Budi' => [80, 70, 60, 50],
        'Andi' => [70, 60, 50, 40],
        'Agus' => [60, 50, 40, 30],
        'Bimo' => [50, 40, 30, 20],
        'Bintan' => [40, 30, 20, 10],
        'Bima' => [30, 20, 10, 0]
    ];
    $i = 1;
    foreach ($dataNilai as $key => $mhs) {
        echo "<tr><td>$i</td><td>$key</td><td>$mhs[0]</td><td>$mhs[1]</td><td> $mhs[2]</td><td>$mhs[3]</td><td>" . array_sum($mhs) / count($mhs) . "</td></tr>";
        $i++;
    }
    echo "</table>";





