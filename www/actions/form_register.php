<?php
require_once(__DIR__ . '/../../src/init.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['register-submit'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $birthdate = $_POST['birthdate'];
        $email = $_POST['mail'];
        $password = $_POST['password'];

        $query = $dbManager->select("SELECT * FROM users WHERE mail = ?", [$email], 'User');

        if (count($query) > 0) {
            var_dump("Cette adresse email est déjà utilisée, veuillez en saisir une autre");
        } else {
            createAccount($firstname, $lastname, $email, $password, $birthdate);

            header('Location: ../login.php?register=success');
        }
    }
}
?>