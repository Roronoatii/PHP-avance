<?php

require_once __DIR__ . '/../../src/init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $currency_out = $_POST['currency_out'];
    $currency_in = $_POST['currency_in'];
    $amount = $_POST['amount'];

    $userMoney = getUserMoney($_SESSION['id'], $currency_out);

    if ($userMoney >= $amount) {
        $currency_out = $dbManager->getBy('currencies', 'name', $currency_out);
        $currencyId_out = $currency_out[0]['id'];
        $currenyRatio_out = $currency_out[0]['dollar_ratio'];

        $currency_in = $dbManager->getBy('currencies', 'name', $currency_in);
        $currencyId_in = $currency_in[0]['id'];
        $currenyRatio_in = $currency_in[0]['dollar_ratio'];

        $newAmount = $amount * $currenyRatio_out / $currenyRatio_in;

        updateMoney($_SESSION['id'], $currencyId_in, $newAmount);
        updateMoney($_SESSION['id'], $currencyId_out, $amount);
        createTransaction($_SESSION['id'], $currencyId_in, $newAmount, $_SESSION['id'], 1);
        createTransaction($_SESSION['id'], $currencyId_out, -$amount, $_SESSION['id'], 1);

        header("Location: ../convert.php?convert=success");
        exit;
    } else {
        header("Location: ../convert.php?error=no-money");
        exit;
    }
}