<?php

require_once __DIR__ . '/../src/init.php';
// $db
// $_SESSION

$page_title = 'Contact';
require_once __DIR__ . '/../src/templates/partials/html_head.php';

?>

<body>

    <form method="POST" action="actions/form_register.php">
        <label for="prenom">Prénom :</label>
        <input type="text" id="lastname" name="lastname" required>

        <label for="name">Nom :</label>
        <input type="text" id="firstname" name="firstname" required>

        <label for="email">Adresse email :</label>
        <input type="email" id="mail" name="mail" required>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>

        <label for="date">Date de naissance :</label>
        <input type="date" id="birthdate" name="birthdate" required>

        <input type="submit" name="register-submit" value="S'inscrire">
    </form>