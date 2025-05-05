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
    $status = 'objavljeno';
    
    $slika_ime = null;
    if (isset($_FILES["slika"]) && $_FILES["slika"]["error"] == 0) {
        $target_dir = "uploads/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        
        $originalno_ime = pathinfo($_FILES["slika"]["name"], PATHINFO_FILENAME);
        $ekstenzija = strtolower(pathinfo($_FILES["slika"]["name"], PATHINFO_EXTENSION));

        $slika_ime = uniqid('blog_', true) . '.' . $ekstenzija;
        $target_file = $target_dir . $slika_ime;

        $check = getimagesize($_FILES["slika"]["tmp_name"]);
        if ($check === false) {
            echo json_encode(["status" => "error", "message" => "Datoteka nije slika."]);
            exit();
        }

        if (!in_array($ekstenzija, ["jpg", "jpeg", "png", "gif"])) {
            echo json_encode(["status" => "error", "message" => "Dozvoljeni su samo JPG, JPEG, PNG i GIF formati."]);
            exit();
        }

        if (!move_uploaded_file($_FILES["slika"]["tmp_name"], $target_file)) {
            echo json_encode(["status" => "error", "message" => "Greška pri učitavanju slike."]);
            exit();
        }
    }

    if ($_POST["mainPublishBtn"] === 'Objavi odmah') {
        $datum_objave_unos = date("Y-m-d H:i:s");
    } elseif ($_POST["mainPublishBtn"] === 'Objavi kasnije' && !empty($_POST["scheduleDate"])) {
        $datum_objave_unos = $_POST["scheduleDate"];
        $status = 'zakazano';
    } else {
        echo "Molimo odaberite opciju objave i datum ako je potrebno.";
        $conn->close();
        exit();
    }

    $sql = "INSERT INTO blogovi (naslov, podnaslov, kljucne_rijeci, slika, tekst_bloga, datum_objave, status)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $naslov, $podnaslov, $kljucne_rijeci, $slika_ime, $tekst_bloga, $datum_objave_unos, $status);

    if ($stmt->execute()) {
        header('Content-Type: application/json');
        echo json_encode([
            "status" => "success",
            "scheduledDate" => $status === "zakazano" ? date("d-m-Y H:i", strtotime($datum_objave_unos)) : null
        ]);
        exit;
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