<?php
function getRandomIban()
{
    $iban = "FR";
    for ($i = 0; $i < 5; $i++) {
        $iban .= strval(rand(10000, 99999));
    }
    return $iban;
}

function getStorageId($userId, $currencyId)
{
	// $storage = $dbManager->select("SELECT * FROM storage WHERE id_user = ? AND id_currency = ?", [$userId, $currencyId]);
	$storage = getStorage($userId, $currencyId);
	$storageId = $storage['id'];
	return $storageId;
}

function getUserMoney($userId, $currencyId) {
	$storage = getStorage($userId, $currencyId);
	$amount = $storage['amount'];
	return $amount;
}