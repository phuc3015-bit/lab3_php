<?php
session_start();
require "db.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password_input = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->execute([":email" => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password_input, $user["password"])) {
        $_SESSION["user"] = $user["email"];
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Sai email hoac mat khau";
    }
}
?>

<form method="post">
    <h2>Dang nhap</h2>
    Email: <input type="email" name="email" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <button type="submit">Dang nhap</button>
</form>

<p style="color:red"><?= $error ?></p>
