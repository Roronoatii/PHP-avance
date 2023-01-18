<?php

require_once __DIR__ . '/../../src/init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $amount = $_POST['amount'];
    $currency = $_POST['currency'];

    $currency = $dbManager->getBy('currencies', 'name', $currency);
    $currencyId = $currency[0]['id'];
    $insert = $dbManager->insert("INSERT INTO `withdrawals`(`owner_id`, `amount`, `id_currency`) VALUES(?, ?, ?)", [$_SESSION['id'], $amount, $currencyId]);
}

header('Location: ../withdrawals.php');
exit;