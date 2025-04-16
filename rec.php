<?php

$servername = "localhost";
$db_username = "root";
$db_password = "";
$database_name = "bazapodataka";

$conn = mysqli_connect($servername, $db_username, $db_password, $database_name);

if(!$conn) {
     die("Neuspjesna konekcija");
} else {
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $ime = htmlspecialchars($_POST["Ime"]);
          $prezime = htmlspecialchars($_POST["Prezime"]);
          $recenzija = htmlspecialchars($_POST["Recenzija"]);
          $ocjena = htmlspecialchars($_POST["rating"]);
     
          $sql = "INSERT INTO recenzija (Ime, Prezime, Recenzija, Ocjena)
                  VALUES (?, ?, ?, ?)";
     
          $run = $conn->prepare($sql);
          $run->bind_param("sssi", $ime, $prezime, $recenzija, $ocjena);
          $run->execute();

          echo "<script>
                    alert('Uspjesno poslana recenzija!');
                    window.location.href = 'pocetna.php';
                </script>";
          exit();
     }
     else {
          echo "Greska!!!";
          header('location: pocetna.php');
     }
}
?>