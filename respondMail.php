<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/PHPMailer.php'; 
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'], $_POST['odgovor'], $_POST['id'])) {
    $recipientEmail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $odgovor = trim($_POST['odgovor']);
    $id = $_POST['id'];

    $formattedMessage = nl2br(htmlspecialchars($odgovor));

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 't09064759@gmail.com';
        $mail->Password   = 'elat jeyk qpgh xgrw';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
        $mail->setFrom('t09064759@gmail.com', 'IDK Studio');
        $mail->addAddress($recipientEmail);

        $mail->isHTML(true);
        $mail->Subject = 'Odgovor na vašu poruku';
        $mail->Body    = $formattedMessage;

        $mail->send();

        $conn = new mysqli("localhost", "root", "", "bazapodataka");
        $conn->query("UPDATE poruke SET odgovoreno = 1 WHERE id = $id");

        header("Location: poruke-dash.php?msg=odgovor-poslan");
        exit;
    } catch (Exception $e) {
        $_SESSION['error'] = 'Došlo je do greške prilikom slanja emaila.';
        $_SESSION['old_input'] = $_POST;
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit;
    }
} else {
    echo "Neispravni podaci!";
}
