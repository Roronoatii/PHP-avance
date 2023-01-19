<?php
require_once __DIR__ . '/init.php';
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/utils/customs.php';

try {
	$dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'] . ';port=' . $config['db']['port'] . '';
	$db = new PDO($dsn, $config['db']['user'], $config['db']['pass']);

} catch (Exception $e) {
	die('Erreur MySQL. ' . $e->getMessage());
}

function createAccount($firstname, $lastname, $email, $password, $birthdate)
{
	global $dbManager;

	$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

	$iban = getRandomIban();

	$sql = "INSERT INTO `users` (`firstname`, `lastname`, `mail`, `password`, `birthdate`, `iban`)
	VALUES (?, ?, ?, ?, ?, ?)";
	$dbManager->insert($sql, [$firstname, $lastname, $email, $hashedPassword, $birthdate, $iban]);
}

function acceptTransaction($transactionId)
{
	global $dbManager;

	$user = $dbManager->select("SELECT id_user FROM transactions WHERE id = ?", [$transactionId]);
	$userId = $user[0]['id_user'];

	$currency = $dbManager->select("SELECT id_currency FROM transactions WHERE id = ?", [$transactionId]);
	$currencyId = $currency[0]['id_currency'];

	$deposit = $dbManager->select("SELECT amount FROM transactions WHERE id = ?", [$transactionId]);
	$depositAmount = floatval($deposit[0]['amount']);

	updateMoney($userId, $currencyId, $depositAmount);
	updateTransaction($transactionId, 1);
}

function sendMoney($iban, $amount, $currency, $exchange = false)
{
	global $dbManager;

	$user = $dbManager->getBy('users', 'iban', $iban);
	$userId = $user[0]['id'];

	$currency = $dbManager->getBy('currencies', 'name', $currency);
	$currencyId = $currency[0]['id'];

	if ($exchange) {
		$exchangeId = $_SESSION['id'];
		createTransaction($_SESSION['id'], $currencyId, -$amount, $_SESSION['id'], 1, $userId);
		updateMoney($_SESSION['id'], $currencyId, -$amount);
	} else {
		$exchangeId = NULL;
	}

	createTransaction($userId, $currencyId, $amount, $_SESSION['id'], 1, $exchangeId);
	updateMoney($userId, $currencyId, $amount);
}

function convertMoney($originCurrency, $targetCurrency, $amount)
{
	global $dbManager;

	$originCurrency = $dbManager->getBy('currencies', 'name', $originCurrency);
	$originCurrencyId = $originCurrency[0]['id'];
	$originCurrencyRatio = $originCurrency[0]['dollar_ratio'];

	$targetCurrency = $dbManager->getBy('currencies', 'name', $targetCurrency);
	$targetCurrencyId = $targetCurrency[0]['id'];
	$targetCurrencyRatio = $targetCurrency[0]['dollar_ratio'];

	$newAmount = $amount * $originCurrencyRatio / $targetCurrencyRatio;

	createTransaction($_SESSION['id'], $originCurrencyId, -$amount, $_SESSION['id'], 1);
	updateMoney($_SESSION['id'], $originCurrencyId, -$amount);

	createTransaction($_SESSION['id'], $targetCurrencyId, $newAmount, $_SESSION['id'], 1);
	updateMoney($_SESSION['id'], $targetCurrencyId, $newAmount);
}

function updateMoney($userId, $currencyId, $amount)
{
	global $dbManager;

	$storage = getStorage($userId, $currencyId);
	$storageId = $storage['id'];
	$storageAmount = $storage['amount'];
	$newStorageAmount = $storageAmount + $amount;
	$dbManager->update('storage', ['id' => $storageId, 'amount' => $newStorageAmount]);
}

function getStorage($userId, $currencyId)
{
	global $dbManager;

	$storage = $dbManager->select("SELECT * FROM storage WHERE id_user = ? AND id_currency = ?", [$userId, $currencyId]);
	return $storage[0];
}

function createTransaction($userId, $currencyId, $amount, $authorId, $status = 0, $exchangeId = NULL)
{
	global $dbManager;

	$dbManager->insert("INSERT INTO `transactions`(`id_user`, `id_currency`, `amount`, `id_author`, `status`, `id_exchange`) VALUES(?, ?, ?, ?, ?, ?)", [$userId, $currencyId, $amount, $authorId, $status, $exchangeId]);
}

function updateTransaction($transactionId, $status)
{
	global $dbManager;

	$dbManager->update('transactions', ['id' => $transactionId, 'status' => $status]);
}

function getUserMoney($userId, $currency)
{
	global $dbManager;

	$currency = $dbManager->getBy('currencies', 'name', $currency);
	$currencyId = $currency[0]['id'];

	$storage = getStorage($userId, $currencyId);
	$amount = $storage['amount'];
	return $amount;
}