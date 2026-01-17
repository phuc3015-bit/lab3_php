<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
}
?>

<h2>Xin chao, <?= $_SESSION["user"] ?></h2>
<a href="logout.php">Dang xuat</a>
