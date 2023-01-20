<?php

require_once __DIR__ . '/../src/init.php';

$page_title = 'Accueil';
require_once __DIR__ . '/../src/templates/partials/html_head.php';

checkConnected();
checkRoleStrength(10);
?>

<body>

    <?php require_once __DIR__ . '/../src/templates/partials/header.php'; ?>

    <form method="POST" action="actions/form_deposit.php">
        <label for="value">Depot Montant :</label>
        <input type="text" id="amount" name="amount" required>
        <select name="currency" id="currency" required>
            <option value="" disabled selected>Devise:</option>
            <option value="EUR" id="eur">€</option>
            <option value="DOLLAR" id="dollar">$</option>
            <option value="YEN" id="yen">¥</option>
            <option value="BITCOIN" id="bitcoin">₿</option>
            <option value="RUBLE" id="ruble">₽</option>
        </select>
        <input type="submit" name="accept-deposit-submit" value="Dépot">
    </form>
    <?php require_once __DIR__ . '/../src/templates/partials/footer.php'; ?>
</body>

</html>