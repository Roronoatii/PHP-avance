<?php

require_once __DIR__ . '/../../src/init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $iban = $_POST['iban'];
    $amount = $_POST['amount'];
    $currency = $_POST['currency'];

    $iban = $dbManager->getBy('users', 'iban', $iban);
    $user = $iban[0]['id'];
    $currency = $dbManager->getBy('currencies', 'name', $currency);
    $currencyId = $currency[0]['id'];
    $storage = $dbManager->getBy('id', $user, $currencyId);
    var_dump($storage);
    var_dump($storageId);   
    $storageId = $storage[0]['id'];
    // $insert = $dbManager->insert("INSERT INTO `storage`(`id_user`, `id_currency`, `amount`) VALUES(?, ?, ?)", [$user, $currencyId, $amount]);

    
}