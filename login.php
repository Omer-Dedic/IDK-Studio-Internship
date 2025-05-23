<?php
session_start();

$conn = new mysqli("localhost", "root", "", "bazapodataka");
if ($conn->connect_error) {
    die("Konekcija s bazom nije uspjela: " . $conn->connect_error);
}

$query = "SELECT COUNT(*) as total FROM admin";
$stmt = $conn->query($query);
$row = $stmt->fetch_assoc();

if ($row['total'] == 0) {
    header("Location: create-admin.php");
    exit();
}
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Template page">
    <meta name="keywords" content="Template page">
    <meta name="author" content="Omer Dedic">
    <link href="style.css?v=1.1" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="slike/icons8-capital-100.png">

    <title>Login</title>
</head>
<body class="body-login">

    <div class="logdp">
        <div class="logform">
            <div class="logicon">
                <div class="logcircle">
                    <img class="logiconimage" src="slike/user-icon-login.png">
                </div>
            </div>
            <div class="loginput">
                <form action="verification.php" method="post">
                    <label class="login-label">Username:</label><br>
                    <input autocomplete="off" type="text" class="input-field-login" name="username" required><br>
                    <label class="login-label">Password:</label><br>
                    <input type="password" class="input-field-login" name="password" required><br>
                    <input type="submit" class="submit-login">
                </form>
            </div>
        </div>
    </div>

</body>
</html>