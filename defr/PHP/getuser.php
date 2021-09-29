<?php

include('_config.php');

if (!$link) {
    echo "Eroare: Nu a fost posibilă conectarea la MySQL." . PHP_EOL . "</br>";
    echo "Valoarea error: " . mysqli_connect_errno() . PHP_EOL . "</br>";
    echo "Valoarea error: " . mysqli_connect_error() . PHP_EOL . "</br>";
    exit;
}

$sql = "SELECT * FROM FilipBernaz_utilizatori";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<tr>
                    <td> ' . $row["user_name"] . ' </td>
                    <td> ' . $row["email"] . ' </td>
                    <td class="options_list">
                        <!-- optiuni administrare -->
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" onclick="blockUser(' . $row["id"] . ')" id="exampleCheck' . $row["id"] . '"';
        if ($row["blocked"] === 'd') {
            echo "checked='true'>";
        }
        echo '
                            <label class="form-check-label" for="exampleCheck1" style="margin-right: 10px;">Blocat</label>
                        </div>

                        <button class="btn btn-danger" style="margin-left: 10px;" onclick="deleteUser(' . $row["id"] . ')">Șterge</button>
                    </td>
                </tr>';
    }
} else {
    echo "Nici un utilizator";
}
$link->close();
