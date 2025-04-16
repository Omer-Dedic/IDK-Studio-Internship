<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bazapodataka"; // Zamijeni s nazivom svoje baze

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Greška u povezivanju s bazom: " . $conn->connect_error);
}

// Dohvati podatke za današnji datum
$datum = date("Y-m-d");
$sql = "SELECT uredjaj, broj_posjeta FROM posjete WHERE datum = '$datum'";
$result = $conn->query($sql);

$labels = [];
$data = [];
$total_posjete = 0;

while ($row = $result->fetch_assoc()) {
    $labels[] = $row['uredjaj'];
    $data[] = $row['broj_posjeta'];
    $total_posjete += $row['broj_posjeta'];
}

$response = [
    "labels" => $labels,
    "data" => $data,
    "total" => $total_posjete
];

echo json_encode($response);
$conn->close();
?>
