<?php

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/class/User.php';
require_once __DIR__ . '/class/Role.php';

try {
	$dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'] . ';port=' . $config['db']['port'] . '';
	$db = new PDO($dsn, $config['db']['user'], $config['db']['pass']);

} catch (Exception $e) {
	die('Erreur MySQL. ' . $e->getMessage());
}

function createAccount($firstname, $lastname, $email, $password, $birthdate)
{
	global $dbManager;

	$iban = "FR";
	for ($i = 0; $i < 5; $i++) {
		$iban .= strval(rand(10000, 99999));
	}

	$sql = "INSERT INTO `users` (`firstname`, `lastname`, `mail`, `password`, `birthdate`, `iban`)
	VALUES (?, ?, ?, ?, ?, ?)";
	$dbManager->insert($sql, [$firstname, $lastname, $email, $password, $birthdate, $iban]);
}
function checkRoleStrength($role, $requiredLvl, $redirection = 'index.php'){
	global $dbManager;

	$userRole = $dbManager->getBy('roles', 'name', $role, 'Role');
	$userRoleStrength = $userRole->id;	

	if ($userRoleStrength < $requiredLvl) {
		header('Location: /' . $redirection . '?error=not_allowed');
	}
}
?>