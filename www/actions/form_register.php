<?php

require_once __DIR__ . '/../../src/init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $iban = $_POST['iban'];
    $birthdate = $_POST['birthdate'];
    $email = $_POST['mail'];
    $password = $_POST['password'];

    var_dump("ok");
}

$sql = "SELECT * FROM users WHERE mail = ?";

$stmt = $db->prepare($sql);
$stmt->execute([$email]);
$user = $stmt->fetch();

if ($user->rowCount() > 0) {
    echo "Cette adresse email est déjà utilisée, veuillez en saisir une autre";
} else {
    $password = password_hash($password, PASSWORD_DEFAULT);

    // $sql = "INSERT INTO users (firstname, lastname, iban, birthdate, mail, password) VALUES (?, ?, ?, ?, ?, ?)";
    // $idInserted = $dbManager->insert($sql, [$firstname, $lastname, $iban, $birthdate, $email, $password]);
    createAccount($firstname, $lastname, $email, $password, $birthdate);

    echo "Inscription réussie!!!";
}

?>