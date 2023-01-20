<?php

require_once __DIR__ . '/../src/init.php';

$page_title = 'Mon Compte';
$bannerTitle = 'MON COMPTE';
require_once __DIR__ . '/../src/templates/partials/html_head.php';

checkConnected();
checkRoleStrength(10);
?>

<body>

    <?php require_once __DIR__ . '/../src/templates/partials/header.php'; ?>
    <?php require_once __DIR__ . '/../src/templates/partials/banner.php'; ?>


    <section id="user-iban">
        <h3>IBAN</h3>
        <article>
            <h4>
                <?php echo $_SESSION['iban']; ?>
            </h4>
        </article>
    </section>

    <section id="user-money" class="block">
        <?php
        $sql = "SELECT * FROM storage WHERE id_user = ?";
        $userCurrencies = $dbManager->select($sql, [$_SESSION['id']]);
        $currencySymbols = ['€', '$', '¥', '₿', '₽'];

        foreach ($userCurrencies as $currency) {
            $currencyAmount = $currency['amount'];

            $currencyId = intval($currency['id_currency']);
            $currencySymbol = $currencySymbols[$currencyId - 1];

            echo "<article>";
            echo "<h4>$currencyAmount $currencySymbol</h4>";
            echo "</article>";
        }
        ?>
    </section>

    <section id="transaction-history">
        <h3>Historique des transactions</h3>
        <table>
            <tbody>
                <?php
                $BANK_NAME = "SUPRABANK";

                $sql = "SELECT * FROM transactions WHERE id_user = ? OR id_exchange = ?";
                $transactions = $dbManager->select($sql, [$_SESSION['id'], $_SESSION['id']]);

                foreach ($transactions as $transaction) {
                    $transactionAmount = $transaction['amount'];
                    $transactionSubject = $transaction['id_user'];
                    $transactionAuthor = $transaction['id_author'];
                    $transactionExchange = $transaction['id_exchange'];
                    $transactionDate = $transaction['date'];
                    $transactionDate = date('d/m/Y H:i:s', strtotime($transactionDate));
                    $transactionCurrencyId = $transaction['id_currency'];
                    $transactionCurrencySymbol = $currencySymbols[$transactionCurrencyId - 1];


                    $isDeposit = $transactionAmount > 0 && $transactionSubject == $_SESSION['id'];
                    $isTransactionReceipt = $transactionAmount < 0 && $transactionExchange == $_SESSION['id'];

                    $isWithdrawal = $transactionAmount < 0 && $transactionSubject == $_SESSION['id'];
                    $isTransactionPayment = $transactionAmount > 0 && $transactionExchange == $_SESSION['id'];

                    if ($isDeposit || $isTransactionReceipt) {
                        $transactionType = 'add-money';

                        if ($isDeposit) {
                            if ($transactionAuthor == $_SESSION['id']) {
                                $transactionOrigin = "VOUS";
                            } else {
                                $transactionOrigin = $BANK_NAME;
                            }

                        } else {
                            $transactionAmount = -$transactionAmount;

                            if ($transactionAuthor == $transactionSubject) {
                                $senderFirstname = $dbManager->getById('users', $transactionAuthor)['firstname'];
                                $senderLastname = $dbManager->getById('users', $transactionAuthor)['lastname'];

                                $transactionOrigin = "$senderFirstname $senderLastname";
                            } else {
                                $transactionOrigin = $BANK_NAME;
                            }
                        }

                    } else {
                        $transactionType = 'remove-money';

                        if ($isWithdrawal) {
                            if ($transactionAuthor == $_SESSION['id']) {
                                $transactionDestination = "VOUS";
                            } else {
                                $transactionDestination = $BANK_NAME;
                            }

                        } else {
                            $transactionAmount = -$transactionAmount;

                            if ($transactionAuthor == $transactionSubject) {
                                $receiverFirstname = $dbManager->getById('users', $transactionAuthor)['firstname'];
                                $receiverLastname = $dbManager->getById('users', $transactionAuthor)['lastname'];

                                $transactionDestination = "$receiverFirstname $receiverLastname";
                            } else {
                                $transactionDestination = $BANK_NAME;
                            }
                        }
                    }



                    echo '<tr class="transaction-display ' . $transactionType . '">';
                    echo "<td><h4>$transactionAmount $transactionCurrencySymbol</h4></td>";
                    echo "<td><h4>$transactionOrigin</h4></td>";
                    echo "<td><h4>$transactionDate</h4></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </section>

    <?php require_once __DIR__ . '/../src/templates/partials/footer.php';
    ?>
</body>

</html>