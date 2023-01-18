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

function depositMoney($depositId)
{
	global $dbManager;

	$user = $dbManager->select("SELECT owner_id FROM deposits WHERE id = ?", [$depositId]);
	$userId = $user[0]['owner_id'];

	$currency = $dbManager->select("SELECT currency_id FROM deposits WHERE id = ?", [$depositId]);
	$currencyId = $currency[0]['currency_id'];

	$deposit = $dbManager->select("SELECT amount FROM deposits WHERE id = ?", [$depositId]);
	$depositAmount = floatval($deposit[0]['amount']);

	addMoney($userId, $currencyId, $depositAmount);
}

function addMoney($userId, $currencyId, $amount)
{
	global $dbManager;

	$storageId = getStorageId($userId, $currencyId);

	$storage = $dbManager->select("SELECT * FROM storage WHERE id = ?", [$storageId]);
	$storageAmount = floatval($storage[0]['amount']);
	$newStorageAmount = $storageAmount + $amount;

	$dbManager->update('storage', ['id' => $storageId, 'amount' => $newStorageAmount]);
}

function withdrawMoney($withdrawalId)
{
	global $dbManager;

	$user = $dbManager->select("SELECT owner_id FROM withdrawals WHERE id = ?", [$withdrawalId]);
	$userId = $user[0]['owner_id'];

	$currency = $dbManager->select("SELECT id_currency FROM withdrawals WHERE id = ?", [$withdrawalId]);
	$currencyId = $currency[0]['id_currency'];

	$withdrawal = $dbManager->select("SELECT amount FROM withdrawals WHERE id = ?", [$withdrawalId]);
	$withdrawalAmount = floatval($withdrawal[0]['amount']);

	removeMoney($userId, $currencyId, $withdrawalAmount);
}

function removeMoney($userId, $currencyId, $amount)
{
	global $dbManager;

	$storageId = getStorageId($userId, $currencyId);

	$storage = $dbManager->select("SELECT * FROM storage WHERE id = ?", [$storageId]);
	$storageAmount = floatval($storage[0]['amount']);
	$newStorageAmount = $storageAmount - $amount;

	$dbManager->update('storage', ['id' => $storageId, 'amount' => $newStorageAmount]);
}

function getStorageId($userId, $currencyId)
{
	global $dbManager;

	$storage = $dbManager->select("SELECT * FROM storage WHERE id_user = ? AND id_currency = ?", [$userId, $currencyId]);
	$storageId = $storage[0]['id'];
	return $storageId;
}