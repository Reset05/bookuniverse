<?php
session_start();

include "../cores/connect.php";

$id = $_GET['id'];

$stmt = $connect->prepare("SELECT * FROM books WHERE id = ?");
$stmt->execute([$id]);
$product = $stmt->fetch();

?>

<div data-id="01" class="cards__block">
    <img id="card-img" src="img/<?= $product['img'] ?>">
    <h3 class="card-title"><?= $product['name'] ?></h3>
    <p><i class="fa-regular fa-star"></i><?= $product['rating'] ?></p>
    <p id="price" class="price"><?= $product['price'] ?></p>
    <button data-cart id="btn-buy" class="btn__card">Купить</button>
</div>