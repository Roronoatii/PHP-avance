<?php

require_once __DIR__ . '/../../src/init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['mail'];
    $password = $_POST['password'];

    $user = $dbManager->select("SELECT * FROM users WHERE mail = ?", [$email], 'User');
    $hashedPassword = $user[0]->password;

    if (count($user) == 1 && password_verify($password, $hashedPassword)) {
        $_SESSION['role'] = $user[0]->role_id;

        header('Location: ../index.php?login=success');
    } else {
        var_dump("Email ou mot de passe incorrect");
    }
}