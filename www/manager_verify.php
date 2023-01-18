<?php
require_once __DIR__ . '/../src/init.php';

$page_title = 'Manager - Vérification';
require_once __DIR__ . '/../src/templates/partials/html_head.php';

checkConnected();
checkRoleStrength(200);
?>

<body>

    <?php require_once __DIR__ . '/../src/templates/partials/header.php'; ?>

    <section id="banner">
        <h1>REQUÊTES</h1>
    </section>

    <section id="intro">
        <form action="actions/form_verify.php" method="POST">
            <?php
            $result = $dbManager->select("SELECT * FROM `users` WHERE `role_id` = '1'", [], 'User');
            foreach ($result as $user) {
                echo '<input type="checkbox" name="user[]" value="' . $user->id . '">';
                echo $user->firstname . ' ' . $user->lastname . ' ' . $user->mail . '<br>';
            }
            ?>

            <input type="submit" name="verify-submit" value="Valider">
            <input type="submit" name="refuse-submit" value="Refuser">
        </form>
    </section>
    <section id="intro">
        <form action="actions/form_verify.php" method="POST">
            <?php
            $result = $dbManager->select("SELECT * FROM `deposits` WHERE `submit` = '1'", [], 'Deposit');
            foreach ($result as $deposit) {
                $currencyId = $dbManager->getById('currencies', $deposit->id_currency, 'Deposit');
                $currency = $currencyId[0]->name;

                $userId = $dbManager->getById('users', $deposit->owner_id, 'User');
                $userFirstname = $userId[0]->firstname;
                $userLastname = $userId[0]->lastname;

                echo '<input type="checkbox" name="deposit[]" value="' . $deposit->id . '">';
                echo $deposit->date . ' ' . $deposit->amount . ' ' . $currency . ' ' . $userFirstname . ' ' . $userLastname . '<br>';
            }
            ?>

            <input type="submit" name="verify-submit" value="Valider">
            <input type="submit" name="refuse-submit" value="Refuser">
        </form>
    </section>

    <?php require_once __DIR__ . '/../src/templates/partials/footer.php'; ?>
</body>

</html>