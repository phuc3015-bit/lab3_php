<?php
session_start();

$products = [
    1 => "Ao thun",
    2 => "Quan jean",
    3 => "Giay the thao"
];

if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = [];
}

if (isset($_GET["add"])) {
    $_SESSION["cart"][] = $_GET["add"];
}
?>

<h2>Danh sach san pham</h2>
<?php foreach ($products as $id => $name): ?>
    <?= $name ?> 
    <a href="cart.php?add=<?= $id ?>">Them vao gio</a><br>
<?php endforeach; ?>

<hr>

<h3>Gio hang cua ban</h3>
<?php
if (empty($_SESSION["cart"])) {
    echo "Chua co san pham";
} else {
    foreach ($_SESSION["cart"] as $pid) {
        echo $products[$pid] . "<br>";
    }
}
?>
