<?php
$servername = "localhost";
$db_username = "root";
$db_password = "";
$database_name = "bazapodataka";

$conn = mysqli_connect($servername, $db_username, $db_password, $database_name);

if (!$conn) {
    die("Neuspješna konekcija: " . mysqli_connect_error());
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ime = htmlspecialchars($_POST["iip"]);
        $email = htmlspecialchars($_POST["email"]);
        $telefon = htmlspecialchars($_POST["broj"]);
        $poruka = htmlspecialchars($_POST["poruka"]);
        $datum = date('Y-m-d H:i:s');
        $procitano = 0;
        $odgovoreno = 0;

        $sql = "INSERT INTO poruke (ime, email, telefon, poruka, datum, procitano, odgovoreno)
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssii", $ime, $email, $telefon, $poruka, $datum, $procitano, $odgovoreno);
        
        if ($stmt->execute()) {
            echo "<script>
                    alert('Uspješno poslana poruka!');
                    window.location.href = 'kontakt.php';
                  </script>";
            exit();
        } else {
            echo "<script>
                    alert('Greška prilikom slanja poruke: " . $stmt->error . "');
                    window.location.href = 'kontakt.php';
                  </script>";
            exit();
        }
        
        $stmt->close();
    } else {
        echo "<script>
                alert('Greška: Nevalidan zahtjev!');
                window.location.href = 'kontakt.php';
              </script>";
        exit();
    }
}

$conn->close();
?>