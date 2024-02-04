<?php

include "../cores/connect.php";

$productId = $_GET['id']; 

echo $productId;

$stmt = $connect -> prepare("DELETE FROM books WHERE id = :id");
$stmt -> execute(['id'=>"$productId"]);

header("Location: ../admin.phtml?page=1");

?>