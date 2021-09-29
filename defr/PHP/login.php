<?php
session_start();

include('_config.php');


if (!$link) {
    echo "Eroare: Nu a fost posibilă conectarea la MySQL." . PHP_EOL . "</br>";
    echo "Valoarea error: " . mysqli_connect_errno() . PHP_EOL . "</br>";
    echo "Valoarea error: " . mysqli_connect_error() . PHP_EOL . "</br>";
    exit;
}

if (!isset($_POST['email'], $_POST['password'])) {
    die('Datele nu sunt trimise');
}

$sql_query = 'SELECT rol, password, email FROM FilipBernaz_utilizatori WHERE id = ?';

if ($stmt = $link->prepare('SELECT rol, password, blocked, id FROM FilipBernaz_utilizatori WHERE email = ?')) {
    $stmt->bind_param('s', $_POST['email']);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($rol, $password, $blocked, $id);
        $stmt->fetch();
        $receive = md5($_POST['password']);
        if ($receive === $password) {
            if ($blocked === 'd') {
                echo 'Acest utilizator este blocat';
            } else {
                session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['name'] = $_POST['email'];
                $_SESSION['rol'] = $rol;
                $_SESSION['id'] = $id;
                echo 'Success!';
            }
        } else {
            echo 'Parola incorecta';
        }
    } else {
        echo 'E-mail incorect';
    }
    $stmt->close();
}
