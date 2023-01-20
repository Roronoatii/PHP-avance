<?php

require_once __DIR__ . '/../src/init.php';

$page_title = 'Liste Utilisateurs';
$bannerTitle = 'LISTE DES UTILISATEURS';
require_once __DIR__ . '/../src/templates/partials/html_head.php';

checkConnected();
checkRoleStrength(1000, "manager_verify.php");
?>

<body>

    <?php require_once __DIR__ . '/../src/templates/partials/header.php'; ?>
    <?php require_once __DIR__ . '/../src/templates/partials/banner.php'; ?>

    <section>
        <form action="actions/form_userlist.php" method="POST" class="request-list">
            <?php
            displayUserList(1, 1000);
            ?>

            <div>
                <input type="submit" name="promote-submit" value="Promouvoir">
                <input type="submit" name="ban-submit" value="Bannir">
            </div>
        </form>
    </section>

    <?php require_once __DIR__ . '/../src/templates/partials/footer.php';
    ?>
</body>

</html>