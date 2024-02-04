<?php  

session_start(); 
include "../cores/connect.php";  

$loginAuth = $_POST['loginAuth'];
$passwordAuth = $_POST['passAuth'];


$statementAuth = $connect->prepare("SELECT * FROM users WHERE login = :loginAuth");
$statementAuth->execute(['loginAuth' => $loginAuth]);
$row = $statementAuth->fetch(PDO::FETCH_ASSOC);

if($row['status'] === "admin"){
    $_SESSION['admin'] = true;
};

if ($row && password_verify($passwordAuth, $row['password'])) {     
    $_SESSION['auth'] = true;     
    $_SESSION['login'] = $loginAuth;     
    header("Location: ../index.phtml");  
    exit(); 
} else { 
    echo "<script>alert('Неверное имя пользователя или пароль')</script>";
    header("refresh: 1; url=../index.phtml"); 
};
?>