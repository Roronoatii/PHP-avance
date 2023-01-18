<?php
require_once(__DIR__ . '/../../src/init.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['accept-account-submit'])) {
        // get only checked checkboxes in the form
        $users = $_POST['user'];
        // update the role of the users
        foreach ($users as $user) {
            $userId = intval($user);
            $dbManager->update('users', ['id' => $userId, 'role_id' => 10]);
        }
    }

    if (isset($_POST['accept-deposit-submit'])) {
        $deposits = $_POST['deposit'];

        foreach ($deposits as $deposit) {

            $depositId = intval($deposit);
            $dbManager->update('deposits', ['id' => $depositId, 'submit' => 2]);
        }

        // TODO donner  de l'argent à l'utilisateur
    }
    header('Location: ../manager_verify.php');

    if (isset($_POST['accept-withdrawal-submit'])) {
        $withdrawals = $_POST['withdrawal'];

        foreach ($withdrawals as $withdrawal) {

            $withdrawalId = intval($withdrawal);
            $dbManager->update('withdrawals', ['id' => $withdrawalId, 'submit' => 2]);
        }

        // TODO donner  de l'argent à l'utilisateur
    }
    header('Location: ../manager_verify.php');
}
