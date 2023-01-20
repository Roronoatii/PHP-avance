<?php

require_once __DIR__ . '/../src/init.php';

$page_title = 'Mon Compte';
$bannerTitle = 'MON COMPTE';
require_once __DIR__ . '/../src/templates/partials/html_head.php';

checkConnected();
checkRoleStrength(1, "account.php", true);
?>

<body>

    <?php require_once __DIR__ . '/../src/templates/partials/header.php'; ?>
    <?php require_once __DIR__ . '/../src/templates/partials/banner.php'; ?>

    <h3>Vous êtes banni</h3>

    <?php require_once __DIR__ . '/../src/templates/partials/footer.php';
    ?>
</body>

</html>