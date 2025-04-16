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
          $imeprezime = htmlspecialchars($_POST["iip"]);
          $email = htmlspecialchars($_POST["email"]);
          $broj = htmlspecialchars($_POST["broj"]);
          $poruka = htmlspecialchars($_POST["poruka"]);
     
          $sql = "INSERT INTO usersinput (Ime_i_prezime, Email, Broj, Poruka)
                  VALUES (?, ?, ?, ?)";
     
          $run = $conn->prepare($sql);
          $run->bind_param("ssss", $imeprezime, $email, $broj, $poruka);
          $run->execute();

          echo "<script>
                    alert('Uspjesno poslana poruka!');
                    window.location.href = 'kontakt.php';
                </script>";
          exit();
     }
     else {
          echo "Greska!!!";
          header('location: kontakt.php');
     }
}
?>