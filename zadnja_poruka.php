<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bazapodataka";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Greška u povezivanju s bazom: " . $conn->connect_error);
}

$sql = "SELECT * FROM usersinput ORDER BY vrijeme_poruke DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo '<div style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100%;">' . htmlspecialchars($row['Poruka']) . '
    <br>
    Napisao: <strong>' . htmlspecialchars($row['Ime_i_prezime']) . '</strong></div>';
} else {
    echo "Nema poruka.";
}

$conn->close();
?>
