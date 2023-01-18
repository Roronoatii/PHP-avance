<?php

require_once __DIR__ . '/../../src/init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['mail'];
    $password = $_POST['password'];

    // $sql = "SELECT * FROM users WHERE mail = ?";
    // $stmt = $db->prepare($sql);
    // $stmt->execute([$email]);
    // $user = $stmt->fetch();
    $query = $dbManager->select("SELECT * FROM users WHERE mail = ?", [$email]);
    var_dump($query['password']);
    var_dump($password);

    if (password_verify($password, $query['password'])) {
        // $_SESSION['user'] = $user;
        // header('Location: ../index.php?login=success');
        var_dump('lol');
        //header('Location: ../index.php');

    } else {
        var_dump("Email ou mot de passe incorrect");
    }
}