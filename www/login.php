<?php
require_once __DIR__ . '/../src/init.php';

$page_title = 'Contact';
$bannerTitle = 'CONNEXION';
require_once __DIR__ . '/../src/templates/partials/html_head.php';

checkConnected(false, "account.php");
?>

<body>
    <?php require_once __DIR__ . '/../src/templates/partials/header.php'; ?>
    <?php require_once __DIR__ . '/../src/templates/partials/banner.php'; ?>

    <form action="actions/form_login.php" method="POST">
        <h1> Connexion</h1>
        <div>
            <label for="Adresse email"></label>
            <input type="text" id="mail" name="mail" required>
        </div>

        <div>
            <label for="Mot de passe"></label>
            <input type="password" id="password" name="password" required>
        </div>

        <button type="submit">Connexion</button>
    </form>

    <?php require_once __DIR__ . '/../src/templates/partials/footer.php'; ?>
</body>