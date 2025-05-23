<?php
session_start();
$conn = new mysqli("localhost", "root", "", "bazapodataka");
if ($conn->connect_error) {
    die("Konekcija s bazom nije uspjela: " . $conn->connect_error);
}

$provjera = $conn->query("SELECT id_admin FROM admin LIMIT 1");

    if ($provjera && $provjera->num_rows > 0) {
        header("Location: login.php");
        exit;
    }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        die("Sva polja su obavezna.");
    }

    $hashedPassword = sha1($password);

    $stmt = $conn->prepare("INSERT INTO admin (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashedPassword);

    if ($stmt->execute()) {
        header("Location: login.php");
        exit;
    } else {
        die("Greška prilikom kreiranja naloga: " . $conn->error);
    }
}
?>
