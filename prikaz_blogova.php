<?php

// Konfiguracija baze podataka (isti podaci kao u unos_bloga.php)
$server = "localhost"; // Ili tvoj hostname
$username = "root"; // Tvoje korisničko ime za bazu
$password = ""; // Tvoja lozinka za bazu
$database = "bazapodataka"; // Naziv tvoje baze podataka

// Kreiranje konekcije
$conn = new mysqli($server, $username, $password, $database);

// Provjera konekcije
if ($conn->connect_error) {
    die("Konekcija s bazom nije uspjela: " . $conn->connect_error);
}

// Dohvat objavljenih blogova
$sql_objavljeni = "SELECT * FROM blogovi WHERE status = 'objavljeno' ORDER BY datum_objave DESC";
$rezultat_objavljeni = $conn->query($sql_objavljeni);
$objavljeni_blogovi = [];
if ($rezultat_objavljeni->num_rows > 0) {
    while ($row = $rezultat_objavljeni->fetch_assoc()) {
        $objavljeni_blogovi[] = $row;
    }
}

// Dohvat zakazanih blogova
$sql_zakazani = "SELECT * FROM blogovi WHERE status = 'zakazano' ORDER BY datum_objave ASC";
$rezultat_zakazani = $conn->query($sql_zakazani);
$zakazani_blogovi = [];
if ($rezultat_zakazani->num_rows > 0) {
    while ($row = $rezultat_zakazani->fetch_assoc()) {
        $zakazani_blogovi[] = $row;
    }
}

$conn->close();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Prikaz Blogova</title>
    <style>
        .blog-list {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .blog-image {
            max-width: 200px;
            height: auto;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <h1>Objavljeni Blogovi</h1>
    <?php if (!empty($objavljeni_blogovi)): ?>
        <?php foreach ($objavljeni_blogovi as $blog): ?>
            <div class="blog-list">
                <h3><?= htmlspecialchars($blog['naslov']) ?></h3>
                <h4><?= htmlspecialchars($blog['podnaslov']) ?></h4>
                <p>Ključne riječi: <?= htmlspecialchars($blog['kljucne_rijeci']) ?></p>
                <?php if (!empty($blog['slika'])): ?>
                    <img src="uploads/<?= htmlspecialchars($blog['slika']) ?>" alt="<?= htmlspecialchars($blog['naslov']) ?>" class="blog-image">
                <?php endif; ?>
                <p><?= nl2br(htmlspecialchars($blog['tekst_bloga'])) ?></p>
                <p>Datum objave: <?= htmlspecialchars($blog['datum_objave']) ?></p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Trenutno nema objavljenih blogova.</p>
    <?php endif; ?>

    <h2>Zakazani Blogovi</h2>
    <?php if (!empty($zakazani_blogovi)): ?>
        <?php foreach ($zakazani_blogovi as $blog): ?>
            <div class="blog-list">
                <h3><?= htmlspecialchars($blog['naslov']) ?></h3>
                <h4><?= htmlspecialchars($blog['podnaslov']) ?></h4>
                <p>Ključne riječi: <?= htmlspecialchars($blog['kljucne_rijeci']) ?></p>
                <?php if (!empty($blog['slika'])): ?>
                    <img src="uploads/<?= htmlspecialchars($blog['slika']) ?>" alt="<?= htmlspecialchars($blog['naslov']) ?>" class="blog-image">
                <?php endif; ?>
                <p><?= nl2br(htmlspecialchars($blog['tekst_bloga'])) ?></p>
                <p>Datum zakazane objave: <?= htmlspecialchars($blog['datum_objave']) ?></p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Trenutno nema zakazanih blogova.</p>
    <?php endif; ?>

</body>
</html>