<?php

require_once __DIR__ . '/../../src/init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['mail'];
    $password = $_POST['password'];

    $user = $dbManager->select("SELECT * FROM users WHERE mail = ?", [$email], 'User');
    $hashedPassword = $user[0]->password;

    if (count($user) == 1 && password_verify($password, $hashedPassword)) {
        $_SESSION['id'] = $user[0]->id;
        $_SESSION['role'] = $user[0]->role_id;
        $_SESSION['firstname'] = $user[0]->firstname;
        $_SESSION['lastname'] = $user[0]->lastname;
        $_SESSION['mail'] = $user[0]->mail;
        $_SESSION['birthdate'] = $user[0]->birthdate;
        $_SESSION['iban'] = $user[0]->iban;
        $_SESSION['logged'] = true;

        header('Location: ../index.php?login=success');
        exit;
    } else {
        var_dump("Email ou mot de passe incorrect");
    }
}