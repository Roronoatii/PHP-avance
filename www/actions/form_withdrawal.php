<?php

require_once __DIR__ . '/../../src/init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $amount = $_POST['amount'];
    $currency = $_POST['currency'];

    $currency = $dbManager->getBy('currencies', 'name', $currency);
    $currencyId = $currency[0]['id'];
    createWithdrawal($_SESSION['id'], $currencyId, $amount, $_SESSION['id']);
}

header('Location: ../withdrawals.php');
exit;