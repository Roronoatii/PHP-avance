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

function createDeposit($userId, $currencyId, $amount, $authorId, $status = 1) {
	global $dbManager;

    $dbManager->insert("INSERT INTO `deposits`(`owner_id`, `amount`, `id_currency`, `id_author`, `submit`) VALUES(?, ?, ?, ?, ?)", [$userId, $amount, $currencyId, $authorId, $status]);
}

function acceptDeposit($depositId)
{
	global $dbManager;

	$user = $dbManager->select("SELECT owner_id FROM deposits WHERE id = ?", [$depositId]);
	$userId = $user[0]['owner_id'];

	$currency = $dbManager->select("SELECT id_currency FROM deposits WHERE id = ?", [$depositId]);
	$currencyId = $currency[0]['id_currency'];

	$deposit = $dbManager->select("SELECT amount FROM deposits WHERE id = ?", [$depositId]);
	$depositAmount = floatval($deposit[0]['amount']);

	addMoney($userId, $currencyId, $depositAmount);
	createTransaction($userId, $userId, $currencyId, $depositAmount, $userId);
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

function createWithdrawal($userId, $currencyId, $amount, $authorId, $status = 1) {
	global $dbManager;

    $dbManager->insert("INSERT INTO `withdrawals`(`owner_id`, `amount`, `id_currency`, `id_author`, `submit`) VALUES(?, ?, ?, ?, ?)", [$userId, $amount, $currencyId, $authorId, $status]);
}

function acceptWithdrawal($withdrawalId)
{
	global $dbManager;

	$user = $dbManager->select("SELECT owner_id FROM withdrawals WHERE id = ?", [$withdrawalId]);
	$userId = $user[0]['owner_id'];

	$currency = $dbManager->select("SELECT id_currency FROM withdrawals WHERE id = ?", [$withdrawalId]);
	$currencyId = $currency[0]['id_currency'];

	$withdrawal = $dbManager->select("SELECT amount FROM withdrawals WHERE id = ?", [$withdrawalId]);
	$withdrawalAmount = floatval($withdrawal[0]['amount']);

	removeMoney($userId, $currencyId, $withdrawalAmount);
	createTransaction($userId, $userId, $currencyId, -$withdrawalAmount, $userId);
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

function getStorage($userId, $currencyId) {
	global $dbManager;

	$storage = $dbManager->select("SELECT * FROM storage WHERE id_user = ? AND id_currency = ?", [$userId, $currencyId]);
	return $storage[0];
}

function createTransaction($senderId, $receiverId, $currencyId, $amount, $authorId) {
	global $dbManager;

	$dbManager->insert("INSERT INTO `transactions`(`id_sender`, `id_receiver`, `id_currency`, `amount`, `id_author`) VALUES(?, ?, ?, ?, ?)", [$senderId, $receiverId, $currencyId, $amount, $authorId]);
}