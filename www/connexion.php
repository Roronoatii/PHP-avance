<?php

require_once __DIR__ . '/../src/init.php';
// $db
// $_SESSION

$page_title = 'Contact';
require_once __DIR__ . '/../src/templates/partials/html_head.php';

?>

<body>
    <form action="actions/form_connexion.php" method="POST">
        <h1> Connexion</h1>
            <div>
                <label for="Adresse email"></label>
                <input type="text" id="mail" name="mail">
            </div>

            <div>
                <label for="Mot de passe"></label>
                <input type="password" id="password" name="password">
            </div>

            <button type="submit">Connexion</button>
    </form>

    <?php require_once __DIR__ . '/../src/templates/partials/footer.php'; ?>
</body>
