<?php
$conn = new mysqli("localhost", "root", "", "bazapodataka");

if ($conn->connect_error) {
    die("Greška pri konekciji: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['blog_id'])) {
    $blogId = intval($_POST['blog_id']);

    $res = $conn->query("SELECT slika FROM blogovi WHERE id = $blogId");
    if ($res && $res->num_rows > 0) {
        $row = $res->fetch_assoc();
        $putanja = 'uploads/' . $row['slika'];
        if (file_exists($putanja)) {
            unlink($putanja);
        }
    }

    $stmt = $conn->prepare("DELETE FROM blogovi WHERE id = ?");
    $stmt->bind_param("i", $blogId);

    if ($stmt->execute()) {
        header("Location: blog-dash.php?deleted=1");
        exit;
    } else {
        header("Location: blog-dash.php?deleted=0");
    }

    $stmt->close();
    $conn->close();
}
?>
