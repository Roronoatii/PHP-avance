<?php
require_once __DIR__ . '/init.php';

function checkRequiredRole($requiredStrength, $redirection = 'index.php')
{
    global $dbManager;

    $userRole = $_SESSION['role'];

    // $dbManager->select('SELECT id FROM roles WHERE name = ?', [$userRole], 'Role');
    // $sql = "SELECT id FROM roles WHERE name = 'verified'";
    // $query = $dbManager->db->prepare($sql);
    // $query->execute([$userRole]);
    // $result = $query->fetch();
    // var_dump($result);

    // $roleStrength = intval($result['id']);
    // echo $roleStrength;

    // if ($roleStrength < $requiredStrength) {
    //     header('Location: /' . $redirection . '?error=not_allowed');
    //     exit;
    // }
}

function checkConnected($hasToBeConnected = true, $redirection = 'login.php')
{
    $isConnected = isset($_SESSION['logged']) && $_SESSION['logged'] == true;

    if ($hasToBeConnected != $isConnected) {

        $header = 'Location: /' . $redirection;
        if (!$isConnected) {
            $header .= '?error=not_connected';
        }
        header($header);
        exit;
    }
}