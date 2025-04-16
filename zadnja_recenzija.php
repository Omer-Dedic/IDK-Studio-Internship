<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bazapodataka";

// Povezivanje s bazom podataka
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Greška u povezivanju s bazom: " . $conn->connect_error);
}

// Upit za dohvaćanje zadnje recenzije
$sql = "SELECT * FROM recenzija ORDER BY vrijeme_recenzije DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo '<div style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100%;">' . htmlspecialchars($row['Recenzija']) . '<br>
            <div style="display: flex; justify-content: space-between; width: 100%;">
                <span>Napisao:<strong> ' . htmlspecialchars($row['Ime']) . ' ' . htmlspecialchars($row['Prezime']) . '</strong></span>
                <span>Ocjena:<strong> ' . htmlspecialchars($row['Ocjena']) . '</strong></span>
            </div>
          </div>';
} else {
    echo "Nema recenzija.";
}

$conn->close();
?>
