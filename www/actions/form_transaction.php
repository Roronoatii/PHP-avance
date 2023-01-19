<?php

require_once __DIR__ . '/../../src/init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $iban_in = $_POST['iban_in'];
    $amount = $_POST['amount'];
    $currency = $_POST['currency'];


    $iban_in = $dbManager->getBy('users', 'iban', $iban_in);
    $userId_in = $iban_in[0]['id'];

    $currency = $dbManager->getBy('currencies', 'name', $currency);
    $currencyId = $currency[0]['id'];
    addMoney($userId_in, $currencyId, $amount);
    removeMoney($_SESSION['id'], $currencyId, $amount);
    createTransaction($_SESSION['id'], $userId_in, $currencyId, $amount, $_SESSION['id']);
    createTransaction($_SESSION['id'], $userId_in, $currencyId, -$amount, $_SESSION['id']);
}