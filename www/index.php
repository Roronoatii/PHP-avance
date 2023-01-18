<?php

require_once __DIR__ . '/../src/init.php';

$page_title = 'Accueil';
require_once __DIR__ . '/../src/templates/partials/html_head.php';
$_SESSION['role'] = 'verified';
?>

<body>

    <?php require_once __DIR__ . '/../src/templates/partials/header.php'; ?>



    <?php require_once __DIR__ . '/../src/templates/partials/footer.php';
     ?>
</body>

</html>