<?php 
session_start();  
include '../cores/connect.php';  

$loginReg = $_POST['loginReg']; 
$passReg = $_POST['passReg']; 
$mailReg = $_POST['mailReg']; 
$hashPass = password_hash($passReg, PASSWORD_BCRYPT); 

$statementErr = $connect->prepare("SELECT COUNT(login) FROM users WHERE login = :loginReg"); 
$statementErr->execute(['loginReg' => $loginReg]); 
$countAcc = $statementErr->fetchColumn();  

if ($countAcc > 0) {     
    echo("error");  
} else {         
    $statementReg = $connect->prepare("INSERT INTO users(id,login,password,mail,status) VALUES(null,:login,:password,:mail,:status)");     
    $statementReg->execute(['login' => $loginReg, 'password' => $hashPass, 'mail' => $mailReg, 'status' => "user"]);     
    $_SESSION['auth'] = true;     
    $_SESSION['login'] = $loginReg; 
    header("Location: ../index.phtml");  
}  

?>