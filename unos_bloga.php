<?php
header('Content-Type: application/json');

$server = "localhost";
$username = "root";
$password = "";
$database = "bazapodataka";

$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {
    die("Konekcija s bazom nije uspjela: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $naslov = $_POST["naslov-blog"];
    $podnaslov = $_POST["podnaslov-blog"];
    $kljucne_rijeci = $_POST["keywords-blog"];
    $tekst_bloga = $_POST["blogContent"];
    $datum_objave_unos = null;
    $status = 'objavljeno'; // Default status
    
    // Obrada slike
    $slika_ime = null;
    if (isset($_FILES["slika"]) && $_FILES["slika"]["error"] == 0) {
        $target_dir = "uploads/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $slika_ime = basename($_FILES["slika"]["name"]);
        $target_file = $target_dir . $slika_ime;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Provjera je li datoteka slika
        $check = getimagesize($_FILES["slika"]["tmp_name"]);
        if($check === false) {
            echo "Datoteka nije slika.";
            exit();
        }

        // Dozvoljeni formati slika (opcionalno)
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            echo "Žao nam je, dozvoljeni su samo JPG, JPEG, PNG & GIF formati.";
            exit();
        }

        // Premještanje datoteke na server
        if (!move_uploaded_file($_FILES["slika"]["tmp_name"], $target_file)) {
            echo "Došlo je do greške prilikom učitavanja slike.";
            exit();
        }
    }

    if ($_POST["mainPublishBtn"] === 'Objavi odmah') {
        $datum_objave_unos = date("Y-m-d H:i:s");
    } elseif ($_POST["mainPublishBtn"] === 'Objavi kasnije' && !empty($_POST["scheduleDate"])) {
        $datum_objave_unos = $_POST["scheduleDate"];
        $status = 'zakazano';
    } else {
        // Ako nije odabrano ni jedno ni drugo, ili nema datuma za zakazano
        echo "Molimo odaberite opciju objave i datum ako je potrebno.";
        $conn->close();
        exit();
    }

    $sql = "INSERT INTO blogovi (naslov, podnaslov, kljucne_rijeci, slika, tekst_bloga, datum_objave, status)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $naslov, $podnaslov, $kljucne_rijeci, $slika_ime, $tekst_bloga, $datum_objave_unos, $status);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Došlo je do greške prilikom unosa: " . $stmt->error
        ]);
    }
    
    $stmt->close();
    exit;
}
$conn->close();
?>