<?php

require_once __DIR__ . '/../src/init.php';

$page_title = 'Accueil';
$bannerTitle = 'CONVERTION';
require_once __DIR__ . '/../src/templates/partials/html_head.php';
?>

<body>

    <?php require_once __DIR__ . '/../src/templates/partials/header.php'; ?>
    <?php require_once __DIR__ . '/../src/templates/partials/banner.php'; ?>

    <section>
        <form method="POST" action="actions/form_convert.php">
            <label for="value">Montant :</label>
            <input type="text" id="amount" name="amount" required>
            <label for="value">de:</label>
            <select name="currency_out" id="currency_out" required>
                <option value="" disabled selected>Devise:</option>
                <option value="EUR" id="eur">€</option>
                <option value="DOLLAR" id="dollar">$</option>
                <option value="YEN" id="yen">¥</option>
                <option value="BITCOIN" id="bitcoin">₿</option>
                <option value="RUBLE" id="ruble">₽</option>
            </select>
            <label for="value">à :</label>
            <select name="currency_in" id="currency_in" required>
                <option value="" disabled selected>Devise:</option>
                <option value="EUR" id="eur">€</option>
                <option value="DOLLAR" id="dollar">$</option>
                <option value="YEN" id="yen">¥</option>
                <option value="BITCOIN" id="bitcoin">₿</option>
                <option value="RUBLE" id="ruble">₽</option>
            </select>

            <input type="submit" name="convert-submit" value="Convertir">
        </form>
    </section>

    <?php require_once __DIR__ . '/../src/templates/partials/footer.php';
    ?>

</body>

</html>