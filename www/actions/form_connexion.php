<?php

require_once __DIR__ . '/../../src/init.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = $_POST['mail'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE mail = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if($user && password_verify($password, $user['password'])){
        $_SESSION['user'] = $user;
        echo "Vous êtes connectés";
        //header('Location: ../index.php');
    }else{
        echo "Email ou mot de passe incorrect";
    }
}