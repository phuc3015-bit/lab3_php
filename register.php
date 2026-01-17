<?php
require "db.php";

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO students (email, password) VALUES (:email, :password)";
    $stmt = $conn->prepare($sql);

    try {
        $stmt->execute([
            ":email" => $email,
            ":password" => $hash
        ]);
        $success = "Dang ky thanh cong!";
    } catch (PDOException $e) {
        $error = "Email da ton tai!";
    }
}
?>

<form method="post">
    <h2>Dang ky</h2>
    Email: <input type="email" name="email" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <button type="submit">Dang ky</button>
</form>

<p style="color:green"><?= $success ?></p>
<p style="color:red"><?= $error ?></p>
