<?php
$conn = new mysqli("localhost", "root", "", "bazapodataka");

if ($conn->connect_error) {
    die("Greška pri konekciji: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['blog_id'])) {
    $blogId = intval($_POST['blog_id']);

    $stmt = $conn->prepare("DELETE FROM poruke WHERE id = ?");
    $stmt->bind_param("i", $blogId);

    if ($stmt->execute()) {
        header("Location: poruke-dash.php?deleted=1");
        exit;
    } else {
        header("Location: poruke-dash.php?deleted=0");
    }

    $stmt->close();
    $conn->close();
}
?>