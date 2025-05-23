<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bazapodataka";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die(json_encode(["error" => "Greška u povezivanju s bazom."]));
}

$sql = "SELECT * FROM poruke ORDER BY datum DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    echo json_encode([
        "id" => $row['id'],
        "poruka" => $row['poruka'],
        "ime" => $row['ime']
    ]);
} else {
    echo json_encode(["error" => "Nema poruka."]);
}

$conn->close();
?>
