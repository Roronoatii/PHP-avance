<?php
require_once __DIR__ . '/init.php';

function checkRoleStrength($requiredStrength, $redirection = 'index.php', $invert = false)
{
    $userRoleStrength = $_SESSION['role'];

    if ($userRoleStrength == 0 && $_SERVER['REQUEST_URI'] != '/banned.php') {
        header('Location: /banned.php');
        exit;
    }

    $hasNotRequiredStrength = $userRoleStrength < $requiredStrength;
    if ($invert) {
        $hasNotRequiredStrength = !$hasNotRequiredStrength;
    }
    if ($hasNotRequiredStrength) {
        if (!$invert && $userRoleStrength == 1) {
            header('Location: /waiting.php');
            exit;
        }
        header('Location: /' . $redirection . '?error=not_allowed');
        exit;
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

function logout()
{
    session_destroy();
    header('Location: /login.php?success=logged_out');
    exit;
}