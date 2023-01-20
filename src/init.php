<?php
session_start();

// db
require_once __DIR__ . '/db.php';
require_once __DIR__ . '/session.php';

// classes
foreach (glob(__DIR__ . '/class/*.php') as $filename) {
    require_once $filename;
}

// db manager
require_once __DIR__ . '/class/DbManager.php';

$dbManager = new DbManager($db);
$isLogged = isset($_SESSION['logged']) && $_SESSION['logged'] == true;
if ($isLogged) {
    $user = $dbManager->getBy('users', 'id', $_SESSION['id']);
    $_SESSION['role'] = $user[0]['role_id'];
}

// utils
require_once __DIR__ . '/utils/errors.php';