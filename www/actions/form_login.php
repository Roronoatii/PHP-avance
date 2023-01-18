<?php

require_once __DIR__ . '/../../src/init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['mail'];
    $password = $_POST['password'];

    
    $query = $dbManager->select("SELECT * FROM users WHERE mail = ?", [$email], 'User');

    if (password_verify($password, $query->password)) {
        // $_SESSION['user'] = $user;
        $_SESSION['userId'] = $query->id;
        // header('Location: ../index.php?login=success');
        var_dump('lol');
    } else {
        var_dump("Email ou mot de passe incorrect");
    }
}