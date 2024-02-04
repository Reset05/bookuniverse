<?php
include "../cores/connect.php";
$id = $_GET['id'];
$stmt = $connect->prepare("SELECT * FROM books WHERE id = ?");
$stmt->execute([$id]);
$product = $stmt->fetch();

$ratingUser = $_POST['ratingUser'];
$newRatingSumm = $product['ratingSumm'] + $ratingUser;
$newCount = $product['count'] + 1;
$rating = $newRatingSumm/$newCount;

if($ratingUser >= 1 and $ratingUser <= 5){
    $stmtRating = $connect->prepare("UPDATE books SET ratingSumm = ?, count = ?, rating = ? WHERE id = ?");
    $stmtRating->execute([$newRatingSumm, $newCount, $rating, $id]);
    header("Location: ../pages/product.phtml?id=$id");
} else{
    echo("error");
};


?>