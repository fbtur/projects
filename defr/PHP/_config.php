<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'app2';
$DATABASE_PASS = 'naspa#2020';
$DATABASE_NAME = 'teme';


$link = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (!$link) {
    echo "Eroare: Nu a fost posibilă conectarea la MySQL." . PHP_EOL . "</br>";
    echo "Valoarea error: " . mysqli_connect_errno() . PHP_EOL . "</br>";
    echo "Valoarea error: " . mysqli_connect_error() . PHP_EOL . "</br>";
    exit;
}
