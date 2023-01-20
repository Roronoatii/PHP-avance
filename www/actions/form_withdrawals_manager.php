<?php

require_once __DIR__ . '/../../src/init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $iban = $_POST['iban'];
    $amount = -$_POST['amount'];
    $currency = $_POST['currency'];

    sendMoney($iban, $amount, $currency);

    header('Location: ../manager_verify.php');
    exit;
}