<?php
header('Content-Type: application/json');

$server = "localhost";
$username = "root";
$password = "";
$database = "bazapodataka";

$conn = new mysqli($server, $username, $password, $database);
if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "Greška u konekciji."]);
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = (int)$_POST["blog_id"];
    $naslov = $_POST["naslov-blog"];
    $podnaslov = $_POST["podnaslov-blog"];
    $kljucne_rijeci = $_POST["keywords-blog"];
    $tekst_bloga = $_POST["blogContent"];
    $datum_objave_unos = null;
    $slika_ime = null;

    $trenutni_blog_id = $_POST["blog_id"];

    $sql_dohvati_datum = "SELECT datum_objave FROM blogovi WHERE id = ?";
    $stmt_datum = $conn->prepare($sql_dohvati_datum);
    $stmt_datum->bind_param("i", $trenutni_blog_id);
    $stmt_datum->execute();
    $result_datum = $stmt_datum->get_result();

    if ($row = $result_datum->fetch_assoc()) {
        $datum_objave_unos = $row["datum_objave"];
    } else {
        echo json_encode(["status" => "error", "message" => "Greška pri dohvaćanju trenutnog datuma."]);
        exit;
    }

    $sql_dohvati_datum = "SELECT datum_objave, status FROM blogovi WHERE id = ?";
    $stmt_datum = $conn->prepare($sql_dohvati_datum);
    $stmt_datum->bind_param("i", $trenutni_blog_id);
    $stmt_datum->execute();
    $result_datum = $stmt_datum->get_result();

    if ($row = $result_datum->fetch_assoc()) {
        $datum_objave_unos = $row["datum_objave"];
        $status = $row["status"];
    } else {
        echo json_encode(["status" => "error", "message" => "Greška pri dohvaćanju trenutnog datuma."]);
        exit;
    }

    if (!empty($_POST["scheduleDate"])) {
        $uneseni_datum = $_POST["scheduleDate"];
        $datum_objave_unos = $uneseni_datum;

        $danasnji_datum = date("Y-m-d");
        $samo_datum_unos = date("Y-m-d", strtotime($uneseni_datum));

        if ($samo_datum_unos === $danasnji_datum) {
            $status = 'objavljeno';
        } else {
            $status = 'zakazano';
        }
    }

    if (isset($_FILES["slika"]) && $_FILES["slika"]["error"] === 0) {
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

        $sql_stara_slika = "SELECT slika FROM blogovi WHERE id = ?";
        $stmt_stara = $conn->prepare($sql_stara_slika);
        $stmt_stara->bind_param("i", $id);
        $stmt_stara->execute();
        $result_stara = $stmt_stara->get_result();
        if ($row_stara = $result_stara->fetch_assoc()) {
            $stara_slika = $row_stara["slika"];
            if (!empty($stara_slika)) {
                $putanja_stare_slike = $target_dir . $stara_slika;
                if (file_exists($putanja_stare_slike)) {
                    unlink($putanja_stare_slike);
                }
            }
        }
        $stmt_stara->close();

        if (!move_uploaded_file($_FILES["slika"]["tmp_name"], $target_file)) {
            echo json_encode(["status" => "error", "message" => "Greška pri učitavanju slike."]);
            exit();
        }
    }

    $sql = "UPDATE blogovi SET 
        naslov = ?, 
        podnaslov = ?, 
        kljucne_rijeci = ?, 
        tekst_bloga = ?, 
        datum_objave = ?, 
        status = ?" . 
        ($slika_ime ? ", slika = ?" : "") . 
        " WHERE id = ?";

    if ($slika_ime) {
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssi", $naslov, $podnaslov, $kljucne_rijeci, $tekst_bloga, $datum_objave_unos, $status, $slika_ime, $id);
    } else {
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssi", $naslov, $podnaslov, $kljucne_rijeci, $tekst_bloga, $datum_objave_unos, $status, $id);
    }


    if ($stmt->execute()) {
        echo json_encode(["status" => "successEdit"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Greška pri ažuriranju: " . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
    exit();
}
?>
