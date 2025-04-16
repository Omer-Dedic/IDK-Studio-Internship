<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$db_username = "root";
$db_password = "";
$database_name = "bazapodataka";

$conn = mysqli_connect($servername, $db_username, $db_password, $database_name);

if (!$conn) {
    die("Neuspješna konekcija: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    var_dump($_POST);

    if ($stm = $conn->prepare('SELECT id_admin,username,password FROM admin WHERE username = ?')) {
        $stm->bind_param('s', $_POST['username']);
        $stm->execute();
        $result = $stm->get_result();
        $user = $result->fetch_assoc();

        var_dump($user);
        var_dump(SHA1($_POST['password']));


        if ($user && $user['password'] === SHA1($_POST['password'])) {
            $_SESSION['id'] = $user['id_admin'];
            $_SESSION['username'] = $user['username'];

            header('Location: dashboard.php');
            die();
        } else {
            echo "Pogrešno korisničko ime ili lozinka.";
        }
        $stm->close();
    } else {
        echo "Greška u procesu prijave.";
    }
} else {
    header('Location: login.php');
    exit();
}
?>