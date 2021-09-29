<?php
session_start();

include("_config.php");

if (!$link) {
    echo "Eroare: Nu a fost posibilă conectarea la MySQL." . PHP_EOL . "</br>";
    echo "Valoarea error: " . mysqli_connect_errno() . PHP_EOL . "</br>";
    echo "Valoarea error: " . mysqli_connect_error() . PHP_EOL . "</br>";
    exit;
}

if (!isset($_POST['id'])) {
    die('Please complete yput data');
}



$id = $_REQUEST['id'];

$sql_remove = "DELETE FROM `FilipBernaz_utilizatori` WHERE id = " . $id;

$val = mysqli_query($link, 'select 1 from `FilipBernaz_utilizatori`');

if ($val !== FALSE) {
    insertUser($link, $sql_remove);
} else {
    echo "Tabela nu există";
}

function insertUser($_link, $sql_query)
{
    if (mysqli_query($_link, $sql_query)) {
        echo "Utilizator șters";
    } else {
        echo "ERROR: Could not able to execute $sql_query. " . mysqli_error($_link);
    }
}
