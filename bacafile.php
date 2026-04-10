<?php

$data = file('data.txt');

foreach ($data as $baris) {
    echo $baris . "<br>";
}