<?php
require_once __DIR__ . '/init.php';

function checkRoleStrength($requiredStrength, $redirection = 'index.php')
{
    global $dbManager;

    $userRoleName = $_SESSION['role'];
    $userRole = $dbManager->getBy('roles', 'name', $userRoleName, 'Role');
    $userRoleStrength = $userRole->id;

    if ($userRoleStrength < $requiredStrength) {
        header('Location: /' . $redirection . '?error=not_allowed');
    }
}

function checkConnected($hasToBeConnected = true, $redirection = 'login.php')
{
    $isConnected = isset($_SESSION['logged']) && $_SESSION['logged'] == true;

    if ($hasToBeConnected != $isConnected) {

        $header = 'Location: /' . $redirection;
        if (!$isConnected) {
            $header .= '?error=not_connected';
        } else {
            $header .= '?error=already_connected';
        }
        header($header);
        exit;
    }
}