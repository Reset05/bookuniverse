<?php  

session_start(); 
include "../cores/connect.php";  

$loginAuth = $_POST['loginAdmin'];
$passwordAuth = $_POST['passAdmin'];


$statementAuth = $connect->prepare("SELECT * FROM users WHERE login = :loginAdmin");
$statementAuth->execute(['loginAdmin' => $loginAuth]);
$row = $statementAuth->fetch(PDO::FETCH_ASSOC);


if ($row['status'] === "admin" && $row && password_verify($passwordAuth, $row['password'])) {     
    $_SESSION['auth'] = true;     
    $_SESSION['login'] = $loginAuth;     
    header("Location: ../admin.phtml?page=1");  
    exit(); 
} else { 
    echo "<script>alert('Неверное имя пользователя или пароль')</script>";
    header("refresh: 1; url=../signinadmins.phtml"); 
}  
?>