<?php

require_once __DIR__ . '/../../src/init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $originCurrency = $_POST['currency_out'];
    $targetCurrency = $_POST['currency_in'];
    $amount = $_POST['amount'];

    $userMoney = getUserMoney($_SESSION['id'], $originCurrency);
    if ($userMoney >= $amount) {
        convertMoney($originCurrency, $targetCurrency, $amount);

        header("Location: ../convert.php?convert=success");
        exit;
    } else {
        header("Location: ../convert.php?error=no-money");
        exit;
    }
}