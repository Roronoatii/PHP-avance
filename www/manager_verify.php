<?php
require_once __DIR__ . '/../src/init.php';

$page_title = 'Manager - Vérification';
$bannerTitle = 'REQUÊTES';
require_once __DIR__ . '/../src/templates/partials/html_head.php';

checkConnected();
checkRoleStrength(200);
?>

<body>

    <?php require_once __DIR__ . '/../src/templates/partials/header.php'; ?>
    <?php require_once __DIR__ . '/../src/templates/partials/banner.php'; ?>

    <section id="verif-account">
        <h3>Comptes</h3>
        <form action="actions/form_verify.php" method="POST" class="request-list">
            <?php
            displayUserList(0, 10);
            ?>
            <div>
                <input type="submit" name="accept-account-submit" value="Accepter">
                <input type="submit" name="refuse-account-submit" value="Refuser">
            </div>
        </form>
    </section>
    <section id="verif-deposit">
        <h3>Dépôts</h3>
        <form action="actions/form_verify.php" method="POST" class="request-list">
            <?php
            displayTransactionList(">");
            ?>

            <div>
                <input type="submit" name="accept-deposit-submit" value="Valider">
                <input type="submit" name="refuse-deposit-submit" value="Refuser">
            </div>
        </form>
    </section>
    <section id="verif-withdrawal">
        <h3>Retraits</h3>
        <form action="actions/form_verify.php" method="POST" class="request-list">
            <?php
            displayTransactionList("<");
            ?>
            <div>
                <input type="submit" name="accept-withdrawal-submit" value="Valider">
                <input type="submit" name="refuse-withdrawal-submit" value="Refuser">
            </div>
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