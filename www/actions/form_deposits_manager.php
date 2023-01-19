<?php

require_once __DIR__ . '/../../src/init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $iban = $_POST['iban'];
    $amount = $_POST['amount'];
    $currency = $_POST['currency'];

    $iban = $dbManager->getBy('users', 'iban', $iban);
    $userId = $iban[0]['id'];
    $currency = $dbManager->getBy('currencies', 'name', $currency);
    $currencyId = $currency[0]['id'];
    createDeposit($userId, $currencyId, $amount, $_SESSION['id'], 2);
    addMoney($userId, $currencyId, $amount);
    createTransaction($userId, $userId, $currencyId, $amount, $_SESSION['id']);
}