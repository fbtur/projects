<?php

include("_config.php");

if (mysqli_connect_errno()) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if (!isset($_POST['id'])) {
    die('Nu s-a trimis id-ul');
}

if ($stmt = $link->prepare('SELECT blocked FROM FilipBernaz_utilizatori WHERE id = ?')) {
    $stmt->bind_param('s', $_POST['id']);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($blocked);
        $stmt->fetch();


        if ($blocked === "d") {

            $query = "UPDATE FilipBernaz_utilizatori SET blocked='NULL' WHERE id=" . $_POST['id'];
            if (mysqli_query($link, $query)) {
                echo 'Success';
            } else {
                echo $query;
                echo "Modificarea nu a avut loc";
            }
        } else {
            $query = "UPDATE FilipBernaz_utilizatori SET blocked='d' WHERE id=" .  $_POST['id'];
            if (mysqli_query($link, $query)) {
                echo 'Success';
            } else {
                echo $query;
                echo "Modificarea nu a avut loc";
            }
        }
    } else {
        echo 'ID-ul nu exista incorect';
    }
} else {
    echo "'SELECT id, blocked FROM FilipBernaz_utilizatori WHERE id = ?'";
    echo $stmt;
}

$stmt->close();
