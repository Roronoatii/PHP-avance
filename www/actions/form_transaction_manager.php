<?php

require_once __DIR__ . '/../../src/init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $iban_out = $_POST['iban_out'];
    $iban_in = $_POST['iban_in'];

    $amount = $_POST['amount'];
    $currency = $_POST['currency'];

    $iban_out = $dbManager->getBy('users', 'iban', $iban_out);
    $userId_out = $iban_out[0]['id'];
    $iban_in = $dbManager->getBy('users', 'iban', $iban_in);
    $userId_in = $iban_in[0]['id'];

    $currency = $dbManager->getBy('currencies', 'name', $currency);
    $currencyId = $currency[0]['id'];
    updateMoney($userId_in, $currencyId, $amount);
    updateMoney($userId_out, $currencyId, $amount);
    createTransaction($userId_out, $userId_in, $currencyId, $amount, $_SESSION['id']);
    createTransaction($userId_out, $userId_in, $currencyId, -$amount, $_SESSION['id']);
}