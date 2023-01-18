<?php

require_once __DIR__ . '/../src/init.php';

$page_title = 'Accueil';
require_once __DIR__ . '/../src/templates/partials/html_head.php';
$_SESSION['role'] = 'verified';
?>

<body>

    <?php require_once __DIR__ . '/../src/templates/partials/header.php'; ?>

    <section id="banner">
        <h1>LA SUPER BANQUE</h1>
    </section>

    <section id="intro">
        <p>La banque qui vous accompagne</p>
    </section>

    <?php require_once __DIR__ . '/../src/templates/partials/footer.php'; ?>
</body>

</html>