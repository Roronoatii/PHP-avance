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
            $result = $dbManager->select("SELECT * FROM `users` WHERE `role_id` = 1", [], 'User');
            foreach ($result as $user) {
                echo '<input type="checkbox" name="user[]" value="' . $user->id . '">';
                echo $user->firstname . ' ' . $user->lastname . ' ' . $user->mail . '<br>';
            }
            ?>

            <input type="submit" name="accept-account-submit" value="Valider">
            <input type="submit" name="refuse-account-submit" value="Refuser">
        </form>
    </section>
    <section id="intro">
        <form action="actions/form_verify.php" method="POST">
            <?php
            $result = $dbManager->select("SELECT * FROM `transactions` WHERE `status` = 0 AND `amount` > 0 AND `id_exchange` IS NULL", [], 'Transaction');
            foreach ($result as $deposit) {
                $currencyId = $dbManager->getById('currencies', $deposit->id_currency, 'Transaction');
                $currency = $currencyId[0]->name;

                $userId = $dbManager->getById('users', $deposit->id_user, 'User');
                $userFirstname = $userId[0]->firstname;
                $userLastname = $userId[0]->lastname;

                echo '<input type="checkbox" name="deposit[]" value="' . $deposit->id . '">';
                echo $deposit->date . ' ' . $deposit->amount . ' ' . $currency . ' ' . $userFirstname . ' ' . $userLastname . '<br>';
            }
            ?>

            <input type="submit" name="accept-deposit-submit" value="Valider">
            <input type="submit" name="refuse-deposit-submit" value="Refuser">
        </form>
    </section>
    <section id="intro">
        <form action="actions/form_verify.php" method="POST">
            <?php
            $result = $dbManager->select("SELECT * FROM `transactions` WHERE `status` = 0 AND `amount` < 0 AND `id_exchange` IS NULL", [], 'Transaction');
            foreach ($result as $withdrawal) {
                $currencyId = $dbManager->getById('currencies', $withdrawal->id_currency, 'Transaction');
                $currency = $currencyId[0]->name;

                $userId = $dbManager->getById('users', $withdrawal->id_user, 'User');
                $userFirstname = $userId[0]->firstname;
                $userLastname = $userId[0]->lastname;

                echo '<input type="checkbox" name="withdrawal[]" value="' . $withdrawal->id . '">';
                echo $withdrawal->date . ' ' . $withdrawal->amount . ' ' . $currency . ' ' . $userFirstname . ' ' . $userLastname . '<br>';
            }
            ?>

            <input type="submit" name="accept-withdrawal-submit" value="Valider">
            <input type="submit" name="refuse-withdrawal-submit" value="Refuser">
        </form>
    </section>
    <section>
        <form method="POST" action="actions/form_deposit_manager.php">
            <label for="value">Dépot pour :</label>
            <input type="text" id="iban" name="iban" required>
            <label for="value">Montant :</label>
            <input type="text" id="amount" name="amount" required>
            <select name="currency" id="currency" required>
                <option value="" disabled selected>Devise:</option>
                <option value="EUR" id="eur">€</option>
                <option value="DOLLAR" id="dollar">$</option>
                <option value="YEN" id="yen">¥</option>
                <option value="BITCOIN" id="bitcoin">₿</option>
                <option value="RUBLE" id="ruble">₽</option>
            </select>
            <input type="submit" name="deposit-submit-manager" value="Dépot">
        </form>
    </section>
    <section>
        <form method="POST" action="actions/form_withdrawals_manager.php">
            <label for="value">Retrait pour :</label>
            <input type="text" id="iban" name="iban" required>
            <label for="value">Montant :</label>
            <input type="text" id="amount" name="amount" required>
            <select name="currency" id="currency" required>
                <option value="" disabled selected>Devise:</option>
                <option value="EUR" id="eur">€</option>
                <option value="DOLLAR" id="dollar">$</option>
                <option value="YEN" id="yen">¥</option>
                <option value="BITCOIN" id="bitcoin">₿</option>
                <option value="RUBLE" id="ruble">₽</option>
            </select>
            <input type="submit" name="withdrawal-submit-manager" value="Retrait">
        </form>
    </section>
    <section>
        <form method="POST" action="actions/form_transaction_manager.php">
            <label for="value">Retrait pour :</label>
            <input type="text" id="iban_out" name="iban_out" required>
            <label for="value">Dépot pour :</label>
            <input type="text" id="iban_in" name="iban_in" required>
            <label for="value">Montant :</label>
            <input type="text" id="amount" name="amount" required>
            <select name="currency" id="currency" required>
                <option value="" disabled selected>Devise:</option>
                <option value="EUR" id="eur">€</option>
                <option value="DOLLAR" id="dollar">$</option>
                <option value="YEN" id="yen">¥</option>
                <option value="BITCOIN" id="bitcoin">₿</option>
                <option value="RUBLE" id="ruble">₽</option>
            </select>
            <input type="submit" name="transaction-submit-manager" value="Transaction">
        </form>
    </section>

    <?php require_once __DIR__ . '/../src/templates/partials/footer.php'; ?>
</body>

</html>