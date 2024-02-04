<?php

include "../cores/connect.php";

// Обработать форму
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Получить данные файла
    $file = $_FILES['file'];
    $namefile = $file['name'];
    $path = "../img/card/" . $namefile;

    // Проверить, был ли загружен файл
    if (!is_uploaded_file($file["tmp_name"])) {
        echo "Файл не был загружен.";
        return;
    }

    // Проверить, является ли переменная пустой
    if (empty($namefile)) {
        echo "Файл не был загружен.";
        return;
    }

    // Проверить размер файла
    if ($file["size"] > 1000000) {
        echo "Файл слишком большой. Максимальный размер файла 1000000 байт.";
        return;
    }

    // Проверить тип файла
    $allowed_mime_types = array('image/jpeg', 'image/png', 'image/gif');
    if (!in_array($file['type'], $allowed_mime_types)) {
        echo "Недопустимый тип файла.";
        return;
    }

    // Переместить файл в папку
    move_uploaded_file($file["tmp_name"], $path);

    // Сохранить данные файла в базе данных
    $namefile = mysqli_real_escape_string($mysqli, $namefile);
    $query = "INSERT INTO files (name, path, size, bookname) VALUES ('$namefile', '$path', '" . filesize($path) . "','$name')";
    mysqli_query($mysqli, $query);

    // Закрыть соединение с базой данных
    mysqli_close($mysqli);

}

// Добавить книгу
$name = $_POST['title'];
$img = $namefile;
$price = $_POST['price'];
$description = $_POST['description'];
$category = $_POST['category'];

$stmt = $connect -> prepare("INSERT INTO books (id,img,name,ratingSumm,price,count,rating,description,category_id) VALUES (null,:img,:name,0,:price,0,0,:description,:category)");
$stmt -> execute(['img' => "$img",'name' => "$name",'price' => "$price", 'description' => "$description", 'category' => "$category" ]);

header("Location: ../admin.phtml?page=1");

?>
